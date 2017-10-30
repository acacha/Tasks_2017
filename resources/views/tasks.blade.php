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


    <root>
        <child></child>
    </root>

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
