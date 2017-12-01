<?php

namespace Tests\Feature;

use App\Task;
use Illuminate\Support\Facades\Artisan;
use Mockery;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Class DeleteTaskCommandTest.
 *
 * @package Tests\Feature
 */
class DeleteTaskCommandTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Show task.
     *
     * @test
     */
    public function delete_task()
    {
        $task = factory(Task::class)->create();
        $this->artisan('task:delete', ['id' => $task->id]);

        $resultAsText = Artisan::output();

        $this->assertDatabaseMissing('tasks', [
            'id' => $task->id,
            'name' => $task->name,
            'user_id' =>  $task->user_id,
        ]);

        $this->assertContains('Task has been removed succesfully', $resultAsText);
    }

    /**
     * Show task with wizard.
     *
     * @test
     */
    public function delete_task_with_wizard()
    {
        $command = Mockery::mock('Acacha\Tasks\Console\Commands\DeleteTaskCommand[ask,choice]');
        $task = factory(Task::class)->create();

        $command->shouldReceive('choice')
            ->once()
            ->with('Task id?',[ 0 => $task->name])
            ->andReturn($task->name);

        $this->app['Illuminate\Contracts\Console\Kernel']->registerCommand($command);

        $this->artisan('task:delete');

        $resultAsText = Artisan::output();

        $this->assertDatabaseMissing('tasks', [
            'id' => $task->id,
            'name' => $task->name,
            'user_id' =>  $task->user_id,
            'description' => $task->description,
        ]);

        $this->assertContains('Task has been removed succesfully', $resultAsText);
    }
}
