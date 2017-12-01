<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Mockery;
use Tests\TestCase;

/**
 * Class CreateTaskCommandTest.
 */
class CreateTaskCommandTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Create new task.
     *
     * @test
     */
    public function create_new_task()
    {
        $user = factory(User::class)->create();
        $this->artisan('task:create', [
            'name'    => 'Comprar pa',
            'user_id' => $user->id,
        ]);

        $resultAsText = Artisan::output();

        $this->assertDatabaseHas('tasks', [
           'name'    => 'Comprar pa',
           'user_id' => $user->id,
        ]);

        $this->assertContains('Task has been added to database succesfully', $resultAsText);
    }

    /**
     * Create new event with_wizard.
     */
    public function create_new_task_with_wizard()
    {
        $user = factory(User::class)->create();

        $command = Mockery::mock('App\Console\Commands\CreateTaskCommand[ask]');

        $command->shouldReceive('ask')
            ->once()
            ->with('Event name?')
            ->andReturn('Comprar llet');

        $command->shouldReceive('ask')
            ->once()
            ->with('User id?')
            ->andReturn($user->id);

        $this->app['Illuminate\Contracts\Console\Kernel']->registerCommand($command);

        $this->artisan('task:create');

        $this->assertDatabaseHas('tasks', [
            'name'    => 'Comprar llet',
            'user_id' => $user->id,
        ]);

        $resultAsText = Artisan::output();
        $this->assertContains('Task has been added to database succesfully', $resultAsText);
    }
}
