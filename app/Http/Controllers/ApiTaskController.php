<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

/**
 * Class ApiTaskController
 * @package App\Http\Controllers
 */
class ApiTaskController extends Controller
{
    /**
     * Show all tasks.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        return Task::all();
    }

    /**
     * Show a task.
     * @param Task $task
     * @return Task
     */
    public function show(Task $task)
    {
        return $task;
    }

    /**
     * Store task.
     *
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'user_id' => 'required'
        ]);

        $task = Task::create($request->only(['name','user_id']));

        return $task;
    }

    /**
     * Delete task.
     *
     * @param Request $request
     * @param Task $task
     * @return Task
     */
    public function destroy(Request $request, Task $task)
    {
        $task->delete();

        return $task;
    }

    /**
     * Update task.
     *
     * @param Request $request
     * @param Task $task
     * @return Task
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $task->name = $request->name;
        $task->save();

        return $task;
    }

}
