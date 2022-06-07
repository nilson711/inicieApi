<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Usuário Cadastrado</title>
</head>
<body>
    <div class="col-md-12  offset-md-3" >
        <h1>Usuário Cadastrado com sucesso!</h1>
        <h3>
            usuário: {{$newUserCad ['id']}} <br>
            usuário: {{$newUserCad ['name']}} <br>
            email: {{$newUserCad ['email']}} <br>
            sexo: {{$newUserCad ['gender']}} <br>
            status: {{$newUserCad ['status']}} <br>
        </h3>
    
        <a class="btn btn-primary" href="{{route('listUsers')}}" role="button">OK</a>
    </div>

</body>
</html>