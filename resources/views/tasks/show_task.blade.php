@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Task
@endsection


@section('main-content')
    <form action="/tasks_php/{{ $task->id }}" method="POST">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="btn-group">
            <a href="/tasks_php" class="btn btn-success" role="button" aria-disabled="true"> < Back</a>
            <a href="/tasks_php/edit/{{ $task->id}}" class="btn btn-warning" role="button" aria-disabled="true">Edit</a>
            <button type="submit" class="btn btn-danger">Delete</button>
        </div>
    </form>


    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Task:</h3>
        </div>
        <div class="box-body">
            <ul>
                <li>Id: {{ $task->id }}</li>
                <li>Name: {{ $task->name }}</li>
                <li>User: {{ $task->user->name }}</li>
            </ul>
        </div>
    </div>
@endsection

