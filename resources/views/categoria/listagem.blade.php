@extends('layout.template')

@section('conteudo')
  <h1>Listagem de Categoria</h1>
  <a href="categoria/novo" class="btn btn-primary">
    <i class="fas fa-file"></i>
     Novo
  </a>
  <table class="table table-striped table-hover table-bordered table-sm">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Descrição</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @forelse ($categorias as $categoria)
          <tr>
            <td>{{$categoria->id}}</td>
            <td>{{$categoria->descricao}}</td>
            <td>
              <a href="{{route('categoria_editar',['id' => $categoria->id])}}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
              <a href="{{route('categoria_excluir',['id' => $categoria->id])}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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
