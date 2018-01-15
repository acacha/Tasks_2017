<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

/**
 * Class VueTasksPage.
 *
 * @package Tests\Browser\Pages
 *
 */
class VueTasksPage extends BasePage
{
    const TITLE = 'Tasks';

    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/tasks';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url());
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@tasks' => '#tasks-component',
        ];
    }

    public function todo()
    {

    }

    /**
     * See title.
     *
     * @param Browser $browser
     */
    public function see_title(Browser $browser)
    {
        $browser->assertTitleContains(self::TITLE);
    }

    /**
     * See box.
     *
     * @param Browser $browser
     */
    public function see_box(Browser $browser, $title)
    {
        $browser->assertVisible('.box');
        $browser->assertSeein('.box .box-title',$title);
        $browser->assertVisible('.box .box-body ul');
    }

    /**
     * See tasks on page.
     *
     * @param Browser $browser
     * @param $tasks
     */
    public function see_tasks(Browser $browser, $tasks)
    {
        foreach ($tasks as $task) {
            $browser->assertSee($task->name);
        }
    }

}
