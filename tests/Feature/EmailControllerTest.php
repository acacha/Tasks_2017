<?php

namespace Tests\Feature;

use App\Mail\CustomEmail;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Tests\TestCase;

/**
 * Class EmailControllerTest.
 */
class EmailControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Set up tests.
     */
    public function setUp()
    {
        parent::setUp();
//        initialize_email_permissions(); //TODO
//        $this->withoutExceptionHandling();
    }

    /**
     * Login as email manager.
     */
    protected function loginAsEmailManager()
    {
        $user = factory(User::class)->create();
//        $user->assignRole('email-manager');
        $this->actingAs($user);
        View::share('user', $user);
    }
    /**
     * Send an email.
     *
     * @test
     */
    public function send_and_email()
    {
        $this->loginAsEmailManager();

        Mail::fake();

        $emailto = 'sergiturbadenas@gmail.com';
        $subject = 'Prova que tal!!!';
        $body = 'Contingut del email';

        $response = $this->post('/email', [
            'emailto'     => $emailto,
            'subject'     => $subject,
            'body'        => $body,
        ]);

//        Mail::assertSent(CustomEmail::class);
        Mail::assertSent(CustomEmail::class, function ($mail) use ($emailto, $subject, $body) {
//            dd($mail);
            return $mail->to[0]['address'] === $emailto && $mail->subject === $subject && $mail->body === $body;
        });

//        $response->dump();
        $response->assertStatus(302);
    }

}
