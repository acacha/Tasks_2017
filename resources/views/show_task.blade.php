@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Task
@endsection


@section('main-content')
	<ul>
		<li>Name: {{ $task->name }}</li>
	</ul>
@endsection
