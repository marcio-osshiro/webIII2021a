<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <title>Cadastro de Notícia</title>
  </head>
  <body>
    <div class="container">
      <h1>Cadastro de Notícia</h1>
      <form action="{{route('noticia_salvar')}}" method="post">
        {{ csrf_field() }}
        <div class="mb-3">
          <label for="id" class="form-label">ID</label>
          <input type="text" class="form-control" id="id" name="id" readonly value="{{$noticia->id}}">
        </div>
        <div class="mb-3">
          <label for="resumo" class="form-label">Resumo</label>
          <textarea class="form-control" id="resumo" name="resumo"  rows="3">{{$noticia->resumo}}</textarea>
        </div>
        <div class="mb-3">
          <label for="descricao" class="form-label">Descrição</label>
          <textarea class="form-control" id="descricao" name="descricao" rows="7">{{$noticia->descricao}}</textarea>
        </div>
        <div class="mb-3">
          <label for="resumo" class="form-label">Data</label>
          <input type="date" class="form-control" id="data" name="data" value="{{$noticia->data->format('Y-m-d')}}">
        </div>
        <div class="mb-3">
          <label for="autor" class="form-label">Autor</label>
          <input type="text" class="form-control" id="autor" name="autor" value="{{$noticia->autor}}">
        </div>
        <div class="mb-3">
          <label for="categoria_id" class="form-label">Categoria</label>
          <select class="form-select" name="categoria_id" id="categoria_id">
            @foreach ($categorias as $categoria)
              <option
              {{ $noticia->categoria_id == $categoria->id?"selected":""}}
              value="{{$categoria->id}}">{{$categoria->descricao}}</option>
            @endforeach
          </select>
        </div>

        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
      </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>
