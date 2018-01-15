<?php

namespace Tests\Feature;

use App\Task;
use App\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

/**
 * Class ApiPaginatedTaskControllerTest.
 */
class ApiPaginatedTaskControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Set up tests.
     */
    public function setUp()
    {
        parent::setUp();
        initialize_task_permissions();
        Artisan::call('passport:install');
//        $this->withoutExceptionHandling();
    }

    /**
     * @return mixed
     */
    protected function loginAndAuthorize()
    {
        $user = factory(User::class)->create();
        $user->assignRole('task-manager');
        $this->actingAs($user, 'api');

        return $user;
    }

    /**
     * Can list tasks.
     *
     * @test
     */
    public function can_list_paginated_tasks()
    {
        factory(Task::class, 3)->create();

        $this->loginAndAuthorize();

        $response = $this->json('GET', '/api/v1/paginated_tasks');

        $this->assertCount(3, json_decode($response->getContent())->data);

        $response->assertSuccessful();

//        $response->dump();

        $response->assertJsonStructure([
            'data' => [[
                'id',
                'name',
                'completed',
                'description',
                'created_at',
                'updated_at',
            ]]
        ]);
    }
}
