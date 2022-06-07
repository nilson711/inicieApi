<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/newUser', function() {
    return view('newUser');
});

Route::get('/newUserSuccess', function() {
    return view('newUserSuccess');
});

// Route::get('/listUsers', function() {
//     return view('listUsers');
// });

