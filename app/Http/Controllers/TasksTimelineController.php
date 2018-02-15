<?php

namespace App\Http\Controllers;

use App\TaskEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class TasksTimelineController.
 *
 * @package App\Http\Controllers
 */
class TasksTimelineController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $task_events = TaskEvent::all();

        return view('tasks.timeline', [
            'task_events' => $task_events
        ]);
    }
}
