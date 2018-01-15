<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListTask;
use App\Http\Requests\ShowTask;
use App\Http\Resources\TaskResource;
use App\Http\Resources\TaskResourceCollection;
use App\Task;

/**
 * Class ApiPaginatedTaskController.
 */
class ApiPaginatedTaskController extends Controller
{
    /**
     * Show all tasks.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index(ListTask $request)
    {
        return new TaskResourceCollection(Task::paginate());
    }

}
