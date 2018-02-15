@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Timeline de tasques
@endsection

@section('main-content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Timeline</h3>
        </div>
        <ul>
            @foreach ($task_events as $event)
                <li>User {{ $event->user_name }} {{ $event->type }} task {{ $event->task_name }} at {{ $event->time }}</li>

                {{--$response->assertSee("User " . $user->name . " created task " . $task->name ." at " . $task->created_at);--}}
                {{--$response->assertSee("User " . $user->name . " retrieved task " . $task->name . " at ");--}}
                {{--$response->assertSee("User " . $user->name . " updated task " . $task->name . " at "); // PAYLOAD: informar nom antetior nom nou--}}
                {{--$response->assertSee("User " . $user->name . " deleted task " . $task->name . " at "); // PAYLOAD: informar nom antetior nom nou--}}

            @endforeach

        </ul>
    </div>

@endsection

