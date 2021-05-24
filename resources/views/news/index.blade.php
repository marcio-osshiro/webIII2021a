<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title></title>
  </head>
  <body>
    @foreach ($noticias as $noticia)
      <p>{{$noticia->resumo}}</p>
    @endforeach ($noticias as $noticia)

    <ul>
      @foreach ($categorias as $categoria)
          <li>{{$categoria->descricao}}</li>
      @endforeach
    </ul>

    @foreach ($categorias as $categoria)
      <div class="">
        <h1>{{$categoria->descricao}}</h1>
        <ul>
          @foreach ($categoria->noticias as $noticia)
            <li>{{$noticia->resumo}}</li>
          @endforeach
        </ul>
      </div>
    @endforeach

  </body>
</html>
