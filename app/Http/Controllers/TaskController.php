<?php

namespace App\Http\Controllers;

use App\Http\Requests\DestroyTask;
use App\Http\Requests\ListTask;
use App\Http\Requests\ShowTask;
use App\Http\Requests\StoreTask;
use App\Http\Requests\UpdateTask;
use App\Task;

/**
 * Class TaskController.
 */
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ListTask $request)
    {
        $tasks = Task::all();

        return view('tasks.list_tasks', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create_task');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTask $request)
    {
        Task::create([
            'name'    => $request->name,
            'user_id' => $request->user_id,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Task $task
     *
     * @return Task
     */
    public function show(ShowTask $request, Task $task)
    {
        return view('tasks.show_task', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Task $task
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('tasks.edit_task', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTask $request
     * @param Task       $task
     */
    public function update(UpdateTask $request, Task $task)
    {
        return $task;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Task $task
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroyTask $task)
    {
        //
    }
}
