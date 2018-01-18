<?php

namespace Tests\Browser;

use App\User;
use Tests\Browser\Pages\Home;
use Tests\Browser\Pages\SendEmail;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Class SendEmailTest.
 *
 * @package Tests\Browser
 */
class SendEmailTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Set up tests.
     */
    public function setUp()
    {
        parent::setUp();
    }

    /**
     * Login.
     *
     * @return mixed
     */
    protected function login($browser)
    {
        $user = factory(User::class)->create();
        $browser->loginAs($user);
        return $user;
    }

    /**
     * Show send email.
     *
     * @test
     * @return void
     */
    public function show_home()
    {
        $this->browse(function (Browser $browser) {
            $this->login($browser);
            $browser->visit(new Home());
        });
    }
}
