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
     * EventContainer
     * EventsContainer
     *

     * Separation of concerns:
     <eventsContainer>
       <crud-list :events="events" @create="create" @edit="edit" @delete="delete">
     </eventsContainer>
     *
     * https://medium.com/front-end-hacking/passing-methods-as-props-in-vue-js-d65805bccee


     <events-container v-bind="{events, create, edit, delete}>

     *
     Vuex EventsModule for actions related with events

     *
     * CONTAINERS:
     * EventsContainer
     *   DISPLAY
     *    RETRIEVE:
     *     EventsList
     *     EventsTable
     *    SHOW -> Event Container
     *     Table
     *     Box
     *     Card/media card
     *    CREATE/EDIT/DELETE ACTIONS
     *      Initiators:
     *       - Buttons
     *       - Keyboard shortcuts
     *       - Mouse actions: like double click
     *      Actions
     *    Edit:
     *     Single field actions
     *    Delete
     *
     *    VUEX ACTIONS
     *    Using async await and a specific file for API:
     *    https://www.reddit.com/r/vuejs/comments/6n8a6d/vuex_re_usable_crud_actions/
     *
     *
     *
    import createApi from '../some/path';

    const crud = createApi('/some/api/endpoint');

    ...
    actions: {
        async getAll({ commit }) {
            const data = await crud.getAll();
            commit('SOME_MUTATION', data);
        },
        async get({ commit }, id) {
            const data = await crud.get(id);
            commit('SOME_MUTATION_1', data);
        },
        async update({ commit }, id) {
            const data = await crud.update(id);
            commit('SOME_MUTATION_2', data);
        },
        async delete({ commit }, id) {
            const data = await crud.delete(id);
            commit('SOME_MUTATION_3', data);
        },
    }
     *
     *
     */

    /**
     * TODO:
     *  - Define dusk Page and component for Vue tasks: abstract selectors on tests-> Avoid using Dusk selectors on HTML
     *  - Use acacha-forms and Vuex store -> Components fets a nadal
     *  - Utilitzar la interfície per a todos: https://adminlte.io/themes/AdminLTE/index.html
     *    - Permet drag and Drop, Sort i pagination
     *  - Mirar el que ja hi ha implementat a events????
     *  - Vue component design patterns: Components smart i components Dump (Presentational i Container Components)
     *    - List
     *    - ListContainer
     *    - Dubte: ok pel concepte list com la R de retrieve: pero la resta de CRUD
     *      - Per exemple create action: com desacoplar el codi ajax de crear de la interfície???
     *    - https://medium.com/@learnreact/container-components-c0e67432e005
     *    - https://medium.com/@dan_abramov/smart-and-dumb-components-7ca2f9a7c7d0
     *    - http://www.thegreatcodeadventure.com/the-react-plus-redux-container-pattern/
     *    - Full crud example?:
     *    - https://medium.com/@rajaraodv/a-guide-for-building-a-react-redux-crud-app-7fe0b8943d0f
     *
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
        // Doble click on task name
        // Esc to abort edit
        // Click on edit button/icon

        //doble click to description
    }

    public function delete_task()
    {
        // Click on checkbox
        // Assert task is strikethrough (tachado)
    }


    public function complete_task()
    {
        // Click on checkbox or another commuter
        // Assert task is strikethrough (tachado)
        // activate filter pending and test task is not seen
    }

    public function sort_task()
    {
        // Drag and drop
        // https://laravel.com/docs/5.5/dusk#using-the-mouse
    }


}
