@extends('layout.template')

@section('conteudo')
  <h1>Cadastro de Notícia</h1>
  @if($noticia->imagem != "")
    <img style="width: 100%" src="/storage/{{$noticia->imagem}}" >
  @endif

  <form action="{{route('noticia_salvar')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="mb-3">
      <label for="id" class="form-label">ID</label>
      <input type="text" class="form-control" id="id" name="id" readonly value="{{$noticia->id}}">
    </div>
    <div class="mb-3">
      <label for="resumo" class="form-label">Resumo</label>
      <textarea class="form-control @error('resumo') is-invalid @enderror" id="resumo" name="resumo"  rows="3">{{old('resumo', $noticia->resumo)}}</textarea>
      @error('resumo')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="descricao" class="form-label">Descrição</label>
      <textarea class="form-control @error('descricao') is-invalid @enderror" id="descricao" name="descricao" rows="7">{{old('descricao', $noticia->descricao)}}</textarea>
        @error('descricao')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
      <label for="resumo" class="form-label">Data</label>
      <input type="date" class="form-control @error('data') is-invalid @enderror" id="data" name="data" value="{{old('data', $noticia->data->format('Y-m-d')) }}">
      @error('data')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="autor" class="form-label">Autor</label>
      <input type="text" class="form-control @error('autor') is-invalid @enderror" id="autor" name="autor" value="{{old('autor', $noticia->autor)}}">
      @error('autor')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="categoria_id" class="form-label">Categoria</label>
      <select class="form-select @error('categoria_id') is-invalid @enderror" name="categoria_id" id="categoria_id">
        @foreach ($categorias as $categoria)
          <option
          {{ $noticia->categoria_id == $categoria->id?"selected":""}}
          value="{{$categoria->id}}">{{$categoria->descricao}}</option>
        @endforeach
      </select>
      @error('categoria_id')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="file" class="form-label">Arquivo</label>
      <input type="file" class="form-control @error('file') is-invalid @enderror" id="file" name="file" accept="image/*">
      @error('file')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
  </form>
@endsection
