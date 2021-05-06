@extends('layout.template')

@section('conteudo')
  <h1>Listagem de Notícias</h1>
  <a href="noticia/novo" class="btn btn-primary">
    <i class="fas fa-file"></i>
     Novo
  </a>
  <table class="table table-striped table-hover table-bordered table-sm">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Resumo</th>
        <th scope="col">Data</th>
        <th scope="col">Autor</th>
        <th scope="col">Categoria</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @forelse ($noticias as $noticia)
          <tr>
            <td>{{$noticia->id}}</td>
            <td>{{$noticia->resumo}}</td>
            <td>{{$noticia->data->format('d/m/Y') }}</td>
            <td>{{$noticia->autor}}</td>
            <td>{{$noticia->categoria->descricao}}</td>
            <td>
              <a href="{{route('noticia_editar',['id' => $noticia->id])}}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
              <a href="{{route('noticia_excluir',['id' => $noticia->id])}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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
