@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Tasks
@endsection

@section('main-content')

    <widget>
        <p slot="title">Tasques</p>
        <tasks></tasks>
        <p slot="Footer">Footer</p>
    </widget>

    <div class="box box-primary" v-cloak>
        <div class="box-header with-border">
            <h3 class="box-title"><slot name="title">Tasks:</slot></h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>

        </div>

        <div class="box-body" style="">
            <tasks></tasks>
        </div>
        <div class="box-footer"><slot name="footer">@Copyright Sergi Tur</slot></div>
    </div>

    <message title="Message" message="{{ $message or '' }}" color="info"></message>

    {{--<message title="Error"></message>--}}

    {{--<message title="Error" message="Error greu"></message>--}}

    {{--<message message="Error greu"></message>--}}

    {{--<message></message>--}}

    {{--<message title="Error">Error ha petat tot!</message>--}}


    {{--<message title="Error" message="Error ha petat tot!"></message>--}}

    {{--<message>--}}
        {{--<slot name="title">Error</slot>--}}
        {{--<slot name="message">Error ha petat tot</slot>--}}
    {{--</message>--}}
@endsection
