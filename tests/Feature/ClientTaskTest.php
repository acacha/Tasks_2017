<?php

namespace Tests\Feature;

use App\Task;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Factories\ClientFactory;
use App\Users\Client;

class ClientTaskTests extends TestCase
{
    // NOTE: no update, no delete actions!!!

    // Projects: no specific table 1 project 1 database -> multiple database one per project -> multitenant (no applied here)

    // ROLES
    // Client: user with role client. Any additional info required

    // UI ELEMENTS
    // https://vuetifyjs.com/components/cards
    // https://vuetifyjs.com/layout/grid

    use RefreshDatabase;

    protected $client;

    /**
     * Set up tests.
     */
    public function setUp()
    {
        parent::setUp();
        // Create Client role and permissions:
        //  - create_client_task
        //  - pay_task
        initialize_client_permissions();
        Artisan::call('passport:install');
        $this->client = $this->createClient();
    }

    private function createClient()
    {
        $user = factory(User::class)->create();
        $client = ClientFactory::create($user);
        $this->assertInstanceOf($client,Client::class);
        $this->assertInstanceOf($client->user,User::class);
        $this->assertTrue($client->user->can('create_client_task'));
        $this->assertTrue($client->user->can('pay_task'));
    }

    protected function login($user)
    {
        $this->actingAs($user, 'api');
    }

    /** LIST */
    public function client_can_list_tasks()
    {
        $this->login($this->client->user);
        $tasks = factory(Task::class,5)->states('created')->create();
        $this->client->addTasks($tasks);
//        $this->assertDatabaseHas('client_tasks', array $data);
        // Client tasks o user tasks ? ProjectManager tasks or user_tasks ? Freelancer task o user_task?
        // Polimorphic relationship?
        foreach ($tasks as $task) {
            $this->assertDatabaseHas('user_tasks', [
                'user_id' => $this->client->user->id,
                'task_id' => $task->id,
            ]);
        }

        $response = $this->json('GET', '/api/v1/client/tasks');
        $this->assertCount(5, json_decode($response->getContent()));
        $response->assertSuccessful();
        $response->assertJsonStructure([[
            'id',
            'name',
            'description',
            'progress', // Integer 1 to 100
            'state',
            'created_at',
            'updated_at',
        ]]);

        // TODO BROWSER TEST. UI DESIGN
        // CARD GRID: 3x3 GRID
        // CALL TO ACTION: CREATE TASK -> starts stepper/wizard
    }

    /** CLIENT STEPS
     *  Step 1: create task
     *  Step 2: See progress and pay
     */

    /**
     * UI ELEMENTS:
     *
     * https://vuetifyjs.com/components/steppers
     * https://vuetifyjs.com/components/progress
     * https://vuetifyjs.com/components/forms
     */

    /** @test */
    public function client_can_create_task ()
    {
        // FIRST STEP
        // Client can create Task
        // Form: name, description, imate
        // Result: new task has been created with name and description, state: created
        // Fire event TaskCreated -> handle event -> send mail to project manager

        // Create Client
        $task = factory(Task::class)->states('created')->make();
        $this->client->addTask($task);
        $this->assertDatabaseHas('user_tasks', [
            'user_id' => $this->client->user->id,
            'task_id' => $task->id,
        ]);
        $response = $this->json('POST', '/api/v1/client/tasks', $task );
        $response->assertSuccessful();
        $this->assertDatabaseHas('tasks', [
            'name'        => $task->name,
            'description' => $task->description,
        ]);

        //TODO
        $response->assertJson([
            'name'        => $name,
            'description' => $description,
            'user_id'     => $user->id,
        ]);
    }

    /**
     * UI ELEMENTS:
     *
     * https://vuetifyjs.com/components/steppers
     * https://vuetifyjs.com/components/progress
     * https://vuetifyjs.com/components/forms
     */

    /** @test */
    public function client_can_create_task1 ()
    {
        // FIRST STEP
        // Client can create Task
        // Form: name, description, imate
        // Result: new task has been created with name and description, state: created
        // Fire event TaskCreated -> handle event -> send mail to project manager

        // Create Client
        $task = factory(Task::class)->states('created')->make();

        // JSON API TEST

    }

    /** @test */
    public function ()
    {
        // SECOND STEP
        // Client can see task progress and state
        // A pay button is always seen but disabled until state=validated (and of course progress 100%)
        // Form: pay
        // Result: Task updated to state payed
        // Fire event TaskPayed -> handle event -> Notification to telegram?

        // Create Client

        $client->createTask()
    }

}