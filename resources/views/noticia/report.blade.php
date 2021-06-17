<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title></title>
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      body {
        margin: 1rem 2rem;
      }
      h1 {
        font-size: 3rem;
        text-align: center;
      }
      img {
        width: 200px;
        object-fit: cover;
      }
      div {
        page-break-inside: avoid;
      }
      article {
        border: 1px solid black;
        padding: 0.5rem;
        margin: 0.5rem 0;
      }
    </style>
  </head>
  <body>
    <h1>Listagem de Notícias</h1>
    @foreach ($noticias as $noticia)
      <div>
        <article>
          <h1>{{$noticia->id}}-{{$noticia->data->format('d-m-Y')}}-{{$noticia->autor}}</h1>

          @if($noticia->imagem != "")
            <img src="{{storage_path("app/public/$noticia->imagem")}}" >
          @endif
          </td>
          <p>Resumo: {{$noticia->resumo}}</p>
          <p>{{$noticia->descricao}}</p>
        </article>
      </div>
    @endforeach

    <div class="rodape"></div>

    <script type="text/php">
        if (isset($pdf)) {
            $pdf->page_script('
                $text = __("Página :pageNum/:pageCount", ["pageNum" => $PAGE_NUM, "pageCount" => $PAGE_COUNT]);
                $font = null;
                $size = 9;
                $color = array(0,0,0);
                $word_space = 0.0;  //  default
                $char_space = 0.0;  //  default
                $angle = 0.0;   //  default

                // Compute text width to center correctly
                $textWidth = $fontMetrics->getTextWidth($text, $font, $size);

                $x = ($pdf->get_width() - $textWidth) / 2;
                $y = $pdf->get_height() - 35;

                $pdf->text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
            '); // End of page_script
        }
    </script>

  </body>
</html>
