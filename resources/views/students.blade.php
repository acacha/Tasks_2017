@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Students
@endsection


@section('main-content')
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Projectes</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<table class="table table-bordered">
				<tbody><tr>
					<th style="width: 10px">#</th>
					<th>URL</th>
					<th>Github</th>
					<th>Alumne</th>
				</tr>
				@foreach ($assignments as $assignment)
					<tr>
						<td>1.</td>
						<td><a href="http://{{ $assignment->url }}">{{ $assignment->url }}</a></td>
						<th><a href="http://github.com/{{ $assignment->github }}">{{ $assignment->github }}</a></th>
						<td>
							{{ $assignment->student_name }}
						</td>
					</tr>
				@endforeach
				</tbody></table>
		</div>
		<!-- /.box-body -->
		<div class="box-footer clearfix">
			<ul class="pagination pagination-sm no-margin pull-right">
				<li><a href="#">«</a></li>
				<li><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">»</a></li>
			</ul>
		</div>
	</div>
@endsection
