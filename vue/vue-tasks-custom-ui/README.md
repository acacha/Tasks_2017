# Modern CSS

https://laracasts.com/series/modern-css-workflow/episodes/2

# CSS Grid

https://css-tricks.com/snippets/css/complete-guide-grid/

https://laracasts.com/series/css-grids-for-everyone/episodes/1

Plugins Chrome:

- https://chrome.google.com/webstore/detail/grid-ruler/joadogiaiabhmggdifljlpkclnpfncmj/related

Alternatives antigues (inline block o float):
- http://learnlayout.com/inline-block.html  

# Flexbox

- https://laracasts.com/series/modern-css-workflow/episodes/3

Layout com CSS també es pot fer amb Flexbox però millor CSS Grid:
- Video Laracast: https://laracasts.com/series/learn-flexbox-through-examples/episodes/3?autoplay=true
- Exemple amb Flexobx: https://laracasts.com/series/modern-css-workflow/episodes/4

# 1D Layout positioning with Flexbox

Exemple de com compaginar Flexbox i CSS Grid
- https://hackernoon.com/the-ultimate-css-battle-grid-vs-flexbox-d40da0449faf


# CSS grid vs flexbox

- https://hackernoon.com/the-ultimate-css-battle-grid-vs-flexbox-d40da0449faf

- CSS grids are great for building the bigger picture. They makes it really easy to manage the layout of the page, and can even handle more unorthodox and asymmetrical designs.
- Flexbox is great at aligning the content inside elements. Use flex to position the smaller details of a design.
- Use CSS grids for 2D layouts (rows AND columns).
- Flexbox works better in one dimension only (rows OR columns).
- There is no reason to use only CSS grids or only flexbox. Learn both and use them together.

# Layouts:

## HOLY GRAIL amb CSS GRID

És l'utilitzat en aquest exemple.

Que s'utilitzava abans, coses una mica més complexes:

 Layout amb positioning: http://learnlayout.com/position-example.html
 Layout amb float:  http://learnlayout.com/float-layout.html
 Layout amb inline.block (CSS GRID old): http://learnlayout.com/inline-block-layout.html

# Positioning

Default: static

- Relative/absolute: for example badges over other element like notification badges
- Fixed: Per a crear alertes/notificacions fixes tipus les del sistema . 
  - També anomenats Gritters, En mobiles també Toasts
- FLOATS : media cards  
  - https://css-tricks.com/all-about-floats/
  
Recursos:
- http://learnlayout.com/position.html

## FLOAT I MEDIA CARDS

http://learnlayout.com/float.html

Clearfix hack: http://learnlayout.com/clearfix.html

# Fonts:

https://fonts.google.com/

# Text

https://www.w3schools.com/css/css_text.asp

# ALIGN

VERTICAL i HORIZONTAL: https://laracasts.com/series/modern-css-workflow/episodes/3

NAVIGATION LINKS LIST: segona part de
-https://laracasts.com/series/modern-css-workflow/episodes/3

o
- https://laracasts.com/series/learn-flexbox-through-examples/episodes/2?autoplay=true
- https://laracasts.com/series/learn-flexbox-through-examples/episodes/7

Media object /Media card:

- https://laracasts.com/series/learn-flexbox-through-examples/episodes/5?autoplay=true
- Tercera part: https://laracasts.com/series/modern-css-workflow/episodes/3

# CENTER

- https://css-tricks.com/centering-css-complete-guide/
- http://howtocenterincss.com/

# LLISTA CENTRADA

https://laracasts.com/series/learn-flexbox-through-examples/episodes/4?autoplay=true

# Widgets/Panels(Bootstrap)/Box

https://codepen.io/johncokos/pen/hCbHF

Un alternativa més semàntica de HTML:

```html
<section>
  <header>Widget Header</header>
  <div>
    Widget Body
  </div>
  <footer>
    <span>Footer</span>
    <a href='#'>Click Me!</a>
  </footer>
</section>
```

# STYLING FORMS:

Primer cal conèixer bé el format HTML:
- https://developer.mozilla.org/es/docs/Learn/HTML/Forms/How_to_structure_an_HTML_form
- Labels: poden ser anidats o amb for
- Millores HTML5 https://www.html5rocks.com/en/tutorials/forms/html5forms/

https://laracasts.com/series/learn-flexbox-through-examples/episodes/8?autoplay=true
- https://www.sitepoint.com/make-forms-fun-with-flexbox/
-https://developer.mozilla.org/en-US/docs/Learn/HTML/Forms/How_to_build_custom_form_widgets

# SHOW HIDE

Utilitzant display:none i activant desactivant amb Javascript o pseudo class target

- target - The target pseudo class is used in conjunction with IDs, and match when the hash tag in the current URL matches that ID. So if you are at URL www.yoursite.com/#home then the selector #home:target will match. That can be extremely powerful. For example, you can create a tabbed area where the tabs link to hash tags and then the panels "activate" by matching :target selectors and (for example) using z-index to move to the top.

- http://htmldog.com/techniques/showhide/
- https://css-tricks.com/on-target/

# Landing Page

http://acacha.org/mediawiki/Landing_Page#.WluBdHXWxhE

Guies:
- https://www.williamghelfi.com/blog/2013/08/04/bootstrap-in-practice-a-landing-page/
- https://24ways.org/2012/how-to-make-your-site-look-half-decent/

Conceptes es poden repassar/introduir:
- Call To Action (CTA) -> Center
- Navigation bar
- Background images or patterns
- Fancy Alternatives: Parallax backgrounds
  - https://www.w3schools.com/howto/tryhow_css_parallax_demo.htm | https://www.w3schools.com/howto/tryhow_css_parallax_demo_none.htm
  - https://davidwalsh.name/parallax
  - https://css-tricks.com/tour-performant-responsive-css-site/
  - https://alligator.io/css/pure-css-parallax/
  - https://codepen.io/stefanjudis/pen/nrzHI
  
# Dropdowns

Suckerfish dropdown: http://codersblock.com/blog/suckerfish-dropdown/

Que es pot aprendre?
- ús de z-index per tal que el contingut que apareix del dropdown estigui per sobre dels altres elements
- Que al passar per sobre (hover) d'un element puguem modificar un altre element (a display:block)
- Utilitzar display:none per amagar

And:

.dropdown:hover .dropdown-content {
    display: block;
}

Exemple: https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_js_dropdown_hover

Exemples:
- http://htmldog.com/examples/dropdowns1/
- http://htmldog.com/examples/dropdowns2/
- http://htmldog.com/examples/dropdowns3/ 
    
# 3d, z-index i transformacions

- Animació del cheveron dels treeviews amb una transformació
- Off-canvas menu
- Parallax

# Component Menu Vue

Mantenir l'estat menu actiu
Tree View amb vue: https://vuejs.org/v2/examples/tree-view.html
Classes open i closed del menu
Animacions css
- Rotate del cheveron de cheveron-left a cheveron-down
- Subllista apareix gradualment no de cop

Adminlte: utilitza plugin jquery treeview: https://adminlte.io/docs/2.4/js-tree