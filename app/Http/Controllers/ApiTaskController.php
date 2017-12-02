<?php

namespace App\Http\Controllers;

use App\Http\Requests\DestroyTask;
use App\Http\Requests\ListTask;
use App\Http\Requests\ShowTask;
use App\Http\Requests\StoreTask;
use App\Http\Requests\UpdateTask;
use App\Task;

/**
 * Class ApiTaskController.
 */
class ApiTaskController extends Controller
{
    /**
     * Show all tasks.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index(ListTask $request)
    {
        return Task::all();
    }

    /**
     * Show a task.
     *
     * @param ShowTask $task
     *
     * @return Task
     */
    public function show(ShowTask $request, Task $task)
    {
        return $task;
    }

    /**
     * Store task.
     *
     * @param StoreTask $request
     *
     * @return mixed
     */
    public function store(StoreTask $request)
    {
        $task = Task::create($request->only(['name', 'user_id', 'description']));

        return $task;
    }

    /**
     * Delete task.
     *
     * @param DestroyTask $request
     * @param Task        $task
     *
     * @return Task
     */
    public function destroy(DestroyTask $request, Task $task)
    {
        $task->delete();

        return $task;
    }

    /**
     * Update task.
     *
     * @param UpdateTask $request
     * @param Task       $task
     *
     * @return Task
     */
    public function update(UpdateTask $request, Task $task)
    {
        $task->name = $request->name;
        $task->user_id = $request->user_id;
        $task->description = $request->description;
        $task->save();

        return $task;
    }
}
