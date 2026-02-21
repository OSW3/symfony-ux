# Box Model

Mixins utilitaires pour gérer les dimensions (`width` / `height`), les contraintes (`min` / `max`), les tailles viewport et `box-sizing`.


## Configuration

Variables disponibles dans le module :

- `$use-modern-viewport-units: true !default;`
- `$emit-viewport-fallback: true !default;`
- `$box-model-default-unit: px !default;`
- `$box-model-accept-unitless: true !default;`
- `$box-model-warn-on-unitless: false !default;`

Comportement important :

- Les valeurs unitless sont normalisées (ex: `10` → `10px` si l’unité par défaut est `px`).
- `0` reste `0` (sans unité).
- Les chaînes CSS sont acceptées (`var(...)`, `clamp(...)`, `calc(...)`).


## Width

```scss
@include width(320px);             // width: 320px;
@include width(100, true);         // width: 100px !important;

@include min-width(240px);         // min-width: 240px;
@include max-width(1200px);        // max-width: 1200px;

@include width-auto();             // width: auto;
@include width-full();             // width: 100%;
@include width-fit();              // width: fit-content;
@include width-min-content();      // width: min-content;
@include width-max-content(true);  // width: max-content !important;
```


## Height

```scss
@include height(48px);             // height: 48px;
@include height(10, true);         // height: 10px !important;

@include min-height(320px);        // min-height: 320px;
@include max-height(90vh);         // max-height: 90vh;

@include height-auto();            // height: auto;
@include height-fit();             // height: fit-content;
@include height-min-content();     // height: min-content;
@include height-max-content(true); // height: max-content !important;
```


## Viewport

Les mixins viewport génèrent `dvh`/`dvw` quand activé, avec fallback optionnel `vh`/`vw`.

```scss
@include viewport(100, 100);       // width: 100vw; width: 100dvw; height: 100vh; height: 100dvh;
@include width-viewport(100);      // width: 100vw; width: 100dvw;
@include height-viewport(100);     // height: 100vh; height: 100dvh;

@include viewport(100, 100, true); // même sortie avec !important
```


## Raccourcis de taille

```scss
@include size(320px, 200px);       // width: 320px; height: 200px;
@include min-size(240px, 120px);   // min-width: 240px; min-height: 120px;
@include max-size(1200px, 80vh);   // max-width: 1200px; max-height: 80vh;

@include square(48px);             // width: 48px; height: 48px;
@include content-size();           // width: max-content; height: auto;
@include size-auto();              // width: auto; height: auto;
@include full-size(true);          // width: 100% !important; height: 100% !important;
```


## Box Sizing

Valeurs prévues : `border-box` et `content-box`.

```scss
@include box-sizing(border-box);       // box-sizing: border-box;
@include box-sizing(content-box, true); // box-sizing: content-box !important;
```


## Exemple complet

```scss
.card {
	@include min-size(280px, auto);
	@include max-width(640px);
	@include box-sizing(border-box);
}

.hero {
	@include viewport(100, 100);
	@include min-height(480px);
}

.avatar {
	@include square(40px);
	@include box-sizing(border-box);
}
```
