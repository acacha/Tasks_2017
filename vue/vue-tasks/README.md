# tasks

> A Vue.js project

# CORS ERROR

Failed to load http://localhost:8081/oauth/token: Response to preflight request doesn't pass access control check: No 'Access-Control-Allow-Origin' header is present on the requested resource. Origin 'http://localhost:8080' is therefore not allowed access.

https://github.com/barryvdh/laravel-cors

```
$ composer require barryvdh/laravel-cors
```

I afegir el middleware https://github.com/barryvdh/laravel-cors#global-usage

# 401 Errors

Mireu el cos de l'error. Si dona error invalid_client és que no em donat correctament les credencials del client.

## Build Setup

``` bash
# install dependencies
npm install

# serve with hot reload at localhost:8080
npm run dev

# build for production with minification
npm run build

# build for production and view the bundle analyzer report
npm run build --report

# run unit tests
npm run unit

# run e2e tests
npm run e2e

# run all tests
npm test
```

For a detailed explanation on how things work, check out the [guide](http://vuejs-templates.github.io/webpack/) and [docs for vue-loader](http://vuejs.github.io/vue-loader).
