<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Artisan;
use Mockery;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Class CreateTaskCommandTest.
 *
 * @package Tests\Feature
 */
class CreateTaskCommandTest extends TestCase
{
    use RefreshDatabase;

    public function testItCreatesNewTask()
    {
        //1) Prepare

        //2) Run
        // Run make:task name
//        $this->artisan('route:list');
        $this->artisan('task:create', ['name' => 'Comprar pa']);
//        $this->artisan('make:task', ['name' => 'Comprar pa', '--no-interaction' => true]);

        //3) Assert
        // If you need result of console output
        $resultAsText = Artisan::output();

//        Task::create(['name' => 'Comprar pa']);
//        dd($resultAsText);
        //TODO Assert database Has?
        $this->assertDatabaseHas('tasks', [
           'name' => 'Comprar pa'
        ]);

        // Receive "Task has been added to database succesfully."
//        $this->assertTrue(str_contains($resultAsText,'Task has been added to database succesfully'));
        $this->assertContains('Task has been added to database succesfully', $resultAsText);

    }

    public function testItAsksForATaskNameAndThenCreatesNewTask()
    {

        // MOCKING
        // https://themsaid.com/building-testing-interactive-console-20160409
        $command = Mockery::mock(
            '\App\Console\Commands\CreateTask[ask]');

        // We expect the ask method to be called asking us to provide a task name
        $command->shouldReceive('ask')
            ->once()
            ->with('Event name?')
            ->andReturn('Pool party');

        $this->app['Illuminate\Contracts\Console\Kernel']->registerCommand($command);


//        dd($command);
        $this->artisan('create:task', ['--no-interaction' => true]);

        $resultAsText = Artisan::output();

        // See differences in output, check the same but error messages are not the same!
//        $this->assertTrue(str_contains($resultAsText,'Task name:'));
//        $this->assertContains($resultAsText,'Task name:');

    }
}
