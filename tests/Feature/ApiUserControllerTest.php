<?php

namespace Tests\Feature;

use App\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
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
        $this->actingAs($user,'api');

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
        $this->actingAs($loggedUser,'api');

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
        $this->actingAs($loggedUser, 'api');

        // EXECUTE
        $response = $this->json('POST', '/api/v1/users');

        // ASSERT
        $response->assertStatus(422);
    }

    /**
     * Can add an user.
     *
     * @test
     */
    public function can_add_an_user()
    {
        // PREPARE
        $faker = Factory::create();
        $user = factory(User::class)->create();

        $this->actingAs($user,'api');

        // EXECUTE
        $response = $this->json('POST', '/api/v1/users', [
            'name' => $name = $faker->word,
            'email' => $email = $faker->email,
            'password' => $password = $faker->password
        ]);

        // ASSERT
        $response->assertSuccessful();

        try {
            $user = User::findOrFail(json_decode($response->getContent())->id);
            $this->assertTrue(Hash::check($password, $user->password));
        } catch (\Exception $e) {
            $this->assertTrue(false);
        }

        $this->assertDatabaseHas('users', [
           'name' => $name,
           'email' => $email
        ]);


        $response->assertJson([
            'name' => $name,
            'email' => $email
        ]);
    }

    /**
     * @test
     */
    public function can_delete_user()
    {
        $user = factory(User::class)->create();
        $user = factory(User::class)->create();

        $this->actingAs($user,'api');

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
     * Cannot delete unexisting user.
     *
     * @test
     */
    public function cannot_delete_unexisting_user()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user,'api');

        $response = $this->json('DELETE','/api/v1/users/5989');

        $response->assertStatus(404);
    }

    /**
     * Can edit user.
     * @test
     */
    public function can_edit_user()
    {
        $user1 = factory(User::class)->create();

        $user = factory(User::class)->create();
        $this->actingAs($user,'api');

        $response = $this->json('PUT', '/api/v1/users/' . $user1->id, [
            'name' => $newName = 'NOU NOM'
        ]);

        $response->assertSuccessful();

        $this->assertDatabaseHas('users', [
            'id' => $user1->id,
            'name' => $newName
        ]);

        $this->assertDatabaseMissing('users', [
            'id' => $user1->id,
            'name' => $user->name,
        ]);

        $response->assertJson([
            'id' => $user1->id,
            'name' => $newName
        ]);
    }

}