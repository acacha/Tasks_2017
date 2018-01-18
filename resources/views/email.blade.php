@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Send email
@endsection

@section('main-content')

    @if (Session::get('done') )
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Send!</h4>
            Your email has been successfully send!
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

    <div class="box box-info">
        <div class="box-header ui-sortable-handle" style="cursor: move;">
            <i class="fa fa-envelope"></i>

            <h3 class="box-title">Send Email</h3>
            <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <form action="/email" method="post" >
            <div class="box-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="email" class="form-control" name="emailto" placeholder="Email to:">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="subject" placeholder="Subject">
                    </div>
                    <div>
                        <textarea name="body" class="textarea" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
            </div>
            <div class="box-footer clearfix">
                <button type="submit" class="pull-right btn btn-default" id="sendEmail">Send
                    <i class="fa fa-arrow-circle-right"></i></button>
            </div>
        </form>
    </div>
@endsection
