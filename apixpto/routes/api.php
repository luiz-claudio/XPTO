<?php

use Illuminate\Http\Request;


use App\Dados;


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

Route::post('login','ApiController@login');

Route::group(['middleware' => 'jwt.auth'], function(){




});

Route::get('auth/me', 'ApiController@me');
Route::get('/contatos','ContatosController@index');
Route::post('/contatos/cadastro','ContatosController@store');
Route::post('/contatos/update/{id}','ContatosController@update');
Route::get('/contatos/destroy/{id}','ContatosController@destroy');
Route::get('/contatos/show/{id}','ContatosController@show');




