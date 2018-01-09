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
     * - Dusk selectors: https://laravel.com/docs/5.5/dusk#dusk-selectors
     * - Pot semblar que cal embrutar el HTML -> ok! Però es pot utilitzar : https://laravel.com/docs/5.5/dusk#shorthand-selectors
     * - Sortable: com provar drag and drop. A més comprovar persistència (forçant reload de la pàgina)
     *   - Hi ha un mètode waitForReload
     * - Script: permet executar codi javascript a la pàgina:
     *   - $browser->script("document.getElementById('book_id').selectize.setValue('". $book->id ."');");
     * - Proves de teclat (boto esc o similar): https://laravel.com/docs/5.5/dusk#using-the-keyboard
     *   - Codis de tecles: https://github.com/facebook/php-webdriver/blob/community/lib/WebDriverKeys.php
     * - Mouseover:
     *   - https://laravel.com/docs/5.5/dusk#using-the-mouse
     * - Drag and drop:
     *   - https://laravel.com/docs/5.5/dusk#using-the-mouse
     * - Vue:
     *   - Explicar per que certs testos no funcionen sinó és amb un navegador (codi Javascript)
     *   - https://laravel.com/docs/5.5/dusk#making-vue-assertions
     * - Provar Pages:
     *   - https://laravel.com/docs/5.5/dusk#pages
     * - Components:
     *   - https://laravel.com/docs/5.5/dusk#components
     * - Travis: https://laravel.com/docs/5.5/dusk#continuous-integration
     */

    /**
     * List tasks.
     *
     * @test
     * @return void
     */
    public function list_tasks()
    {
        // Check for box (.box -box-primary)
        // Check title (.box-title)
        // Check for paginator (box-tools .pagination)
        // TODO: check paginator is correct for a specific number of tasks?

        // On mouse over:
        // On mouse over task:
        // -> assertAppears buttons/icons for edit and delete

        // See tasks
        // task name


        // Check for add task button
    }

    public function test_reload()
    {
        //Visit page
        // Add task to database
        // Click on reload icon/button
        // Assert see new task
    }

    public function test_filters()
    {
        //Create different king of tasks
        //Visit page
        // Test filters: completed, all, pending etc...

    }


    public function create_task()
    {
        // Visit page
        // Click on checkbox
        // Assert spinner is visible
        // wait for Alert/Ok message
        // Assert ok message
        // Asser spinner is off
        // Assert task is visible on task list
    }

    public function create_task_validation()
    {
        // Visit page
        // Click on checkbox
        // Assert spinner is visible
        // wait for validation message
        // Assert validation message
        // Asser spinner is off
    }

    public function acacha_forms_test()
    {
        // TODO ???
        // Form cannot be submitted on errors
        // Errors are cleaned on input changes
        // Spinner?
    }

    public function edit_task()
    {
        // Click on checkbox
        // Assert task is strikethrough (tachado)
    }

    public function delete_task()
    {
        // Click on checkbox
        // Assert task is strikethrough (tachado)
    }


    public function complete_task()
    {
        // Click on checkbox
        // Assert task is strikethrough (tachado)
    }

    public function sort_task()
    {
        // Drag and drop
        // https://laravel.com/docs/5.5/dusk#using-the-mouse
    }


}
