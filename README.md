
## TODO

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

- Llista de todos dins d'un widget AdminLTE: https://adminlte.io/themes/AdminLTE/pages/widgets.html
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

## Recursos

- https://github.com/ratiw/vuetable-2
  - https://github.com/acacha/users-test/blob/master/resources/assets/js/components/users/UsersList.vue
  
 Vuetable:
 
  npm i babel-plugin-transform-runtime babel-preset-stage-2 babel-preset-es2015 
  
  
https://github.com/ratiw/vuetable-2-with-laravel-5.4/blob/master/resources/assets/js/components/MyVuetable.vue  
  