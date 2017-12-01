<?php

namespace Tests\Feature;

use App\Task;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\View;
use Tests\TestCase;

/**
 * Class CreateTaskCommandTest.
 */
class TaskControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Set up tests.
     */
    public function setUp()
    {
        parent::setUp();
        initialize_task_permissions();
        $this->withoutExceptionHandling();
    }

    /**
     * Login as task manager.
     */
    protected function loginAsTaskManager()
    {
        $user = factory(User::class)->create();
        $user->assignRole('task-manager');
        $this->actingAs($user);
        View::share('user', $user);
    }

    /**
     * List tasks.
     *
     * @test
     */
    public function list_tasks()
    {
        factory(Task::class, 3)->create();

        $this->loginAsTaskManager();

        $response = $this->get('/tasks_php');

        $response->assertSuccessful();

        $response->assertSuccessful();
        $response->assertViewIs('tasks.list_tasks');
        $tasks = Task::with('user')->get();
        $response->assertViewHas('tasks', $tasks);

        foreach ($tasks as $task) {
            $response->assertSee($task->name);
            $response->assertSee($task->user->name);
        }
    }

    /**
     * Show a task.
     *
     * @test
     */
    public function show_a_task()
    {
        $task = factory(Task::class)->create();

        $this->loginAsTaskManager();

        $response = $this->get('/tasks_php/'.$task->id);

        $response->assertSuccessful();
        $response->assertViewIs('tasks.show_task');
        $response->assertViewHas('task');

        $response->assertSeeText($task->name);
    }

    /**
     * Show Create form task.
     *
     * @test
     */
    public function show_create_form_task()
    {
        $user = factory(User::class)->create();
        $user->assignRole('task-manager');
        $this->actingAs($user);
        View::share('user', $user);

        $response = $this->get('/tasks_php/create');
        $response->assertSuccessful();
        $response->assertViewIs('tasks.create_task');

        $response->assertSeeText('Create Task:');
    }

    /**
     * Store a task.
     *
     * @test
     */
    public function store_a_task()
    {
        $this->loginAsTaskManager();
        $user = factory(User::class)->create();
        $response = $this->post('/tasks_php', [
            'name'        => 'Comprar llet',
            'description' => 'description',
            'user_id'     => $user->id,
        ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('tasks', [
            'name'        => 'Comprar llet',
            'description' => 'description',
            'user_id'     => $user->id,
        ]);
    }

    /**
     * Show Edit form task.
     *
     * @test
     */
    public function show_edit_form_task()
    {
        $user = factory(User::class)->create();
        $user->assignRole('task-manager');
        $this->actingAs($user);
        View::share('user', $user);

        $response = $this->get('/tasks_php/edit');
        $response->assertSuccessful();
        $response->assertViewIs('tasks.edit_task');

        $response->assertSeeText('Edit Task:');
    }

    /**
     * Update a task.
     *
     * @test
     */
    public function update_a_task()
    {
        $this->loginAsTaskManager();
        $task = factory(Task::class)->create();
        $newTask = factory(Task::class)->make();

        $response = $this->put('/tasks_php/'.$task->id, [
            'name'        => $newTask->name,
            'user_id'     => $newTask->user_id,
            'description' => $newTask->description,
        ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('tasks', [
            'id'          => $task->id,
            'name'        => $newTask->name,
            'description' => $newTask->description,
        ]);

        $this->assertDatabaseMissing('tasks', [
            'id'          => $task->id,
            'name'        => $task->name,
            'description' => $task->description,
        ]);
    }

    /**
     * Destroy a task.
     *
     * @test
     */
    public function destroy_a_task()
    {
        $this->loginAsTaskManager();

        $task = factory(Task::class)->create();

        $response = $this->delete('/tasks_php/'.$task->id);

        $this->assertDatabaseMissing('tasks', [
            'name'        => $task->name,
            'description' => $task->description,
        ]);

        $response->assertRedirect('tasks_php');
    }
}
