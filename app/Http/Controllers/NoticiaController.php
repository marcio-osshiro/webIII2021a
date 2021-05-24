<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;
use App\Models\Categoria;
use App\Http\Requests\NoticiaRequest;
use Illuminate\Support\Facades\Storage;


class NoticiaController extends Controller
{
  function __construct() {
    $this->middleware('auth');
  }


  function index() {
    $noticias = Noticia::orderBy('data','desc')->paginate(7);
    return view('noticia.listagem',['noticias' => $noticias]);
  }

  function novo() {
    $noticia = new Noticia();
    $noticia->id = 0;
    $noticia->resumo = "";
    $noticia->descricao = "";
    $noticia->data = "";
    $noticia->autor = "";
    $noticia->categoria_id = "";

    $categorias = Categoria::all();

    return view('noticia.formulario',
      [
        'noticia' => $noticia,
        'categorias' => $categorias
      ]
    );
  }

  function salvar(NoticiaRequest $request) {
      if ($request->input("id") == 0) {
        $noticia = new Noticia();
      } else {
        $noticia = Noticia::find($request->input("id"));
      }
      $imagem = "";
      if ($request->file('file')) {
        $path = $request->file('file')->store(
          'public');
        $caminhos = explode("/", $path);
        $tamanho = sizeof($caminhos);
        $imagem = $caminhos[$tamanho-1];

        if ($noticia->imagem != "") {
          Storage::delete('public/'.$noticia->imagem);
        }
      }
      if ($imagem != "") {
        $noticia->imagem = $imagem;
      }
      $noticia->resumo = $request->input("resumo");
      $noticia->descricao = $request->input("descricao");
      $noticia->data = $request->input("data");
      $noticia->autor = $request->input("autor");
      $noticia->categoria_id = $request->input("categoria_id");
      $noticia->save();
      $mensagem = "Notícia ($noticia->resumo) foi salva";
      return redirect()->route("noticia_listagem")->with(compact('mensagem'));
  }

  function editar($id) {
    $noticia = Noticia::find($id);
    $categorias = Categoria::all();
    return view('noticia.formulario',
      [
        'noticia' => $noticia,
        'categorias' => $categorias
      ]
    );

  }

  function excluir($id) {
    $noticia = Noticia::find($id);
    if ($noticia->imagem != "") {
      Storage::delete('public/'.$noticia->imagem);
    }
    $mensagem = "Notícia ($noticia->resumo) foi excluída";
    $noticia->delete();
    return redirect()->route("noticia_listagem")->with(compact('mensagem'));
  }
}
