<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\CategoriaRequest;

class CategoriaController extends Controller
{
    //
    function __construct() {
      $this->middleware('auth');
    }

    function index() {
      $categorias = Categoria::all();
      return view('categoria.listagem',['categorias' => $categorias]);
    }

    function novo() {
      $categoria = new Categoria();
      $categoria->id = 0;
      $categoria->descricao = "";
      return view('categoria.formulario', ['categoria' => $categoria] );
    }

    function salvar(CategoriaRequest $request) {
      if ($request->input("id") == 0) {
        $categoria = new Categoria();
      } else {
        $categoria = Categoria::find($request->input("id"));
      }

      $imagem = "";
      if ($request->file('file')) {
        $path = $request->file('file')->store(
          'public');
        $caminhos = explode("/", $path);
        $tamanho = sizeof($caminhos);
        $imagem = $caminhos[$tamanho-1];

        if ($categoria->imagem != "") {
          Storage::delete('public/'.$categoria->imagem);
        }
      }

      $categoria->descricao = $request->input("descricao");
      if ($imagem != "") {
        $categoria->imagem = $imagem;
      }
      $categoria->save();
      $mensagem = "Categoria $categoria->descricao foi salva";
      return redirect()
        ->route("categoria_listagem")
        ->with(compact('mensagem'));
    }

    // funcao depreciada, utilizando categoriarequest
    function salvar1(Request $request) {
      $validator = Validator::make($request->all(), [
                  'descricao' => 'required|min:5',
                  'id' => 'notIn([0])',
              ]);

      if ($validator->fails()) {
          if ($request->input("id")==0) {
            return redirect()->route("categoria_novo")
                        ->withErrors($validator)
                        ->withInput();

          } else {
            return redirect()->route("categoria_editar", ['id' => $request->input("id")])
                        ->withErrors($validator)
                        ->withInput();
          }
      }


        if ($request->input("id") == 0) {
          $categoria = new Categoria();
        } else {
          $categoria = Categoria::find($request->input("id"));
        }
        $categoria->descricao = $request->input("descricao");
        $categoria->save();
        return redirect()->route("categoria_listagem");
    }

    function editar($id) {
      $categoria = Categoria::find($id);
      return view("categoria.formulario", ['categoria' => $categoria]);
    }

    function excluir($id) {
      $categoria = Categoria::find($id);
      $mensagem = "Categoria: $categoria->descricao foi excluída";
      if ($categoria->imagem != "") {
        Storage::delete('public/'.$categoria->imagem);
      }
      $categoria->delete();
      return redirect()->route("categoria_listagem")->with(
        compact('mensagem'));
    }
}
