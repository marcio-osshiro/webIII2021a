@extends('layout.template')

@section('conteudo')
  <h1>Cadastro de Notícia</h1>
  <form action="{{route('noticia_salvar')}}" method="post">
    {{ csrf_field() }}
    <div class="mb-3">
      <label for="id" class="form-label">ID</label>
      <input type="text" class="form-control" id="id" name="id" readonly value="{{$noticia->id}}">
    </div>
    <div class="mb-3">
      <label for="resumo" class="form-label">Resumo</label>
      <textarea class="form-control" id="resumo" name="resumo"  rows="3">{{$noticia->resumo}}</textarea>
    </div>
    <div class="mb-3">
      <label for="descricao" class="form-label">Descrição</label>
      <textarea class="form-control" id="descricao" name="descricao" rows="7">{{$noticia->descricao}}</textarea>
    </div>
    <div class="mb-3">
      <label for="resumo" class="form-label">Data</label>
      <input type="date" class="form-control" id="data" name="data" value="{{$noticia->data->format('Y-m-d')}}">
    </div>
    <div class="mb-3">
      <label for="autor" class="form-label">Autor</label>
      <input type="text" class="form-control" id="autor" name="autor" value="{{$noticia->autor}}">
    </div>
    <div class="mb-3">
      <label for="categoria_id" class="form-label">Categoria</label>
      <select class="form-select" name="categoria_id" id="categoria_id">
        @foreach ($categorias as $categoria)
          <option
          {{ $noticia->categoria_id == $categoria->id?"selected":""}}
          value="{{$categoria->id}}">{{$categoria->descricao}}</option>
        @endforeach
      </select>
    </div>
    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
  </form>
@endsection
