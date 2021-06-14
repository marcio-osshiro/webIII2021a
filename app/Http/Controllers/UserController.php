<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\MensagemUsuario;

class UserController extends Controller
{
    //
    function index() {
      $usuarios = User::all();
      return view('user.listagem', compact('usuarios'));
    }

    function mail($id) {
      $usuario = User::find($id);
      return view('user.formulario', compact('usuario'));
    }

    function sendmail(Request $request) {
      $id = $request->input('id');
      $usuario = User::find($id);
      $mensagem = $request->input('mensagem');

      Mail::to($usuario->email)
        ->send(new MensagemUsuario($mensagem, $usuario));

      return redirect()->route('usuario_listagem');
    }
}
