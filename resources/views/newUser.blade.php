<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Novo Usuário</title>
</head>
<body>
    <div class="col-md-12  offset-md-3" >
        <form action="{{route('newUser')}}" method="post">
            @csrf
            <img src="https://inicie.digital/wp-content/uploads/2022/03/inicie_logo-03-1536x623.png" alt="some text" width=20%>
            <hr>
            <h1>Cadastrar Novo Usuário</h1>
        <div class="form-row">
          <div class="col-md-4 mb-3">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-4 mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-4 mb-3">
              <label for="gender">Sexo</label>
              <select class="custom-select" name="gender" id="gender">
                  <option selected value="">Selecione</option>
                  <option value="male">Masculino</option>
                  <option value="female">Feminino</option>
              </select>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-4 mb-3">
            <label for="status">Status</label>
            <select class="custom-select" name="status" id="status">
                <option selected value="">Selecione</option>
                <option value="active">Ativo</option>
                <option value="inactive">Inativo</option>
            </select>
          </div>
        </div>
        <button class="btn btn-primary" type="submit">Criar Usuário</button>
            <a class="btn btn-secondary" href="/" role="button">Cancelar</a>
      </form>
    </div>    
</body>
</html>