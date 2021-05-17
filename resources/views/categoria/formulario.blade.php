@extends('layout.template')

@section('conteudo')
  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

  <h1>Cadastro de Categoria</h1>
  @if($categoria->imagem != "")
    <img style="width: 200pxve" src="/storage/{{$categoria->imagem}}" >
  @endif

  <form action="{{route('categoria_salvar')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="mb-3">
      <label for="id" class="form-label">ID</label>
      <input type="text" class="form-control" id="id" name="id" readonly value="{{$categoria->id}}">
    </div>
    <div class="mb-3">
      <label for="file" class="form-label">Arquivo</label>
      <input type="file" class="form-control @error('file') is-invalid @enderror" id="file" name="file" accept="image/*">
      @error('file')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="descricao" class="form-label">Descrição</label>
      <input type="text" class="form-control @error('descricao') is-invalid @enderror" id="descricao" name="descricao" value="{{old('descricao', $categoria->descricao) }}">
      @error('descricao')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
  </form>
@endsection
