<?php

namespace App\Http\Controllers;

use App\Http\Requests\DestroyTask;
use App\Http\Requests\ListTask;
use App\Http\Requests\ShowTask;
use App\Http\Requests\StoreTask;
use App\Http\Requests\UpdateTask;
use App\Task;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

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
     * @param StoreTask $request
     *
     * @return mixed
     */
    public function store(StoreTask $request)
    {
        $task = Task::create([
            'name'          => $request->name,
            'description'   => $request->description,
            'user_id'       => $request->user_id,
        ]);

        Session::flash('status', 'Created ok!');

        return Redirect::to('/tasks_php/create');
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
     *
     * @return Task
     */
    public function update(UpdateTask $request, Task $task)
    {
        $task->update($request->only(['name', 'user_id', 'description']));

        Session::flash('status', 'Edited ok!');

        return Redirect::to('/tasks_php/edit/'.$task->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Task $task
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroyTask $request, Task $task)
    {
        $task->delete();
        Session::flash('status', 'Task was deleted successful!');

        return Redirect::to('/tasks_php');
    }
}
