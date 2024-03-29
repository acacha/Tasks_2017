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

use App\Mail\Hello;
use App\User;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    //adminlte_routes

    //TIMELINE
    Route::get('tasks/timeline', 'TasksTimelineController@index');

    // PURE PHP INTERFACE
    Route::get('tasks_php', 'TaskController@index');
    Route::get('tasks_php/create', 'TaskController@create');
    Route::get('tasks_php/edit/{task}', 'TaskController@edit');
    Route::get('tasks_php/{task}', 'TaskController@show');
    Route::post('tasks_php', 'TaskController@store');
    Route::put('tasks_php/{task}', 'TaskController@update');
    Route::delete('tasks_php/{task}', 'TaskController@destroy');

    //PURE JAVASCRIPT INTERFACE + AJAX/AXIOS REQUESTS TO REST JSON API
    Route::view('/tasks', 'tasks');
    Route::view('/tasks1', 'tasks1');
    Route::view('/tasks2', 'tasks2');
    Route::view('/tasks_old', 'tasks_old');

    Route::view('/tokens', 'tokens');

    Route::get('/students', 'StudentAssignmentsController@index');

    // Email

    Route::get('/email', 'EmailController@index');
    Route::post('/email', 'EmailController@store');

    //PROVES
    Route::view('/proves', 'proves');

    Route::get('tasca',function() {

       //        Wrapper -> Design pattern --> Decoradores
       // Wrap
       $task = App\Task::find(1); // Open To Extension Closed to modification
       return new \App\Http\Resources\TaskResource($task);
    });

    Route::get('tasca1',function() {
        return App\Task::find(1);
    });

    Route::get('tascas',function() {
        return \App\Http\Resources\TaskResource::collection(App\Task::all());
    });

    Route::get('/test_send_email',function() {
        $user = User::find(1);
        $hello = new Hello($user);
        Mail::to($user)->send($hello);
    });

    Route::get('/test_send_email2',function() {
        $user = User::find(1);
        $hello = new \App\Mail\HelloUser();
        Mail::to($user)->send($hello);
    });

    Route::get('/mailable', function () {
        $subject = 'Subject prova';
        $body = 'Contingut de proves';
        return new App\Mail\CustomEmail($subject, $body);
    });
});
