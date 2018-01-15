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
            $browser->maximize();
            $browser->visit(new VueTasksPage())
                    ->seeTitle('Tasques new')
                    ->dontSeeAlert('Tasques new')
                    ->seeBox('Tasques new')
                    ->assertVue('tasks', $tasks->toArray(), '@tasks')
                    ->seeTasks($tasks);
        });
    }

    /**
     * Reload.
     *
     * @test
     */
    public function reload()
    {
        $this->browse(function (Browser $browser) {
            $this->login($browser);
            $tasks = factory(Task::class,5)->create();
            $browser->maximize();
            $browser->visit(new VueTasksPage())
                ->seeTitle('Tasques new')
                ->dontSeeAlert('Tasques new')
                ->seeBox('Tasques new')
                ->assertVue('tasks', $tasks->toArray(), '@tasks')
                ->seeTasks($tasks);

            $task = factory(Task::class)->create();

            $browser->reload()
//                ->assertVisible('div.overlay>.fa-refresh')
                ->assertVue('loading', true, '@tasks')
                ->waitUntilMissing('div.overlay>.fa-refresh')
                ->assertVue('loading', false, '@tasks')
                ->seeTask($task);
        });
    }

    /**
     * See completed tasks.
     *
     * @test
     *
     */
    public function see_completed_tasks()
    {
        $this->browse(function (Browser $browser) {
            $this->login($browser);
            $tasks = factory(Task::class,5)->create();
            $completed_tasks = factory(Task::class, 3)->states('completed')->create();

            $browser->maximize();
            $browser->visit(new VueTasksPage())
                ->seeTitle('Tasques new')
                ->applyCompletedFilter()
                ->seeTasks($completed_tasks)
                ->dontSeeTasks($tasks);
        });
    }

    /**
     * See pending tasks.
     *
     * @test
     * @group current
     *
     */
    public function see_pending_tasks()
    {
        $this->browse(function (Browser $browser) {
            $this->login($browser);
            $tasks = factory(Task::class,5)->create();
            $completed_tasks = factory(Task::class, 3)->states('completed')->create();

            $browser->maximize();
            $browser->visit(new VueTasksPage())
                ->seeTitle('Tasques new')
                ->applyPendingFilter()
                ->seeTasks($tasks)
                ->dontSeeTasks($completed_tasks);
        });
    }
}
