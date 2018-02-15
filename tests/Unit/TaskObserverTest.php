<?php

namespace Tests\Unit;

use App\Task;
use App\User;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Class TaskObserverTest.
 *
 * @package Tests\Unit
 */
class TaskObserverTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function a_created_event_is_logged_when_task_is_created()
    {
        // CREATE TASK

        $user = factory(User::class)->create();
        $time = Carbon::now();
        $task = Task::create([
            'name' => 'Comprar pa',
            'completed' => true,
            'user_id' => $user->id
        ]);

        // An event is fired

        // A created event is logged in tasks_events table
        $this->assertDatabaseHas('task_events', [
            'time' => $time,
            'type' => 'created',
            'task_name' => $task->name,
            'user_name' => $user->name
        ]);
    }
}
