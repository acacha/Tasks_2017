<?php

namespace Tests\Feature;

use App\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Mockery;
use Tests\TestCase;

/**
 * Class EditTaskCommandTest.
 */
class EditTaskCommandTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Edit task.
     *
     * @test
     */
    public function edit_task()
    {
        $task = factory(Task::class)->create();
        $this->artisan('task:edit', ['id' => $task->id, 'name' => 'Got to Pool party', 'user_id' => $task->user_id, 'description' => 'with cool girls']);

        $resultAsText = Artisan::output();

        $this->assertDatabaseHas('tasks', [
           'id'          => $task->id,
           'name'        => 'Got to Pool party',
           'user_id'     => $task->user_id,
           'description' => 'with cool girls',
        ]);

        $this->assertDatabaseMissing('tasks', [
            'id'          => $task->id,
            'name'        => $task->name,
            'user_id'     => $task->user_id,
            'description' => $task->description,
        ]);

        $this->assertContains('Task has been edited succesfully', $resultAsText);
    }

    /**
     * Edit task with wizard.
     *
     * @test
     */
    public function edit_task_with_wizard()
    {
        $command = Mockery::mock('App\Console\Commands\\EditTaskCommand[ask,choice]');
        $task = factory(Task::class)->create();

        $command->shouldReceive('choice')
            ->once()
            ->with('Task id?', [0 => $task->name])
            ->andReturn($task->name);
        $command->shouldReceive('ask')
            ->once()
            ->with('Task name?')
            ->andReturn('Pool party');

        $command->shouldReceive('ask')
            ->once()
            ->with('Task description?')
            ->andReturn('with cool girls');

        $command->shouldReceive('ask')
            ->once()
            ->with('User id?')
            ->andReturn($task->user_id);

        $this->app['Illuminate\Contracts\Console\Kernel']->registerCommand($command);

        $this->artisan('task:edit');

        $this->assertDatabaseHas('tasks', [
            'id'          => $task->id,
            'name'        => 'Pool party',
            'user_id'     => $task->user_id,
            'description' => 'with cool girls',
        ]);

        $this->assertDatabaseMissing('tasks', [
            'id'          => $task->id,
            'name'        => $task->name,
            'user_id'     => $task->user_id,
            'description' => $task->description,
        ]);

        $resultAsText = Artisan::output();
        $this->assertContains('Task has been edited succesfully', $resultAsText);
    }
}
