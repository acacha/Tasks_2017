<?php

namespace Tests\Browser;

use App\Task;
use App\User;
use Tests\Browser\Pages\VueTasksPage;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Class VueTasksTest
 * @package Tests\Browser
 */
class VueTasksTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Set up tests.
     */
    public function setUp()
    {
        parent::setUp();
        initialize_task_permissions();
//        Artisan::call('passport:install');
//        $this->withoutExceptionHandling();
    }

    /**
     * Create user.
     *
     * @return mixed
     */
    protected function createUser()
    {
        return factory(User::class)->create();
    }

    /**
     * Assign role task manager.
     *
     * @param $user
     */
    protected function assignRoleTaskManager($user)
    {
        $user->assignRole('task-manager');
    }

    /**
     * @return mixed
     */
    protected function login($browser)
    {
        $user = $this->createUser();
        $this->assignRoleTaskManager($user);
        $browser->loginAs($user);
        return $user;
    }

    /**
     * List tasks.
     *
     * @test
     * @return void
     */
    public function list_tasks()
    {
        $this->browse(function (Browser $browser) {
            $this->login($browser);
            $tasks = factory(Task::class,5)->create();
            $browser->visit(new VueTasksPage())
                    ->see_title('Tasques new')
                    ->see_box('Tasques new')
                    ->assertVue('tasks', $tasks->toArray(), '@tasks')
                    ->see_tasks($tasks);
        });
    }
}
