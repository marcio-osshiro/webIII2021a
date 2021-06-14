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
  <h1>Mensagem</h1>

  <form action="{{route('usuario_sendmail')}}" method="post">
    {{ csrf_field() }}
    <div class="row">
      <div class="mb-3 col">
        <label for="id" class="form-label">ID</label>
        <input type="text" class="form-control" id="id" name="id" readonly value="{{$usuario->id}}">
      </div>
      <div class="mb-3 col">
        <label for="id" class="form-label">E-mail</label>
        <input type="text" class="form-control" id="id" name="email" readonly value="{{$usuario->email}}">
      </div>
      <div class="mb-3 col">
        <label for="id" class="form-label">Nome</label>
        <input type="text" class="form-control" id="id" name="name" readonly value="{{$usuario->name}}">
      </div>
    </div>
    <div class="mb-3">
      <label for="mensagem" class="form-label">Mensagem</label>
      <textarea class="form-control" id="mensagem" name="mensagem" rows="10"></textarea>
    </div>
    <button type="submit" class="btn btn-primary"><i class="fas fa-envelope"></i> Enviar</button>
  </form>
@endsection
