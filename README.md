# Tasks

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/acacha/Tasks/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/acacha/Tasks/?branch=master)
[![StyleCI](https://styleci.io/repos/108010317/shield?branch=master)](https://styleci.io/repos/108010317)
[![Build Status](https://travis-ci.org/acacha/Tasks.svg?branch=master)](https://travis-ci.org/acacha/Tasks)
[![Latest Stable Version](https://poser.pugx.org/acacha/tasks/v/stable)](https://packagist.org/packages/acacha/tasks)
[![Total Downloads](https://poser.pugx.org/acacha/tasks/downloads)](https://packagist.org/packages/acacha/tasks)
[![License](https://poser.pugx.org/acacha/tasks/license)](https://packagist.org/packages/acacha/tasks)
[![Monthly Downloads](https://poser.pugx.org/acacha/tasks/d/monthly)](https://packagist.org/packages/acacha/tasks)
[![Daily Downloads](https://poser.pugx.org/acacha/tasks/d/daily)](https://packagist.org/packages/acacha/tasks)
[![composer.lock](https://poser.pugx.org/acacha/tasks/composerlock)](https://packagist.org/packages/acacha/tasks)

# Expresivitat i domini


$order->setStatus('paid');
$order->setPaidAmount(120);
$order->setPaidCurrency('EUR');
$order->setCustomer($customer);

Accions/comandes amb el llenguatge del client/domini:

$order->pay($order)

o objecte

PayOrder
- Dependencia (per DI als constructor): $order (model eloquent)
- Mètode: pay()


# Domain Driven Design

No tots és CRUD. Posem un exemple més real.


En comptes de todo-list app -> Tasks management app

Característiques
- Model principal continua sent task, però amb més informació i relacions
  - name, description, completed com fins ara
  - Relacions
    - Tasques assignades a un projecte (pot ser multitenant app, és a dir mateixa base de dades per a cada projecte, múltiples bases de dades)
    - Tasques assignades a un (1 a n) o a múltiples freelancers (n a n)
    - 
  - Tasques associades a usuaris amb un cert rol: és qui ha de fer la tasca-> autonom/freelancet 
- Aparició de nous rols:
  - Freelancer: el que ha de fer una tasca associada a un projecte. 
  - ProjectManager: el responsable de gestiona el projecte: interacciona i fa de nexe entre client i freelancer
  - Client
- Tots interaccionen amb les tasques (operacions "CRUD"") però no són iguals les operacions i a més hi ha interrelacions i coupling
  - Per posar exemples: 
    - Un client no assigna freelancers a una tasca ()ho fa el project manager
    - Un freelancer no tanca les tasques (les ha de validar el project manager)
    - RETRIEVE: Els clients i els projects manager veuen totes les tasques però els freelancers només veuen les seves
    - Tots els exemples que estic posant són exemples que poden canviar en cada domini: cal conèixer cada cas (domini)
- Entre en jo el concepte estat: una tasca pot estar en diferents estats
 - Els estats poden ser implicits (camp estat)
 - O explicits: depenen dels valors de certs camps sabem en quin estat estem
 
WORKFLOW
--------

El workflow ja no és un CRUD no?

Suposem (donem ja fet o limitem la nostra app a un sol projecte).

- Client escull un projecte i són els encarregats de crear tasques
  - Assignem nom i descripció a una tasca
- El project manager assigna tasca a un freelancer
  - Assigna hores estimades per realitzar la tasca i un freelancer per ferla
- El freelancer consulta les tasques
  - Escull una tasca i es posa a fer-la (cal indicar-ho d'alguna forma canvi estat)
  - Tant el project manager com el client poden veure 
- El freelancer indica el progres 
- El freelancer indica ha acabat tasca
- Project manager valida la tasca
- El client paga la tasca

Al final potser realment podem veure l'aplicació com múltiples aplicacions, depenent de la perspectiva

- Domini aplicació perpectiva freelancer
- Domini aplicació perpectiva Task manager
- Domini aplicació perspectiva client
- I encara podriem definir un rol sol ser comú a totes aplicacions: gestió usuaris i rols (admin del sistema)

## Workflow/interficies i CRUD

Hi ha interfícies més orientades a CRUD:
- Datatables: Vuetify: https://vuetifyjs.com/components/data-tables | Jquery datatables: https://datatables.net/   
 
Hi altres que es poden adaptar més al workflow real aplicació: 
 - Steppers/Wizards: https://vuetifyjs.com/components/steppers | https://github.com/PygmySlowLoris/vue-stepper
    - Vue material: https://vuematerial.io/components/steppers/
    
# Més usos dels esdeveniments

## Tracking: Event Sourcing | Audit log

Capturar amb un esdeveniment els canvis estat (per exemple Eloquent Event Models) i portar un track registre d'aquests canvis:

"How many of you have an UPDATE or DELETE statement in your system? OK. Keep your hands up. How many of you sat and talked with the CEO and board of directors of your company about how that data had no value? How many of you can predict where your company will be, a year from now, and what they may ask you about today? Do you have a magic eight ball? What will the company ask me? Will they ask me about this? I think not. So how did you make this decision to destroy data? You personally didn't feel it was valuable? Or maybe you didn't think about it. Data is massively, massively, valuable. And any time you choose one of these, you are losing data. The fun part is figuring out what data you’re losing."

Paquet interessant: https://github.com/VentureCraft/revisionable

Aplicació: Timeline: https://adminlte.io/themes/AdminLTE/pages/examples/profile.html

https://martinfowler.com/eaaDev/EventSourcing.html 

- Una informació que sovint no es guarda a la base de dades és quin usuari crea un registre a la base de dades i encara menys el audit log
       
# Notes dia 15 de Gener

- Laravel API Resources: https://laravel.com/docs/5.5/eloquent-resources // Transformers    
- Alternativa a llibreries com Fractal
- Laracast: https://laracasts.com/series/whats-new-in-laravel-5-5/episodes/20
- Pagination: podem fer que les dades de paginació les faci el servidor: un altre tema és el component gràfic que suporti pàginació
  - Recomanació: No tocar el controlador ja existen sinó afegir un per a la paginació
    - Facilitar refactorització (caldria sinó canviar testos) i codi Javascript:
       - Els objectes que retorna API json a axios haurien de ser response.data.data (observeu data dos cops) 
- Optional helper: 
  - https://laravel.com/docs/5.5/helpers#method-optional
  - https://medium.com/@codebyjeff/laravel-5-5-optional-class-withdefault-and-attribute-defaults-a2e901dbad62
  - Null object pattern: o assegurar-se que un objecte no et torni mai null
  
  
  optional($task)->name
  
# Factory States

Per exemple per crear tasques amb estat completed
  
# Testos Laravel Dusk

- Dusk Selectors: https://laravel.com/docs/5.5/dusk#dusk-selectors
- Concepte de Page per fer testos més llegibles/expressius i també encapsular/reaprofitar codi
  - https://laravel.com/docs/5.5/dusk#pages
- El exercici de MP8 vue tasks s'ha d'entregar amb testos que utilitzin:
  - Waits
  - Comprovació d'estats com loading/spinner
  - Pàgines Dusk i Dusk selectors
  - Comprovació de valors en components Vue: https://laravel.com/docs/5.5/dusk#making-vue-assertions
  - Utilitzeu/copieu els del professor i adapteu al vostre cas  
  
Testos (vegeu script run_dusk.sh a l'arrel del projecte). Recordeu entorn és singular:

```
php artisan migrate:fresh --seed -v --env=dusk.local
php artisan serve --port=8090 --env=dusk.local &
php artisan dusk tests/Browser/PHPTasksTest.php
```

Testos per grups:

```
php artisan dusk tests/Browser/PHPTasksTest.php --group=current
```

NO funciona:

```
phpunit tests/Browser/VueTasksTest.php
```

## Oauth

- Store: oco sessió classe anterior havia un error a main.js. Solució correcta

```
Vue.prototype.$store = store
```

- Middleware/Navigation Guard de protecció. Fitxer router/index.js

```
router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth) && (!router.app.$store.state.token || router.app.$store.state.token === 'null')) {
    window.console.log('Not authenticated')
    next({
      path: '/login',
      query: { redirect: to.fullPath }
    })
  } else {
    next()
  }
})
```

- Ja teniu una possible solució a vue/vue-tasks
- Cal tenir CORS configurat al backend:  https://github.com/barryvdh/laravel-cors
- Observeu codi de main.js: 

```
if (window.localStorage) {
  let token = window.localStorage.getItem('token') || 'null'

  if (token) {
    store.setTokenAction(token)
    axios.defaults.headers.common['authorization'] = `Bearer ${token}`
  }
}
```

El token es guarda al LocalStorage (si el tenim) i a més utilitzem un interceptor (idea similar a Middleware i Navigation Guards) 
que afegeix el token a totes les peticions axios.

I observeu el component Login que es l'encarregat d'obtenir el token a partir de l'usuari i la paraual de pas:

Solució Proxy (només user i password) sinó cal posar també client_id i client_secret

```
submit () {
        axios.post('http://localhost:8081/api/v1/proxy/oauth/token', {
          'username': this.email,
          'password': this.password
        }).then(response => {
          const token = response.data.access_token
          if (token) {
            if (window.localStorage) {
              window.localStorage.setItem('token', token)
            }
            store.setTokenAction(token)
          }
          this.$router.push(response.data.redirect ? response.data.redirect : '/')
        }).catch(error => {
          console.log('ERROR:' + error)
          console.log(error)
        })
      }
``` 

PROXY i Seguretat:

- LA petició al servidor explotació es recomana amb HTTPS per evitar atacs MiTM
- Proxy per Oauth password grant:
  - El servidor té un api endpoint que només accepta usuari i paraula de pas
  - El client_id i el client_secret no els té el client Javascript
    - Els incorpora el servidor a la petició proxy
  - IMPORTANT: El servidor de proves de PHP (php -S o php artisan o llum serve) és single-threaded
    - No permet doncs executar peticions Guzzle HTTP sobre si mateix: cal crear dos servidors en ports diferents
    - En explotació amb Apache o Nginx no hi ha cap problema  
    
# Vuex

TODO: passar l'store manual que hem creat a un store amb Vuex

- Vuex instal·lació
- Vuex actions i mutations    

## Working with files and File uploads

Sistema de fitxers de Laravel:
- https://laravel.com/docs/5.5/filesystem
- Local i extern com Amazon S3

Testing:
- https://laravel.com/docs/5.5/dusk#attaching-files

Opcions implementació:
- Perfil usuari: assignar avatar
- Permetre associar un fitxer adjunt a un tasca. Opcional: com afegir a un email:
  - https://laravel.com/docs/5.5/mail#attachments
  - https://laravel.com/docs/5.5/dusk#attaching-files


## Email

- https://laravel.com/docs/5.5/mail
- Sistema de drivers: explicar polimorfisme interfícies i relació amb model de driver
- Explicar format Markdown
- Local development (https://laravel.com/docs/5.5/mail#mail-and-local-development)
- Mailtrap

Interfície per enviar email:
 
https://adminlte.io/themes/AdminLTE/index.html

Com afegir a tasques: afegir una acció sigui enviar tasca per email:
- S'envia com a subject el nom de la tasca
- El cos de l'email és la descripció de la tasca
- El email s'envia al correu de l'usuari que té la tasca assignada

Formes enviar email:
- Boto a la llista de tasques i al show d'una tasca. Obre interfície email (https://adminlte.io/themes/AdminLTE/index.html
) amb els valors ja prens però que permeti modificar i enviem email
- Tasca Scheduled: cron/Laravel que envia tasques automàticament
- Events: disparar esdeveniment al crear/modificar/eliminar tasca per tal de notificar per correu l'acció

Escriure testos per email utilitzant Mocking:
- https://laravel.com/docs/5.5/mocking

## Notes

### MP7 13 de desembre

- Reorganitzar projectes per no utilitzar studio: utilitza composer repository paths
- Repassar la configuració de Laravel mix per veure si agafa codi javascript carpeta resources
- Carpeta resources/assets/js sigui resources/assets/js/tasks i que tinguem en un mòdul el codi Javascript
- Explicar que fet d'està forma no cal pujar el codi a npm cada cop per provar-lo en local
- Només farem tag i publicarem mòdul vendor-tasks (acacha-tasks en el cas professor) quan ens agradi el que tenim.
- Repassem publicació codi

### MP9 14 desembre

# Social Login

- Utilitza OAuth: http://acacha.org/mediawiki/OAuth
- Delegació de permisos: valet key dels cotxes

Dos formes utilitzar:
- Com a clients: les nostres aplicacions utilitzen servidors OAuth de tercers com Github o Facebook
- Com a servidors: les nostres aplicacions ofereixen el servei a tercers (que poden ser aplicacions nostres propies)


## Client Social Login

Amb Laravel fàcil d'implementar gràcies a:
- Laravel Socialite: https://github.com/laravel/socialite | https://laravel.com/docs/5.5/socialite

Personalment he creat un paquet per automatitzar/facilitar la instal·lació a Adminlte:

- https://github.com/acacha/laravel-social

A Tasques i CS només cal que feu:

```
adminlte-laravel social 
php artisan acacha:social
```

I seguiu les passes de l'assistent.

Modifiqueu/sobrescriviu la vista parcial Laravel:

vendor/adminlte/auth/partials/social_login

I deixeu només les opcions de Google, Facebook, Github i Twitter. Github és prioritari.

## Servidor Social Login

- Laravel passport afegeix servidor Oauth a les aplicacions
- Acabem doncs tenint una aplicació fent dos Rols de OAuth o fins i tots els tres
  - http://acacha.org/mediawiki/OAuth#OAuth_roles
  - Authorization server: Laravel Passport
  - CLIENT PHP (ja sigui pur PUR o amb Javascript Vue però a Laravel): La nostra app és també la app client i el resource server
  - BACKEND PHP: Api json
  - CLIENT Javascript: per exemple aplicació vue-cli passà a ser l'aplicació client
  
Dos opcions:
- Client PHP: només alumnes no dual: creeu una nova opció/boto a CS que permeti logar-se utilitzant Tasques
- Client Javascript: l'aplicació de tasques Javascript ha de tenir un Login que utilitzi el Laravel Passport de tasques

### MP7 13 i 15 de desembre
- Github pages
  - Publicar projecte nou vue tasks
- Explicar altres eines com surge
- Reveal.js? i Github pages?
- Github-pages branca de mòdul de tasques amb Landing page del producte?  

### Notes 1 desembre
- Modificar la Landing page (pàgina inicial welcome) per tal que mostri el projecte que representa (Tasks)
  - Si no totes les Landing page són iguals
- MP7: Tasques per CLI amb testos
- CI: Travis i testos

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
  