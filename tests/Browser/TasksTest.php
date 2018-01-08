<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Class TasksTest.
 *
 * @package Tests\Browser
 */
class TasksTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * List tasks.
     *
     * @test
     * @return void
     */
    public function list_tasks()
    {
        $this->browse(function (Browser $browser) {
            $browser->maximize();
//            $browser->resize(1920, 1080);
            $user = factory(User::class)->create();
            dump($user);
            $browser->loginAs($user)
                ->visit('/home');
            $browser->visit('/tasks')
                    ->assertSee('caca');
        });
    }
}
