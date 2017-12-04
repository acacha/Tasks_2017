<?php

namespace App\Http\Controllers;

use App\Http\Requests\DestroyTask;
use App\Http\Requests\ListTask;
use App\Http\Requests\ShowTask;
use App\Http\Requests\StoreTask;
use App\Http\Requests\UpdateTask;
use App\Task;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

/**
 * Class StudentAssignmentsController.
 */
class StudentAssignmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ListTask $request)
    {
        $assignments = [
            (object) [
                'url' => 'tasks.quimgonzalez.2dam.iesebre.com' ,
                'student_name' => 'Quim Gonzalez'
            ],
            (object) [
                'url' => 'tasks.ericgarcia.2dam.iesebre.com' ,
                'student_name' => 'Eric Garcia'
            ],
            (object) [
                'url' => 'tasks.alexsorribes.2dam.iesebre.com' ,
                'student_name' => 'Alex Sorribes'
            ],
            (object) [
                'url' => 'tasks.gerardrey.2dam.iesebre.com' ,
                'student_name' => 'Gerard Rey'
            ],
            (object) [
                'url' => 'tasks.nataniel.2dam.iesebre.com' ,
                'student_name' => 'Nataniel Pont'
            ]
        ];

        return view('students', ['assignments' => $assignments]);
    }

}
