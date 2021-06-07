@extends('layout.templateNews')

@section('principal')
  <h1>Últimas Notícias</h1>
  <!-- carrossel -->
  <div id="carouselPrincipal" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      @foreach ($noticias as $noticia)
          <button type="button" data-bs-target="#carouselPrincipal" data-bs-slide-to="{{$loop->index}}"
            @if ($loop->first) class="active" aria-current="true" @endif
            aria-label="Slide {{$loop->index}}"></button>
      @endforeach ($noticias as $noticia)

    </div>
    <div class="carousel-inner">
      @foreach ($noticias as $noticia)
        <div class="carousel-item @if ($loop->first) active @endif ratio" style="--bs-aspect-ratio: 20%;">
          <img src="storage/{{$noticia->imagem}}" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5><a href="{{route('news_id', $noticia->id)}}">{{$noticia->resumo}}</a></h5>
            <p>{{$noticia->data->format('d/m/Y')}}: {{$noticia->autor}}</p>
          </div>
        </div>
      @endforeach ($noticias as $noticia)
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselPrincipal" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselPrincipal" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
@endsection


@section('conteudo')
  @foreach ($categorias as $categoria)
    <article>
      <h1>{{$categoria->descricao}}
        <img src="storage/{{$categoria->imagem}}">
      </h1>
      <!-- carrossel -->
      <div id="carousel{{$loop->index}}" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carousel{{$loop->index}}" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carousel{{$loop->index}}" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carousel{{$loop->index}}" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          @foreach($categoria->noticias as $noticia)
          <div class="carousel-item @if ($loop->first) active @endif" style="--bs-aspect-ratio: 50%;">
            <img src="storage/{{$noticia->imagem}}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5><a href="{{route('news_id', $noticia->id)}}">{{$noticia->resumo}}</a></h5>
              <p>{{$noticia->data->format('d/m/Y')}} - {{$noticia->autor}}</p>
            </div>
          </div>
          @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{$loop->index}}" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel{{$loop->index}}" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </article>
  @endforeach
@endsection
