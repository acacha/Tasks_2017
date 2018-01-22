# Vuetify

https://vuetifyjs.com/vuetify/quick-start

S'utilitza vue-cli amb plantilles específiques per a Vuetify, com sempre utilitzarem la de webpack:

```
vue init vuetifyjs/webpack vuetify-tasks
``` 

Escolliu els valors habituals (en cas de dubte valor per defecte).

Com funciona?

Plugin Vue (https://vuejs.org/v2/guide/plugins.html). Plugin: extendre funcionalitat bàsica (com vue-router o vuex)

Al fitxers main.js s'instal·la el plugin

```
import Vue from 'vue'
import Vuetify from 'vuetify'
 
Vue.use(Vuetify)
```

El component principal App.Vue conté la plantilla amb Vuetify.

Segueix estructura típica aplicacions Material:
- https://material.io/guidelines/layout/structure.html

Parts:
- App bar (és un tipus de Toolbar, la primaria o principal. Abans també anomenada Action Bar a Android)
- Nav areas areas de navegació:
- Side nav: acostuma a ser un Navigation Drawer a l'esquerra
- Altres drawer poden existir per opcions secundàries (settins/configuració)
- Onserveu molt similar plantilla adminlte
- Content area
- Bottom area (Footer) 



Característiques:
- Responsive
- Menu Off-canvas layout (hamburguer icon que amaga menu de navegació)
  - També s'anomenen drawer (calaixeres: obvi pq no?)
  - De fet el nom a Material és: Navigation Drawer https://material.io/guidelines/patterns/navigation-drawer.html
- Observeu la tècnica és mateixa que el menu de navegació de Adminlte
  - El menú calaixera té però dos opcions de minimitzat: amb icones o completament amagat
  - Totes les petites modificacions que es poden fer al layout estan representades per alguna icona que permet modificar layout   
- Ripple: amb animacions/motion s'interactua amb l'usuari per mostrar activitat

Perfecte per comprovar les noves utilitats de Vue dev tools!!!! Modifiqueu els valors de:


Booleans afec
- Clipped (tallat): la navigation bar esta tallada per la App Bar 
- Drawer: Menu amagat o visible
- Fixed: igual que clipped però tallat o no per la bottom bar
- Minivariant: Sidenav mini (només icones): com adminlte


Altre opcions són pel menu secundari

Per crear diferents tipus de navigation drawer (vegeu spec: https://material.io/guidelines/patterns/navigation-drawer.html#):
- Permanent: 
- Persistent
- Mini variant
- Temporary

Es poden escollir altres layouts predefinits:

https://vuetifyjs.com/layout/pre-defined

o definir els propis.

Com definir apartats de navegació:

- Array items: interessant idea podem carregar el array a partir de qualsevol model (podria ser un fitxer, base de dades ,etc)

Cada apartat de la estructura té el seu component Vue (v és el previx de vuetify per evitar col·lisions ):

- v-app: container necessari per fer funcionar ok vuetify
- v-navigation-drawer: calaixerà de navegació (Side nav). Hi ha dos una dreta i altre esquerra
- v-content: contingut: router-view
- v-toolbar: App bar (abans Action bar). És un tipus de toolbar, aka main toolbar
- v-footer: el footer

Components a la doc:
- https://vuetifyjs.com/components/navigation-drawers

Tots tenen una API (com tots components vue la API es a través props i events)
- https://vuetifyjs.com/components/navigation-drawers#api
- https://vuetifyjs.com/components/toolbars#api

TOOLBAR
- v-toolbar-side-icon: hamburguer icon
- v-toolbar-title
- v-spacer
- v-btn: buttons
  - Floating Button (patró habitual Android): https://vuetifyjs.com/components/floating-action-buttons
- v-icon: icones. Material design ofereix unes icones per defecte
 - https://material.io/icons/
 - Més de 900 icones de sistema
 - Icones basades en font (no SVG)