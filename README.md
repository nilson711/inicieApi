<p align="center"><a href="https://inicie.digital" target="_blank"><img src="https://inicie.digital/wp-content/uploads/2022/03/inicie_logo-03-1536x623.png" width="400"></a></p>



## Sobre a API Rest Inicie

Este projeto foi feito com o intuito de testar as funcionalidades de consumo de uma API REST utilizando o Framework Laravel.

Os requisitos para o projeto foram:
- Criar um novo usuário dentro do sistema (não utilizar nomes reais);
- Listar todos os usuários da API e encontrar o usuário criado através do ID do mesmo (o ID será retornado na operação de criação);
- Criar um novo post para o usuário criado;
- Criar um novo comentário dentro do post criado;
- Criar um novo comentário dentro do primeiro post da lista pública de posts;
- Apagar o comentário criado no requisito acima;
- Disponibilizar o projeto em um repositório do Git com as instruções para que a equipe de avaliação consiga executar;


## Estrutura da Aplicação
A aplicação é composta por:
- Quatro Controllers (ApiUserController*, CommentController, Controller, PostController);
- Três Models (ApiUser.php*, Comment.php, Post.php). Embora a aplicação não tenha banco de dados local, foi aplicado nestes models algumas 'Rules' e o atributo $fillable para preenchimento vários valores de uma vez;
- Cinco Views (idUser, listUser, newUser, newUserSuccess, welcome);
- Seis Rotas sendo elas três de Usuários, uma de Post e duas de Comentários

*Embora o framework Laravel já crie o controller e o model User automaticamente, preferi criar o ApiUser para ficar mais claro a utilização do usuário na Api.

## Uso da Aplicação
### Novo Usuário
A aplicação é bem simples, ao iniciar aparecerá na tela apenas dois botões "Novo Usuário" e "Lista de Usuários".
Em "Novo Usuário" você será redirecionado para um formuário que deverá ser preenchido conforme os campos solicitados, após preechido você deve pressionar o botão "Criar Usuário", sem seguida será exibido os dados do usuário cadastrado. 

### Novo Post
Após ser cadastrado, o usuário aparecerá no topo da lista, para acessá-lo, deve-se digitar o número do Id no campo inferior direito da tela e pressionar o botão "Delalhes do ID".
Será exibido todos os detalhes do usuário e logo abaixo um formulário para criar um Post deste usuário. O post deve ter Título e texto, que após preenchidos deve-se clicar no botão "Postar", e o novo post será apresentado logo abaixo.


### Novo Comentário
Após fazer a Postagem, você poderá fazer um comentário, basta preecher os dados solicitados no Form e clicar no botão "Comentar" e pronto! O seu comentário estará visível dentro da Postagem.

## Token de Autenticação
A aplicação exige um token para realizar acesso para alguns métodos da API. Caso este token expire, será necessário gerar outro e substituí-lo no arquivo de Controller localizado na pasta app/Http/Controllers/Controller.php linha 17.

