Javascript only with Vue
========================

Instal·lar vue cli: 

- https://github.com/vuejs/vue-cli

```bash
$ npm install -g vue-cli
```

Estructura
==========

Crearem dins del projectes Tasques i CS una carpeta a l'arrel:

```
Vue
```

A dins instal·larem una app Javascript  + vue a partir de la plantilla webpack de vue cli:

```
vue init webpack Tasks
```

Respostes al wizard:

- Name : tasks
- Description: el que vulgueu
- Runtime+compiler
- Vue-router: Si
- Eslint: Sí + Standard preset
- Unit Test yes: Karma + Mocha
- Nightwatch: yes


SOBRE WEBPACK TEMPLATE
================

Workflow:

Un sol cop:

```bash
$ npm install
```


Per desenvolupar:

```bash
npm run dev
```

Deployment i entrega del projecte
=================================

Github:

Cal pujar al Github el codi de la carpeta Vue/Tasks.

No cal servidor PHP (tot i que si caldrà backend Tasques funcioni)

LINTING
=======

Instal·lació eslint en global:

TODO


SPA (Single Page Application). Vue Router
=========================================

Vue router permet implementar SPA. El concepte de router és el mateix que altres frameworks com Laravel.