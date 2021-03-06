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

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');

Route::get('/', 'PagesController@index');
Route::get('home', 'PagesController@index');

Route::get('misrecetas/ingredients-by-keyword', 'ParticipantRecipeController@getIngredientsByKeyword');
Route::get('misrecetas/all-ingredients', 'ParticipantRecipeController@getAllIngredients');
Route::get('misrecetas/get-tags', 'ParticipantRecipeController@getTags');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('misrecetas', 'ParticipantRecipeController');
    Route::get('perfiles/changePassword', 'UserController@changePassword');
    Route::post('perfiles/updatePassword', 'UserController@updatePassword');
    Route::resource('perfiles', 'UserController');
});

Route::group(['middleware' => ['auth', 'role:super_admin|judge'], 'prefix' => 'admin'], function () {
    Route::get('/', 'ParticipantController@index');
    Route::resource('jueces', 'JudgeController');
    Route::resource('participantes', 'ParticipantController');
    Route::resource('criterios', 'CriterionController');

    Route::get('recetas/user/{user}', 'AdminRecipeController@userRecipes');
    Route::resource('recetas', 'AdminRecipeController');

    Route::get('roles/role-assignment', 'RoleController@roleAssignment');
    Route::post('roles/role-attachment', 'RoleController@roleAttachment');
    Route::delete('roles/role-detachment/{user}/{role}', 'RoleController@roleDetachment');
    Route::resource('roles', 'RoleController');

    Route::get('votaciones/pendientes', 'VoteController@recipesPendingToVote');
    Route::get('votaciones/realizadas', 'VoteController@recipesVoted');
    Route::get('votaciones/realizadas/{recipe}', 'VoteController@showRecipeScore');
    Route::get('votaciones/create/{id}', 'VoteController@create');
    Route::resource('votaciones', 'VoteController');

    Route::get('reportes/votaciones/realizadas', 'ReportController@recipesVoted');
    Route::get('reportes/votaciones/pendientes', 'ReportController@recipesPendingToVote');
    Route::get('reportes/numero-participantes-por-ciudad', 'ReportController@numberOfParticipantsByCity');
    Route::get('reportes/general', 'ReportController@general');
    Route::get('reportes/ranking-ingredientes', 'ReportController@mostUsedIngredients');
    Route::get('reportes/ranking/fase/{phase}', 'ReportController@rankingByPhase');
    Route::get('reportes/clasificados/fase/{phase}', 'ReportController@classifieds');
});
