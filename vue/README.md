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

 https://github.com/vuejs-templates/webpack
 http://vuejs-templates.github.io/webpack/

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

Cal pujar al Github el codi de la carpeta Vue/Tasks. Porta un .gitignore per defecte que ens servirà.

No cal servidor PHP (tot i que si caldrà backend Tasques funcioni)

Crear el distribuible:

```bash
$ npm run build
```

Crea carpeta dist amb l'aplicació preparada per ser executada al navegador

OCO: no obrir amb files::// sinó que cal un servidor HTTP com http-server.

La carpeta dis està ignorada per defecte al Github, de fet el que farem es crear un project propi per aquesta carpeta a Github
per tar de diferènciar el codi original del test.

Formes entregar:
- Github Pages: TODO
- Surge
- Es pot co·locar al servidor propi publicant un site static amb laravel Forge: TODO

LINTING
=======

Solucionar automàticament els warnings/errors linting:

```bash
$ npm run lint -- --fix
```

Instal·lació eslint en global:

Recursos:
- http://vuejs-templates.github.io/webpack/linter.html

SPA (Single Page Application). Vue Router
=========================================

Vue router permet implementar SPA. El concepte de router és el mateix que altres frameworks com Laravel.

Adminlte
========

Instal·lació, podeu trobar els distribuibles (carpeta dist) a

```
node_modules/admin-lte/dist
```

Intentarem reproduir la blank page:

```
node_modules/pages/examples/blank.html
```

Abans però hem d'entendre com es gestionen els assets:

 http://vuejs-templates.github.io/webpack/static.html
 
Hi ha 2 carpetes diferents:
- src/assets: processats per webpack
- static/ : no processats. Es posen directament a la sortida de producció

URLs dels assets:
- Relative URLs, e.g. ./assets/logo.png will be interpreted as a module dependency. They will be replaced with an auto-generated URL based on your Webpack output configuration.
- Non-prefixed URLs, e.g. assets/logo.png will be treated the same as the relative URLs and translated into ./assets/logo.png.
- URLs prefixed with ~ are treated as a module request, similar to require('some-module/image.png'). You need to use this prefix if you want to leverage Webpack's module resolving configurations. For example if you have a resolve alias for assets, you need to use <img src="~assets/logo.png"> to ensure that alias is respected.
- Root-relative URLs, e.g. /assets/logo.png are not processed at all.

Integració amb el backend : API JSON
====================================

Es pot utilitzar el proxy incorporat amb en nostre backend:

http://vuejs-templates.github.io/webpack/proxy.html

ENV VARIABLES
==============

http://vuejs-templates.github.io/webpack/env.html

A qualsevol lloc del nostre codi podem utiulitza process.env per accedir al entorn:

Exemple:
```
Vue.config.productionTip = process.env.NODE_ENV === 'production'
```