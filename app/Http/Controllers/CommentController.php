<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    // O Token está no Controller Principal (App\Http\Controllers\Controller;)

    /**
     * *********************************************************************************************
     * Lista todos os comentários.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Response utilizando a Facade HTTP, passando o $token (para incluir os comentários do usuário), depois convertendo para json.
        $myComments = Http::withToken($this->tokenAPI)->get('https://gorest.co.in/public/v2/comments')->json();
    }

    
    /**
     * **********************************************************************************************
     * Armazena um novo comentário para o post 
     *
     * @param  \App\Http\Requests\StoreCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentRequest $request)
    {
        // Passa no Header o Accept para Json e o Token. Na rota ->post passa o idPost a qual o comentário pertence. Busca do $request os dados dos inputs e atribui aos campos correspondentes.
        $response = Http::accept('application/json')->withToken($this->tokenAPI, 'Bearer')->post('https://gorest.co.in/public/v2/posts/'.$request->idPost.'/comments', [
            'post_id' => $request->idPost,
            'name' => $request->nameComment,
            'email' => $request->emailComment,
            'body' => $request->comentario,
        ]);
       
        // retorna o usuário para a tela anterior
        return back()->withInput();
    }

   
    /**
     * **********************************************************************************************
     * Remove o comentário selecionado.
     *
     * param  \App\Models\Comment  $comment
     * @param Integer
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // O response utiliza o token para autenticar. Utilizando o Verbo delete, passa o id do comentário a ser deletado.
        $response = Http::withToken($this->tokenAPI)->delete('https://gorest.co.in/public/v2/comments/'.$id);

        // retorna o usuário para a tela anterior
        return back()->withInput();
        
    }
}
