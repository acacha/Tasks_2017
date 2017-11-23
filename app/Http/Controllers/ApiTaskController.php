<?php

namespace App\Http\Controllers;

use App\Http\Requests\DestroyTask;
use App\Http\Requests\ListTask;
use App\Http\Requests\StoreTask;
use App\Http\Requests\UpdateTask;
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
    //CRUD CREATE|STORE RETRIEVE|LIST|SHOW U UPDATE|UPDATE D|DESTROY
    public function index(ListTask $request)
    {
        return Task::all();
    }

    /**
     * Show a task.
     * @param ShowTask $task
     * @return Task
     */
    public function show(ShowTask $task)
    {
        return $task;
    }

    /**
     * Store task.
     *
     * @param StoreTask $request
     * @return mixed
     */
    public function store(StoreTask $request)
    {
        $task = Task::create($request->only(['name','user_id']));

        return $task;
    }

    /**
     * Delete task.
     *
     * @param DestroyTask $request
     * @param Task $task
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
     * @param Task $task
     * @return Task
     */
    public function update(UpdateTask $request, Task $task)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $task->name = $request->name;
        $task->save();

        return $task;
    }

}
