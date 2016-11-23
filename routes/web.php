<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index');
//
//
//Route::resource('usuarios', 'UsuariosController');
//
//Route::resource('recetas', 'RecetasController');
//Route::resource('ingredientes', 'IngredientesController');



Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@index');
    Route::resource('jueces', 'JudgeController');
    Route::resource('participantes', 'ParticipantController');
    Route::resource('criterios', 'CriterionController');
    Route::resource('recetas', 'RecipeController');
    Route::get('votaciones/pendientes', 'VoteController@recipesPendingToVote');
    Route::resource('votaciones', 'VoteController@recipesVoted');

});

//Route::resource('admin/criterios', 'CriteriosController');
//Route::resource('admin/votaciones', 'VotacionesController');
//Route::get('admin/usuarios/participantes', 'AdminController@participantes');
//Route::get('admin/recetas/recetas', 'AdminController@recetas');
//Route::get('admin/reportes/participantesporestado', 'AdminController@participantesPorEstado');
