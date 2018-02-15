<?php

namespace App\Observers;

use App\Task;
use App\TaskEvent;
use Carbon\Carbon;

/**
 * Class TaskObserver.
 *
 * @package App\Observers
 */
class TaskObserver
{
    /**
     * Listen to the Task created event.
     *
     * @param  \App\Task  $task
     * @return void
     */
    public function created(Task $task)
    {
        TaskEvent::create([
            'time' => Carbon::now(),
            'type' => 'created',
            'task_name' => $task->name,
            'user_name' => $task->user->name,
        ]);
    }



    /**
     * Listen to the Task retrieved event.
     *
     * @param  \App\Task  $task
     * @return void
     */
    public function updated(Task $task)
    {
        TaskEvent::create([
            'time' => Carbon::now(),
            'type' => 'updated',
            'task_name' => $task->name,
            'user_name' => $task->user->name,
        ]);
    }

    /**
     * Listen to the Task retrieved event.
     *
     * @param  \App\Task  $task
     * @return void
     */
    public function retrieved(Task $task)
    {
        TaskEvent::create([
            'time' => Carbon::now(),
            'type' => 'retrieved',
            'task_name' => $task->name,
            'user_name' => $task->user->name,
        ]);
    }

    /**
     * Listen to the Task deleting event.
     *
     * @param  \App\Task  $task
     * @return void
     */
    public function deleted(Task $task)
    {
        TaskEvent::create([
            'time' => Carbon::now(),
            'type' => 'deleted',
            'task_name' => $task->name,
            'user_name' => $task->user->name,
        ]);
    }
}