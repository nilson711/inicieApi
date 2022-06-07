<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Lista de Usuários</title>
</head>
<body>
    <div class="col-md-12  offset-md-3" >
      <h1>Lista de Usuários</h1>
      <hr>
      
        @foreach ($response as $item)
        <li>
          {{$item ['id']}} - {{$item ['name']}} <br>
        </li>
        @endforeach
        <hr>
        <div class="row">
          <div class="col-md-2">
            <a class="btn btn-primary" href="/newUser" role="button">Novo Usuário</a>
          </div>
          <div class="col-md-1">
            <a class="btn btn-secondary" href="/" role="button">Voltar</a>
          </div>
          <form action="{{route('idUser', ['0'])}}" method="get">
            @csrf
            <input type="number" name="idUser" id="idUser" title="Digite o Id do Usuário" required>
            <button class="btn btn-primary" type="submit">Detalhes do ID</button>
          </form>
        </div>
    </div>    
</body>
</html>