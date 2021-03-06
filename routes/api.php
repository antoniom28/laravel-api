<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get("/posts" , "Api\PostController@index"); //prende tutti i dati relativi ai post
Route::get("/posts/{id}" , "Api\PostController@index"); //prende il post specifico
Route::get("/users/{name}" , "Api\PostController@indexUsers"); //prende tutti gli utenti
Route::post("/new-comment" , "Api\PostController@newComment"); //salva i commenti