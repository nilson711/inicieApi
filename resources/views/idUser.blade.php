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
      <h1>Detalhes do Usuário</h1>
      <hr>
      @if ($idUser ['id'] != null)
          Id: {{ $idUser ['id'] }} <br>
          Nome: {{ $idUser ['name'] }} <br>
          Email: {{ $idUser ['email'] }} <br>
          Sexo: {{ $idUser ['gender'] }} <br>
          Status: {{ $idUser ['status'] }} <br>
      @endif
        <hr>
        <h4>Criar Post</h4>
        
        <div class="col-md-6">
          <form action="{{route('newPost', [$idUser ['id']] )}}" method="post">
          @csrf
            <input type="number" name="idUser" id="idUser" value="{{$idUser ['id']}}" style="display: none">
            <div class="form-group">
              <input type="text" name="titlePost" id="titlePost" class="form-control" placeholder="Título da sua Postagem" required>
            </div>
            
            <div class="form-group">
              <textarea name="txtpost" id="txtpost" cols="60"  rows="2" placeholder="No que você está pensando?" class="form-control" required></textarea>
            </div>
              <button type="submit" class="btn btn-primary">Postar</button>

          </form>
        </div>
        <hr>
        <div class="col-md-6">
          <h4>Postagens</h4>
          @foreach ($myPosts as $post)
             
             <div class="card border-secondary mb-3">
              <div class="card-header"><h5>{{ $post ['title'] }}</h5></div>
              <div class="card-body text-secondary">
                <p class="card-text"><h5>{{ $post ['body']}}</h5></p>
                <b>Comentários</b><br>
                <p>
                  <i>
                    @foreach ($myComments as $comment)
                    @if ($comment ['post_id'] == $post ['id'])
                      <div class="card">
                        <div class="card-body">
                          <h6 class="card-subtitle mb-2 text-muted">{{$comment ['name']}} disse:</h6>
                          <p class="card-text">"{{$comment ['body']}}"</p>
                          <form action="{{route('delComment', [$comment ['id']] )}}" method="post">
                            @csrf
                            <button class="btn btn-danger btn-sm float-right" href="" >Apagar</button>
                          </form>
                        </div>
                      </div><br>
                    @endif
                    @endforeach
                  </i>
                </p>
                    
             
              <div class="card bg-light mb-3" >
                <div class="card-header">Fazer comentário</div>
                <div class="card-body">
                  <form action="{{route('newComment', [$post ['id']])}}" method="post">
                    @csrf
                    <div class="form-group">
                      <div class="row">
                        <input type="number" name="idPost" id="idPost" value="{{$post ['id']}}" style="display: none">
                        <div class="col-md-6">
                          <input type="text" name="nameComment" id="nameComment" class="form-control" placeholder="Digite seu nome" required>
                        </div>
                        <div class="col-md-6">
                          <input type="email" name="emailComment" id="emailComment" class="form-control" placeholder="Digite seu email" required>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <input type="text" name="comentario" id="comentario" class="form-control" placeholder="Escreva um comentário..." required>
                    </div>
                    <button type="submit" class="btn btn-primary">Comentar</button>
                  </form>
                  
                </div>
              </div>
              </div>
            </div>
              
          @endforeach
        </div>
        <hr>
        <div class="row">
          <a class="btn btn-secondary" href="{{route('listUsers')}}" role="button">Voltar</a>
          
        </div>
    </div>    
</body>
</html>