<?php

namespace Tests\Feature;

use App\Task;
use App\TaskEvent;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TasksTimeLineTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function test_timeline_tasks()
    {
        $this->withoutExceptionHandling();

        // 1 Preparació
        $user = factory(User::class)->create();
        $this->actingAs($user);

        // CREATE TASK
        $task = Task::create([
            'name' => 'Comprar pa',
            'completed' => true,
            'user_id' => $user->id
        ]);

        // RETRIEVE
//        $time = Carbon:now()
        $task2 = Task::find($task->id);

        // UPDATE TASK
        $task->update([
            'name' => 'Comprar oli'
        ]);

        // DELETE TASK
        $task->delete();

//        $task->fresh();

        // 2 Execució

        //Interfícies: API / Web
        $response = $this->get('/tasks/timeline');

        $task_events = TaskEvent::all();

        // 3 Comprovació (Asserts)
        $response->assertSuccessful();
        $response->assertViewIs('tasks.timeline');
        $response->assertViewHas('task_events', $task_events);

//        $response->assertSee("User " . $user->name . " created task " . $task->name ." at " . $task->created_at);
//        $response->assertSee("User " . $user->name . " retrieved task " . $task->name . " at ");
//        $response->assertSee("User " . $user->name . " updated task " . $task->name . " at "); // PAYLOAD: informar nom antetior nom nou
//        $response->assertSee("User " . $user->name . " deleted task " . $task->name . " at "); // PAYLOAD: informar nom antetior nom nou
    }
}
