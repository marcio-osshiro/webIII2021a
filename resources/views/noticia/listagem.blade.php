<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Listagem de Notícias</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
  </head>
  <body>
    <div class="container">
      <h1>Listagem</h1>
      <a href="noticia/novo" class="btn btn-primary">
        <i class="fas fa-file"></i>
         Novo
      </a>

      <!-- Optional JavaScript; choose one of the two! -->

      <!-- Option 1: Bootstrap Bundle with Popper -->
      <table class="table table-striped table-hover table-bordered table-sm">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Resumo</th>
            <th scope="col">Data</th>
            <th scope="col">Autor</th>
            <th scope="col">Categoria</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @forelse ($noticias as $noticia)
              <tr>
                <td>{{$noticia->id}}</td>
                <td>{{$noticia->resumo}}</td>
                <td>{{$noticia->data->format('d/m/Y') }}</td>
                <td>{{$noticia->autor}}</td>
                <td>{{$noticia->categoria->descricao}}</td>
                <td>
                  <a href="{{route('noticia_editar',['id' => $noticia->id])}}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                  <a href="{{route('noticia_excluir',['id' => $noticia->id])}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                </td>
              </tr>
          @empty
            <tr>
              <td>0</td>
              <td>Nenhum registro cadastrado</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>
