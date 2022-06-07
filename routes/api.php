<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v2')->group(function(){
    
    // Rotas de Usuários
    Route::get('/users', 'App\Http\Controllers\ApiUserController@index')->name('listUsers');
    Route::get('/users/{id}', 'App\Http\Controllers\ApiUserController@show')->name('idUser');
    Route::post('/users', 'App\Http\Controllers\ApiUserController@store')->name('newUser');

    // Rotas de Posts
    Route::post('/users/{id}/posts', 'App\Http\Controllers\PostController@store')->name('newPost');

    // Rotas de Comentários
    Route::post('/posts/{id}/comments', 'App\Http\Controllers\CommentController@store')->name('newComment');
    Route::post('/comments/{id}', 'App\Http\Controllers\CommentController@destroy')->name('delComment');
    
});

