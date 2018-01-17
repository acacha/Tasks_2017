# tasks

# .env file a Javascript/Webpack (dotenv)

Seguiu les passes de:

https://www.npmjs.com/package/dotenv-webpack

Per poder treballar amb un fitxer .env igual que a Laravel. Afegiu el fitxer a .GITIGNORE!!!!!!!

# Tests amb nigthwatch

TODO

## Login

Utilitzar .env per emmagatzemar les credencials o altres dades confidencials.

El login el podem fer per javascript directa si sabem el token (no cal ni fer petició oauth ni login!)

Podem utilitzar un 
https://laravel.com/docs/5.5/passport#personal-access-tokens que afegirem als seeds amb un valor constant
per facilitar el desenvolupament

```
php artisan passport:client --personal

 What should we name the personal access client? [Laravel Personal Access Client]:
 > Testing

Personal access client created successfully.
Client ID: 3
Client Secret: liip3jRdWPPQeFSFCQogIcZbqcxKetja8xwpsqvt
```

Al seed podem afegir:

```
DB::table('oauth_clients')->insert(
            [
                'name' => 'Testing',
                'secret' => 'liip3jRdWPPQeFSFCQogIcZbqcxKetja8xwpsqvt',
                'redirect' => 'http://localhost',
                'personal_access_client' => 1,
                'password_client' => 0,
                'revoked' => 0
            ]
        );
```

Aquest codi només s'hauria d'executar a testing i/o posar el secret a env.

De fet el token estarà tant al .env del backend com al del frontend

# Password Grant Proxy

https://web.archive.org/web/20141208132104/http://alexbilbie.com/2014/11/oauth-and-javascript/

# CORS ERROR

IMPORTANT: Qualsevol error que no té pq tenir que veure amb CORS pot donar error de CORS. Sobretot per exemple fer dds o dumps al depurar provoca no funcioni CORS.

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
