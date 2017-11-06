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
    public function index()
    {
        return Task::all();
    }


    // Injecció de dependències => DI
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $task = Task::create([
            'name' => $request->name
        ]);

        return $task;
    }

    /**
     * Delete
     * @param Request $request
     * @param Task $task
     */
    public function destroy(Request $request, Task $task)
    {
//        $task = Task::findOrFail($id);
        $task->delete();

        return $task;
    }

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
