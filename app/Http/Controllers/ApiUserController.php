<?php

namespace App\Http\Controllers;

use App\Models\ApiUser;
use App\Http\Requests\StoreApiUserRequest;
use App\Http\Requests\UpdateApiUserRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Mockery\Undefined;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;

use function GuzzleHttp\Promise\all;

class ApiUserController extends Controller
{
    // O Token está no Controller Principal (App\Http\Controllers\Controller;)

    /**
     * **********************************************************************************************
     * Exibe uma lista de todos os usuários.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Passa no Header o Accept para Json e o Token. Na rota ->get busca os dados de todos os usuários
        $response = Http::accept('application/json')->withToken($this->tokenAPI, 'Bearer')->get('https://gorest.co.in/public/v2/users')->json();

        // retorna para a view Lista de Usuário passando um array com todos os usuários
        return view('/listUsers', ['response' => $response]);

            
    }

        
    /**
     * **********************************************************************************************
     * Armazena os dados de um novo usuário passado pelo Request
     *
     * @param  \App\Http\Requests\StoreApiUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreApiUserRequest $request)
    {
         // Passa no Header o Accept para Json e o Token. Na rota ->post envia para a rota os dados do $request e atribui aos campos correspondentes.
        $response = Http::accept('application/json')->withToken($this->tokenAPI, 'Bearer')->post('https://gorest.co.in/public/v2/users', [
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'status' => $request->status,
        ]);

        // atribui uma nova variável $newUserCad ao $response
        $newUserCad = $response;

        // retorna para a view Novo Usuário e exibe os dados cadastrados
        return view('/newUserSuccess', ['newUserCad' => $newUserCad]);
    }


    /**
     * **********************************************************************************************
     * Exige os dados, posts e comentários do usuário do Request idUser
     *
     * param  \App\Models\ApiUser  $apiUser
     * @param Integer
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // busca o id que será pesquisado.
        $id = $request->input('idUser');

        // Response com os dados usuários. Passando o token e convertendo para formato json.
        $idUser = Http::withToken($this->tokenAPI)->get('https://gorest.co.in/public/v2/users/'.$id)->json();

        // Busca as postagens do usuário $id 
        $myPosts = Http::withToken($this->tokenAPI)->get('https://gorest.co.in//public/v2/users/'.$id.'/posts')->json();

        // Busca todos os comentários
        $allComments = Http::withToken($this->tokenAPI)->get('https://gorest.co.in/public/v2/comments')->json();
        
        // =====================================================
        $myComments = [];

        foreach ($myPosts as $post) {
            foreach ($allComments as $comment) {
                if ($comment ['post_id'] == $post ['id']) {
                    array_push($myComments, $comment);
                }
            }
        }
        // =====================================================

        // msgnf = Mensagem 'Not Found' retornada quando o id pesquisado não é encontrado.
        $msgnf = isset($idUser ['message'])? true: null;    //verifica se no array existe o índice 'message', se existir retorna true, se não retorna null.
        
        // se a mensagem 'Not Found' existir retorna para a view um array com os dados de 'Não existe'.
        if (isset($msgnf)) {
            return view('idUser', [
                'idUser' => [
                    'id' => '0',
                    'name' => 'Não existe',
                    'email' => 'Não existe',
                    'gender' => 'Não existe',
                    'status' => 'Não existe',
                ]
            ]);
        }else{ //caso 'Not Found' não existir, os dados do id pesquisados são enviados a view.
            return view('idUser', ['idUser' => $idUser] + ['myPosts' => $myPosts] + ['myComments' => $myComments] );
        }
    }
    
}
