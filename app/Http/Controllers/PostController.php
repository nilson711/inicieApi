<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

    // O Token está no Controller Principal (App\Http\Controllers\Controller;)
    
    /**
     * **********************************************************************************************
     * Armazena um novo post
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
       
        // Passa no Header o Accept para Json e o Token. Na rota ->post passa o idUser a qual o post pertence. Busca do $request os dados dos inputs e atribui aos campos correspondentes.
        $response = Http::accept('application/json')->withToken($this->tokenAPI, 'Bearer')->post('https://gorest.co.in/public/v2/users/'.$request->idUser.'/posts', [
            'user_id' => $request->idUser,
            'title' => $request->titlePost,
            'body' => $request->txtpost,
        ]);

        // retorna o usuário para a tela anterior
        return back()->withInput();
    }

    public function index()
    {
        
    }

}
