<?php

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

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes

    // PURE PHP INTERFACE
    Route::get('tasks_php','TaskController@index');
    Route::post('tasks_php','TaskController@store');

    //PURE JAVASCRIPT INTERFACE + AJAX/AXIOS REQUESTS TO REST JSON API
    Route::view('/tasks','tasks');

    //API JSON
    // API: TODO move to routes/api.php file
    Route::get('api/tasks',                     'ApiTaskController@index');
    Route::get('api/tasks/{task}',              'ApiTaskController@show');
    Route::post('api/tasks',                    'ApiTaskController@store');
    Route::put('api/tasks/{task}',              'ApiTaskController@update');
    Route::delete('api/tasks/{task}',           'ApiTaskController@destroy');

    // API: TODO move to routes/api.php file
    Route::get('api/v1/users',                     'ApiUserController@index');
    Route::get('api/v1/users/{task}',              'ApiUserController@show');
    Route::post('api/v1/users',                    'ApiUserController@store');
    Route::put('api/v1/users/{task}',              'ApiUserController@update');
    Route::delete('api/v1/users/{task}',           'ApiUserController@destroy');

    Route::view('/proves','proves');
});

