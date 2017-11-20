@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Tasks
@endsection

@section('main-content')
    <ul>
        @foreach ($tasks as $task)
            <li>{{ $task->name }}</li>
        @endforeach
    </ul>

@endsection
