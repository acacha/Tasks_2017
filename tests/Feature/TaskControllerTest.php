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

    public function testStoreTask()
    {
        $response = $this->post('/task', [ 'name' => 'Comprar llet']);

        $response->assertSuccessful();

        $this->assertDatabaseHas('tasks', [
            'name' => 'Comprar llet'
        ]);
    }


}
