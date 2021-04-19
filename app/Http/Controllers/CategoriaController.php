<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    //
    function index() {
      $categorias = Categoria::all();
      return view('listagem',['categorias' => $categorias]);
    }
}
