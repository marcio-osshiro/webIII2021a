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

    function novo() {
      $categoria = new Categoria();
      $categoria->id = 0;
      $categoria->descricao = "";
      return view('formulario', ['categoria' => $categoria] );
    }

    function salvar(Request $request) {
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
      return view("formulario", ['categoria' => $categoria]);
    }

    function excluir($id) {
      $categoria = Categoria::find($id);
      $categoria->delete();
      return redirect()->route("categoria_listagem");
    }
}
