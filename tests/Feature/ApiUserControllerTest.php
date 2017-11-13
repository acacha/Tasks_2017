<?php

namespace Tests\Feature;

use App\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class ApiUserControllerTest.
 *
 * @package Tests\Feature
 */
class ApiUserControllerTest extends TestCase
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
     * Can list users.
     *
     * @test
     */
    public function can_list_users()
    {
        factory(User::class,3)->create();

        $user = factory(User::class)->create();
        $this->actingAs($user);

        $response = $this->json('GET', '/api/v1/users');

        $response->assertSuccessful();

        $response->assertJsonStructure([[
          'id',
          'name',
          'created_at',
          'updated_at'
        ]]);
    }

    /**
     * Can show a user.
     * @test
     */
    public function can_show_a_user()
    {
        $user = factory(User::class)->create();

        $loggedUser = factory(User::class)->create();
        $this->actingAs($loggedUser);

        $response = $this->json('GET', '/api/v1/users/' . $user->id);

        $response->assertSuccessful();

        $response->assertJson([
            'id' => $user->id,
            'name' => $user->name
        ]);
    }

    /**
     * @test
     */
    public function cannot_add_user_if_not_logged()
    {
        $faker = Factory::create();

        // EXECUTE
        $response = $this->json('POST', '/api/v1/users', [
            'name' => $name = $faker->word
        ]);

        // ASSERT
        $response->assertStatus(401);
    }

    /**
     * @test
     */
    public function cannot_add_user_if_no_name_provided()
    {
        $loggedUser = factory(User::class)->create();
        $this->actingAs($loggedUser);

        // EXECUTE
        $response = $this->json('POST', '/api/v1/users');

        // ASSERT
        $response->assertStatus(422);
    }

    /**
     * @test
     */
    public function can_add_a_user()
    {
        // PREPARE
        $faker = Factory::create();
        $user = factory(User::class)->create();

        $this->actingAs($user);

        // EXECUTE
        $response = $this->json('POST', '/api/v1/users', [
            'name' => $name = $faker->word
        ]);

        // ASSERT
        $response->assertSuccessful();

        $this->assertDatabaseHas('users', [
           'name' => $name
        ]);

//        $response->dump();

        $response->assertJson([
            'name' => $name
        ]);
    }

    /**
     * @test
     */
    public function can_delete_user()
    {
        $user = factory(User::class)->create();
        $user = factory(User::class)->create();

        $this->actingAs($user);

        $response = $this->json('DELETE','/api/v1/users/' . $user->id);

        $response->assertSuccessful();

        $this->assertDatabaseMissing('users',[
           'id' =>  $user->id
        ]);

        $response->assertJson([
            'id' => $user->id,
            'name' => $user->name
        ]);
    }

    /**
     * @test
     */
    public function cannot_delete_unexisting_user()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);

        $response = $this->json('DELETE','/api/v1/users/1');

        $response->assertStatus(404);
    }

    /**
     * @test
     */
    public function can_edit_user()
    {
        // PREPARE
        $user1 = factory(User::class)->create();

        $user = factory(User::class)->create();
        $this->actingAs($user);

        // EXECUTE
        $response = $this->json('PUT', '/api/v1/users/' . $user1->id, [
            'name' => $newName = 'NOU NOM'
        ]);

        // ASSERT
        $response->assertSuccessful();

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => $newName
        ]);

        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
            'name' => $user->name,
        ]);

        $response->assertJson([
            'id' => $user->id,
            'name' => $newName
        ]);
    }

}