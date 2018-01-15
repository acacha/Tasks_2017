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
            '@tasks'     => '#tasks-component',
            '@reload'    => '#reload',
            '@completed' => '#completed-tasks',
        ];
    }

    /**
     * See title.
     *
     * @param Browser $browser
     */
    public function seeTitle(Browser $browser)
    {
        $browser->assertTitleContains(self::TITLE);
    }

    /**
     * See box.
     *
     * @param Browser $browser
     */
    public function seeBox(Browser $browser, $title)
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
    public function seeTasks(Browser $browser, $tasks)
    {
        foreach ($tasks as $task) {
            $this->seeTask($browser);
        }
        $browser->assertSee(count($tasks) . ' tasks left');
    }

    /**
     * See tasks on page.
     *
     * @param Browser $browser
     * @param $tasks
     */
    public function dontSeeTasks(Browser $browser, $tasks)
    {
        foreach ($tasks as $task) {
            $this->dontSeeTask($browser);
        }
        $browser->assertSee(count($tasks) . ' tasks left');
    }

    /**
     * Don't see task.
     *
     * @param Browser $browser
     * @param $task
     */
    public function dontSeeTask(Browser $browser, $task)
    {
        $browser->assertDontSee($task->name);
    }

    /**
     * Apply completed filter.
     *
     * @param Browser $browser
     */
    public function applyCompletedFilter(Browser $browser)
    {
        $browser->press('@completed');
    }

    /**
     * See task.
     *
     * @param Browser $browser
     * @param $task
     */
    public function seeTask(Browser $browser, $task)
    {
        $browser->assertSee($task->name);
    }

    /**
     * Dont see alert.
     *
     * @param Browser $browser
     */
    public function dontSeeAlert(Browser $browser)
    {
        $browser->assertMissing('.alert');
    }

    /**
     * Press reload button.
     */
    public function reload(Browser $browser)
    {
        $browser->press('@reload');
    }

}
