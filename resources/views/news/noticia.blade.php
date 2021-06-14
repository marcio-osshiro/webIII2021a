<style media="screen">
  main>header {
    display: flex;
    justify-content: space-between;
  }
  main>header>img {
    height: 3rem;
  }
  main>h2 {
    text-align: center;
    color: gray;
  }
  main>h3 {
    text-align: center;
    color: gray;
    font-size: 1rem;
  }
  main>img {
    width: 100%;
  }
  main>p {
    font-size: 1.5rem;

  }
</style>

@extends('layout.templateNews')

@section('principal')
  <header>
    <h1>{{$noticia->categoria->descricao}}</h1>
    <img src="/storage/{{$noticia->categoria->imagem}}">
  </header>
  <h2>{{$noticia->resumo}}</h2>
  <h3>{{$noticia->data->format('d-m-Y')}} - {{$noticia->autor}}</h3>
  <img src="/storage/{{$noticia->imagem}}">
  <p>{{$noticia->descricao}}</p>

@endsection


@section('conteudo')
  <ul>
  @foreach($noticias as $noticia)
      <li><a href="{{route('news_id', $noticia->id)}}">{{$noticia->resumo}} - {{$noticia->data->format('d-m-Y')}} - {{$noticia->autor}}</a></li>
  @endforeach
  </ul>
@endsection
