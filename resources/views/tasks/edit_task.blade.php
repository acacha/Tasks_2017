@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Edit task
@endsection

@section('main-content')
    @if (Session::get('status') )
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Alert!</h4>
            {{ Session::get('status') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/tasks_php/{{ $task->id }}" method="POST">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="btn-group">
            <a href="/tasks_php" class="btn btn-success" role="button" aria-disabled="true"> < Back</a>
            <a href="/tasks_php/{{ $task->id}}" class="btn btn-warning" role="button" aria-disabled="true">Show</a>
            <button type="submit" class="btn btn-danger">Delete</button>
        </div>
    </form>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Task:</h3>
        </div>
        <form role="form" action="/tasks_php/{{ $task->id }}" method="POST" onsubmit="submit()">
            <div class="box-body">
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" dusk="name" id="name" placeholder="Enter name" value="{{ $task->name }}" name="name">
                </div>
                <div class="form-group">
                    <label for="name">User</label>

                    <select name="user_id" id="user_id" class="form-control" dusk="user_id">
                        @foreach ($users as $user)
                            @if ( $task->user_id == $user->id )
                                <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                            @else
                                <option value="{{ $user->id }}" >{{ $user->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </form>
    </div>
@endsection
