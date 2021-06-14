@extends('layout.template')

@section('conteudo')

  <h1>Listagem de Usuários</h1>
  <table class="table table-striped table-hover table-bordered table-sm">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
        <th scope="col">E-mail</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @forelse ($usuarios as $usuario)
          <tr>
            <td>{{$usuario->id}}</td>
            <td>{{$usuario->name}}</td>
            <td>{{$usuario->email}}</td>
            <td>
              <a href="{{route('usuario_mail', $usuario->id)}}" class="btn btn-primary"><i class="fas fa-envelope"></i></a>
            </td>
          </tr>
      @empty
        <tr>
          <td>0</td>
          <td>Nenhum registro cadastrado</td>
        </tr>
      @endforelse
    </tbody>
  </table>
@endsection
