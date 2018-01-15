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
                ->applyPendingFilter()
                ->seeTasks($tasks)
                ->dontSeeTasks($completed_tasks);
        });
    }

    /**
     * Add task
     */
    public function add_task()
    {
        $this->browse(function (Browser $browser) {
            $this->login($browser);
            $browser->maximize();
            $task = factory(Task::class)->make();
            $browser->visit(new VueTasksPage())
                ->store_task($task)
                ->assertVue('adding', true, '@tasks') //  Test state
                ->waitForSuccessfulCreateAlert($task) // TODO
                ->assertVue('adding', false, '@tasks') //  Test state
                ->seeTask($task);
        });
    }

    /**
     * Edit task
     */
    public function edit_task()
    {
        $this->browse(function (Browser $browser) {
            $this->login($browser);
            $browser->maximize();
            $oldTask = factory(Task::class)->create();
            $newtask = factory(Task::class)->make();
            $newtask->id = $oldTask->id;
            $browser->visit(new VueTasksPage())
                ->update_task($newtask)
                ->assertVue('submit_editing', true, '@tasks') //  Test state
                ->waitForSuccessfulEditAlert($newtask) // TODO
                ->assertVue('submit_editing', false, '@tasks') //  Test state
                ->seeTask($newtask)
                ->dontSeeTask($oldTask);
        });
    }

    /**
     * Cancel edit
     */
    public function cancel_edit()
    {
        $this->browse(function (Browser $browser) {
            $this->login($browser);
            $browser->maximize();
            $oldTask = factory(Task::class)->create();
            $newtask = factory(Task::class)->make();
            $newtask->id = $oldTask->id;
            $browser->visit(new VueTasksPage())
                ->edit_task($newtask)
                ->assertVue('editing', true, '@tasks') //  Test state
                ->cancel_update()
                ->assertVue('editing', false, '@tasks') //  Test state
                ->seeTask($oldTask)
                ->dontSeeTask($newtask);
        });
    }

    /**
     * Delete task
     */
    public function delete_task()
    {
        $this->browse(function (Browser $browser) {
            $this->login($browser);
            $browser->maximize();
            $task = factory(Task::class)->create();
            $browser->visit(new VueTasksPage())
                ->destroy_task($task)
                ->assertVue('submitting_destroy', true, '@tasks') //  Test state
                ->waitForSuccessfulDeleteAlert($task) // TODO
                ->assertVue('submitting_destroy', false, '@tasks') //  Test state
                ->dontSeeTask($task);
        });
    }

    /**
     * Cancel delete task
     */
    public function cancel_delete_task()
    {
        $this->browse(function (Browser $browser) {
            $this->login($browser);
            $browser->maximize();
            $task = factory(Task::class)->create();
            $browser->visit(new VueTasksPage())
                ->delete_task($task)
                ->assertVue('deleting', true, '@tasks') //  Test state
                ->cancel_delete() // TODO
                ->assertVue('deleting', false, '@tasks') //  Test state
                ->seeTask($task);
        });
    }

    /**
     * Toogle complete task.
     */
    public function toogle_complete_task()
    {
        $this->browse(function (Browser $browser) {
            $this->login($browser);
            $browser->maximize();
            $task = factory(Task::class)->create();
            $browser->visit(new VueTasksPage())
                ->toogle_complete($task)
                ->assertVue('toogle_completion', true, '@tasks') //  Test state
                ->waitForCompletedTask() // TODO
                ->assertVue('toogle_completion', false, '@tasks') //  Test state
                ->seeCompletedTask($task) //TODO
                ->toogle_complete($task)
                ->assertVue('toogle_completion', true, '@tasks') //  Test state
                ->waitForUnCompletedTask() // TODO
                ->assertVue('toogle_completion', false, '@tasks') //  Test state
                ->seeUnCompletedTask($task); //TODO
        });
    }

}
