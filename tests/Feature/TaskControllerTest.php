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
        $this->withoutExceptionHandling();
    }

    /**
     * Can list tasks.
     *
     * @test
     */
    public function can_list_tasks()
    {
        factory(Task::class, 3)->create();

        $user = factory(User::class)->create();
        $this->actingAs($user);
        View::share('user', $user);

        $response = $this->get('/tasks_php');

        $response->assertSuccessful();

        $response->assertSuccessful();
        $response->assertViewIs('tasks_php');
        $tasks = Task::all();
        $response->assertViewHas('tasks', $tasks);

        foreach ($tasks as $task) {
            $response->assertSee($task->name);
        }
    }

    /**
     * Can show a task.
     *
     * @test
     */
    public function can_show_a_task()
    {
        $task = factory(Task::class)->create();
        $user = factory(User::class)->create();
        $this->actingAs($user);
        View::share('user', $user);

        $response = $this->get('/tasks_php/'.$task->id);

        $response->assertSuccessful();
        $response->assertViewIs('show_task');
        $response->assertViewHas('task');

        $response->assertSeeText($task->name);
    }

    /**
     * Store a task.
     *
     * @test
     */
    public function store_a_task()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $response = $this->post('/tasks', ['name' => 'Comprar llet']);

        $response->assertSuccessful();

        $this->assertDatabaseHas('tasks', [
            'name' => 'Comprar llet',
        ]);

//        $response->assertRedirect('tasks/create');
    }

    /**
     * Update a task.
     */
    public function update_a_task()
    {
        $task = factory(Task::class)->create();

        $newTask = factory(Task::class)->make();
        $response = $this->put('/tasks_php/'.$task->id, [
            'name'        => $newTask->name,
            'description' => $newTask->description,
        ]);

        $this->assertDatabaseHas('tasks_php', [
            'id'          => $task->id,
            'name'        => $newTask->name,
            'description' => $newTask->description,
        ]);

        $this->assertDatabaseMissing('tasks_php', [
            'id'          => $task->id,
            'name'        => $task->name,
            'description' => $task->description,
        ]);

        $response->assertRedirect('tasks/edit');
    }
}
