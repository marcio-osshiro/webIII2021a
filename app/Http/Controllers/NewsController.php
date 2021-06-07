<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Noticia;

class NewsController extends Controller
{
    //
    function index() {
      $categorias = Categoria::all();
      $noticias = Noticia::
          orderBy('data', 'desc')
          ->limit(5)->get();
      return view('news.index',
        compact('categorias', 'noticias')
      );
    }

    function noticia($id) {
      $noticia = Noticia::find($id);
      $categorias = Categoria::all();
      $noticias = Noticia::where('categoria_id', $noticia->categoria_id)->get();
      return view('news.noticia', compact('noticia', 'categorias', 'noticias'));
    }

    function categoria($id) {
      $categoria = Categoria::find($id);
      $noticia = $categoria->noticias->first();
      $noticias = Noticia::where('categoria_id', $noticia->categoria_id)->get();
      $categorias = Categoria::all();
      return view('news.noticia', compact('noticia', 'categorias', 'noticias'));
    }
}
