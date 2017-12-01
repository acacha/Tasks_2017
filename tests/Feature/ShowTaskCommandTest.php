<?php

namespace Tests\Feature;

use App\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Mockery;
use Tests\TestCase;

/**
 * Class ShowTaskCommandTest.
 */
class ShowTaskCommandTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Show task.
     *
     * @test
     */
    public function show_task()
    {
        $task = factory(Task::class)->create();
        $this->artisan('task:show', ['id' => $task->id]);

        $resultAsText = Artisan::output();

        $this->assertContains('Task:', $resultAsText);

        $this->assertContains('Name: ', $resultAsText);
        $this->assertContains($task->name, $resultAsText);

        $this->assertContains('User id: ', $resultAsText);
        $this->assertContains((string) $task->user_id, $resultAsText);

        $this->assertContains('User name: ', $resultAsText);
        $this->assertContains($task->user->name, $resultAsText);

        $this->assertContains('Description: ', $resultAsText);
        $this->assertContains($task->description, $resultAsText);
    }

    /**
     * Show task with wizard.
     *
     * @test
     */
    public function show_task_with_wizard()
    {
        $command = Mockery::mock('App\Console\Commands\ShowTaskCommand[ask,choice]');
        $task = factory(Task::class)->create();

        $command->shouldReceive('choice')
            ->once()
            ->with('Task id?', [0 => $task->name])
            ->andReturn($task->name);

        $this->app['Illuminate\Contracts\Console\Kernel']->registerCommand($command);

        $this->artisan('task:show');

        $resultAsText = Artisan::output();

        $this->assertContains('Task:', $resultAsText);

        $this->assertContains('Name: ', $resultAsText);
        $this->assertContains($task->name, $resultAsText);

        $this->assertContains('User id: ', $resultAsText);
        $this->assertContains((string) $task->user_id, $resultAsText);

        $this->assertContains('User name: ', $resultAsText);
        $this->assertContains($task->user->name, $resultAsText);

        $this->assertContains('Description: ', $resultAsText);
        $this->assertContains($task->description, $resultAsText);
    }
}
