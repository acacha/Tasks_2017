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

        Task::create([
            'name' => $request->name
        ]);
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
    }



}
