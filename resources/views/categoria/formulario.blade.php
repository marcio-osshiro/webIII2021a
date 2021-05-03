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
  <form action="{{route('categoria_salvar')}}" method="post">
    {{ csrf_field() }}
    <div class="mb-3">
      <label for="id" class="form-label">ID</label>
      <input type="text" class="form-control" id="id" name="id" readonly value="{{$categoria->id}}">
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
