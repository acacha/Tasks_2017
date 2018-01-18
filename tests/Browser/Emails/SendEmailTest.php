<?php

namespace Tests\Browser;

use App\User;
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
        // TODO: Control who can send emails
//        initialize_email_permissions();
//        Artisan::call('passport:install');
//        $this->withoutExceptionHandling();
    }

    /**
     * Login and authorize.
     *
     * @return mixed
     */
    protected function loginAndAuthorize($browser)
    {
        $user = factory(User::class)->create();
//        $user->assignRole('emails-manager');
        $browser->loginAs($user);

        return $user;
    }

    /**
     * Show send email.
     *
     * @test
     * @return void
     */
    public function show_send_email()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAndAuthorize($browser);
            $browser->visit(new SendEmail())->sendEmail()->assertSeeSuccess();
        });
    }
}
