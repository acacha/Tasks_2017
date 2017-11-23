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
    Route::get('tasks_php'              ,'TaskController@index')->middleware('can:list-users');
    Route::get('tasks_php/{task}'       ,'TaskController@show');
    Route::post('tasks_php'             ,'TaskController@store');

    //PURE JAVASCRIPT INTERFACE + AJAX/AXIOS REQUESTS TO REST JSON API
    Route::view('/tasks','tasks');

    Route::view('/proves','proves');

    Route::view('/tokens','tokens');
});

