<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

/**
 * Class ApiTaskControllerTest.
 */
class LaravelPassportPasswordGrantProxyTest extends TestCase
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
                $this->withoutExceptionHandling();
    }

    /**
     * Can proxy password grant.
     *
     *
     */
    public function can_proxy_password_grant()
    {
        // URL proxy/oauth/token

        // 1 Prepare
        $user = factory(User::class)->create();
        // 2 execute:

        // EXECUTE
        $response = $this->json('POST', '/api/v1/proxy/oauth/token', [
            'username' => $user->email,
            'password' => $user->password,
        ]);

        // ASSERT
        $response->assertSuccessful();

        $response->dump();
    }
}
