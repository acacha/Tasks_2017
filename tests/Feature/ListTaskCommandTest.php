<?php

namespace Tests\Feature;

use App\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

/**
 * Class ListTaskCommandTest.
 */
class ListTaskCommandTest extends TestCase
{
    use RefreshDatabase;

    /**
     * List task.
     *
     * @test
     */
    public function list_task()
    {
        $tasks = factory(Task::class, 3)->create();
        $this->artisan('task:list');

        $resultAsText = Artisan::output();

        $this->assertContains('Tasks:', $resultAsText);

        foreach ($tasks as $task) {
            $this->assertContains($task->name, $resultAsText);
            $this->assertContains((string) $task->user_id, $resultAsText);
            $this->assertContains($task->user->name, $resultAsText);
            $this->assertContains($task->description, $resultAsText);
        }
    }
}
