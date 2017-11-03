<?php

namespace Tests\Feature;

use App\User;
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
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $response = $this->post('/tasks', [ 'name' => 'Comprar llet']);

        $response->assertSuccessful();

        $this->assertDatabaseHas('tasks', [
            'name' => 'Comprar llet'
        ]);
    }


}
