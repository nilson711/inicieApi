<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Api Inicie</title>
</head>
<body>
    <div class="col-md-12" style="display: flex; flex-direction: row; justify-content: center; align-items: center">
        <h1>API Rest</h1>
    </div>
    <div class="col-md-12" style="display: flex; flex-direction: row; justify-content: center; align-items: center">
        <img src="https://inicie.digital/wp-content/uploads/2022/03/inicie_logo-03-1536x623.png" alt="some text" width=20%>
    </div>
    <hr>
    <div class="col-md-12" style="display: flex; flex-direction: row; justify-content: center; align-items: center">
        <div>
            <ul>
                <a class="btn btn-primary" href="/newUser">Novo Usuário</a>
            </ul>
            <ul>
                <a class="btn btn-primary" href={{route('listUsers')}}>Lista de Usuários</a>
            </ul>
        </div>
    </div>
</body>
</html>