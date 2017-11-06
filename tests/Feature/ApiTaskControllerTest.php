<?php

namespace Tests\Feature;

use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class ApiTaskControllerTest.
 *
 * @package Tests\Feature
 */
class ApiTaskControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Set up tests.
     */
    public function setUp()
    {
        parent::setUp();
//        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function can_add_a_task()
    {
        // PREPARE
        $faker = Factory::create();

        // EXECUTE
        $response = $this->json('POST', '/api/tasks', [
            'name' => $faker->word
        ]);

        // ASSERT
        $response->assertSuccessful();
    }

}