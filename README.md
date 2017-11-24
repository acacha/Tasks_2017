# Tasks

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/acacha/Tasks/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/acacha/Tasks/?branch=master)
[![StyleCI](https://styleci.io/repos/108010317/shield?branch=master)](https://styleci.io/repos/108010317)

# Tasques

MP7:

- CRUD de tasques per línia de comandes (vegeu més abaix notes sobre les comandes):
  - Comanda task:create: 
     - Dos opcions amb nom de tasca o sense nom i executar un assistens pregunti pel nom
  - Idem que l'anterior però Task:delete
  - Comanda task:list: mostrar la llista de tasques
  - Opcional task:edit i task:show
  - Crear els tests necessàris per les comandes. Utilitzar Mocks per tal de poder respondre a preguntes
- TDD: https://laracasts.com/series/testing-vue

MP8: Crud per interfície JSON API
- Només treballem amb Javascript/Vue (no hi ha controlador només vista)
- La vista es comunica amb el servidor(backend) via peticions API JSON
- URL: /tasks
- Components Vue: resources/asssets/js/components. Crear:
  - TaskViewsComponent que inclou els següents components:
    - MessageComponent per mostrar missatges flash
    - WidgetComponent per utilitza widget adminlte
    - TaskComponent: mostra les tasques dind del widget
  - Comunicació entre widgets i events.
- Widgets específics: select: multiselect
- TDD: tots els endpoitns de l'API tenen el seu corresponent test

MP9:
- URL: /tasks_php
- CRUD per interfície web
  - Totes les operacions han de tenir el test específic
  - Una vista per create i una per edit.
- Protegir les tasques utilitzant autenticació per web (sessió) i autenticació per API (Token)
- Afegir suport per a Social Login
- Afegir suport per authorizació: roles i permissos, gates Laravel. Paquet laravel-permission  


# TODO. Refactoritazació 

Comparar 3 interfícies:

- WEB
- JSON API
- CLI

i aprofitar codi (aproximació DRY no WET):


## Qüestions a tenir en compte:

- Modificar fitxer viwe Laravel sidebar.php per modificar el menu i tenir dos opcions de menú que apuntin
a l'exercici de MP9 i al de MP7
  

## TODO /Notes professor

MP8: Ajax | HTTP CLIENT AXIOS | Working wiht APIs: JSON

Promise Based Axios:
- https://laracasts.com/series/es6-cliffsnotes/episodes/13
- Necessitem tenir accés al MODEL/BASE DE DADES via API: vam començar jugar tema API JSON a: 
-- https://github.com/acacha/tinkeringJsonApi

TODO:
- CRUD sencer: tenim LIST falta:
  - SHOW
  - STORE
  - EDIT
  - DELETE

JSON APIS:
- https://laracasts.com/series/incremental-api-development

Mostrar els errors (catch de promises, missatges d'error de la pròpia API)
- Que mostrar sinó hi ha cap TODO (base de dades buida)
- Errors HTTP (500, 404, timeouts per que no funcioni connexió) <- Útil per provar mètode abort Laravel

  
MP8: Vue.js

TLTR:
- Explicar slots: Widget/Panel boostrap -> Col·locar en algún lloc la llista de todos: dins un widget
- Components pares i fills -> comunicació entre components
- Vue Events i Event Dispatcher -> Comunicació entre esdeveniments
  - API $emit (entre esdeveniment) i $on (handler). 
  - Object global Window.Event = new Vue -> Objecte compartir entre tots els components

- Llista de todos/tasques dins d'un widget AdminLTE: https://adminlte.io/themes/AdminLTE/pages/widgets.html
- Aprofitar per explicar slots i named slots de Vue.js per fer Content Distribution: https://vuejs.org/v2/guide/components.html#Content-Distribution-with-Slots
  - Els slots permeten posar components dins altre components i també customitzar parts d'un widget com Footer, Content , Header
- Ja tinc un paquet per anar posant els components AdminLTE fets: https://www.npmjs.com/package/adminlte-vue
  - https://www.npmjs.com/package/adminlte-vue
- MOSTRAR ERRORS API i missatges ok (added task) <- MessageComponent
 - Utilitzar component vam fer en un altre projecte: message /flash message MessageComponent
   - Message component: Funció global flash per mostrar un missatge flash <- Refactorització:
     - Patró de comunicació entre components EVENT DISPATCHER: https://laracasts.com/series/learn-vue-2-step-by-step |
       - https://laracasts.com/series/learn-vue-2-step-by-step/episodes/13
 - Altres llibreries i noms  
   - Toastr: http://codeseven.github.io/toastr/demo.html
   - Gritter
   
## COMPONENTS
  
- tasks
  - adminlte-widget
    - HEADER: title
    - CONTENT: Task list
    - FOOTER: 
      - create-task
      - Filters
- message component   

## Done

## Commands

CLI: another interface (like WEB or API JSON)

https://laravel.com/docs/5.5/artisan

php artisan make:command CreateTask

API:

1) Wizard:
```
php artisan make:task
```
Preguntar pel nom de la tasca

2) Nom de la tasca com a paràmetre

```
php artisan make:task taskname
```

# Instal·lació vue test utils

Install npm libraries:

```
npm install --save-dev vue-test-utils mocha mocha-webpack jsdom jsdom-global expect
```

Create folder for Tests and file setup.js

```
tests/Javascript/setup.js
```

Example JSON:

https://github.com/acacha/relationships/blob/master/tests/Javascript/setup.js

File content:

```
require('jsdom-global')()
```

Add npm script test on package.json:

```
"test" : mocha-webpack --webpack-config=node_modules/laravel-mix/setup/webpack.config.js --require tests/Javascript/setup.js tests/Javascript/**/*.spec.js
```

Hooking into Laravel mix: Observe --webpack-config=node_modules/laravel-mix/setup/webpack.config.js

Folder for Javascript Tests:

```
tests/Javascript
```

Execute tests:

```
npm run test
```

PHPStorm configuration

- New run configuration mocha
- Change mocha executable to mocha-webpack!!!

Example test:

- https://github.com/acacha/relationships/blob/master/tests/Javascript/adminlte-input-gender.spec.js

Exemple sense Laravel Mix:
- https://github.com/laracasts/testingvue/blob/master/episode-1/package.json

**Resources**
- https://vue-test-utils.vuejs.org/en/guides/testing-SFCs-with-mocha-webpack.html
- https://laracasts.com/series/testing-vue/episodes/6
- https://github.com/vuejs/vue-test-utils
- https://vue-test-utils.vuejs.org/en/guides/getting-started.html
- https://github.com/acacha/relationships
  - https://github.com/acacha/relationships/tree/master/tests/Javascript

## Recursos

- https://github.com/ratiw/vuetable-2
  - https://github.com/acacha/users-test/blob/master/resources/assets/js/components/users/UsersList.vue
  
 Vuetable:
 
  npm i babel-plugin-transform-runtime babel-preset-stage-2 babel-preset-es2015 
  
  
https://github.com/ratiw/vuetable-2-with-laravel-5.4/blob/master/resources/assets/js/components/MyVuetable.vue  
  