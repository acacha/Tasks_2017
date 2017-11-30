@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Create task
@endsection

@section('main-content')

    @if (Session::get('status') )
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Alert!</h4>
            {{ Session::get('status') }}
        </div>
    @endif

    <a href="/tasks_php" class="btn btn-success" role="button" aria-disabled="true"> < Back</a>

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Create Task:</h3>
        </div>
        <form role="form" action="/tasks_php" method="POST">
            <div class="box-body">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <users></users>
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>





@endsection

