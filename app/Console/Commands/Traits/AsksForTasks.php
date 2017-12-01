<?php

namespace Acacha\Tasks\Console\Commands;

use App\Task;

/**
 * Trait AsksForTasks.
 *
 * @package Acacha\Tasks\Console\Commands
 */
trait AsksForTasks
{
    /**
     * Ask for tasks.
     *
     * @return mixed
     */
    protected function askForTasks()
    {
        $tasks = Task::all();
        $task_names = $tasks->pluck('name')->toArray();
        $task_name = $this->choice('Task id?',$task_names);
        return $tasks->where('name',$task_name)->first()->id;
    }
}