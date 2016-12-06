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

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@index');
    Route::resource('jueces', 'JudgeController');
    Route::resource('participantes', 'ParticipantController');
    Route::resource('criterios', 'CriterionController');
    Route::resource('recetas', 'RecipeController');
    
    Route::get('roles/asignar/{user}', 'RoleController@roleAssign');
    Route::resource('roles', 'RoleController');

    Route::get('votaciones/pendientes', 'VoteController@recipesPendingToVote');
    Route::get('votaciones/realizadas', 'VoteController@recipesVoted');
    Route::post('votaciones/{recipe}', 'VoteController@store');
    Route::get('votaciones/{recipe}', 'VoteController@show');

    Route::get('reportes/ranking-ingredientes', 'ReportController@ingredientsMostUsed');
    Route::get('reportes/numero-participantes-por-ciudad', 'ReportController@numberOfParticipantsByCity');
    Route::get('reportes/total-participantes', 'ReportController@numberOfParticipants');
    Route::get('reportes/total-recetas', 'ReportController@numberOfRecipes');
    Route::get('reportes/total-recetas/{modality}', 'ReportController@numberOfRecipesPerModality');
    Route::get('reportes/ganadores/{phase}', 'ReportController@winnersByPhase');
});
