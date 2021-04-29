@extends('layout.template')

@section('conteudo')
  <h1>Cadastro de Categoria</h1>
  <form action="{{route('categoria_salvar')}}" method="post">
    {{ csrf_field() }}
    <div class="mb-3">
      <label for="id" class="form-label">ID</label>
      <input type="text" class="form-control" id="id" name="id" readonly value="{{$categoria->id}}">
    </div>
    <div class="mb-3">
      <label for="descricao" class="form-label">Descrição</label>
      <input type="text" class="form-control" id="descricao" name="descricao" value="{{$categoria->descricao}}">
    </div>
    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
  </form>
@endsection
