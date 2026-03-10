# builder

```txt
  core/
    _layering.scss        // @layer reset, base, components, utilities
    _reset.scss           // reset + a11y-safe
    _tokens.scss          // CSS vars : couleurs, spacing scale, radius, etc.
    _mixins.core.scss     // mixins base (logical, clamp, mq…)
  layout/
    _flow.scss            // display, contain, overflow, visibility
    _position.scss        // position, inset, z-index
    _flex.scss
    _grid.scss
    _multicol.scss
    _tables.scss
    _aspect-media.scss    // aspect-ratio, object-*
  spacing/
    _margins.scss
    _paddings.scss
    _gap.scss
    _scroll-spacing.scss
  sizing/
    _sizing.scss          // width/height + logical variants
  borders/
    _border.scss
    _outline.scss
    _radius.scss
  typography/
    _font.scss
    _text.scss
    _writing.scss
  theme/
    _colors.scss
    _background.scss
    _accents.scss
    _svg-colors.scss
    _scheme.scss
  visual/
    _shadow.scss
    _blend.scss
    _filter.scss
    _clip-mask.scss
    _opacity.scss
  motion/
    _transition.scss
    _animation.scss
    _transform.scss
  interaction/
    _ui.scss              // cursor, user-select, touch-action, resize…
    _scroll.scss          // scroll-behavior, snap, overscroll, scrollbar
  a11y/
    _focus.scss
    _reduced-motion.scss
    _print.scss
  content/
    _generated.scss       // content, counters
  advanced/
    _performance.scss     // will-change, contain-intrinsic-*
    _containers.scss      // @container helpers
```








> **Légende**
>
> *   *(logiques)* = variantes logiques `*-inline`, `*-block`, etc.
> *   *(longhands)* = variantes longue main (ex. `margin-top`, `margin-right`…).
> *   *(shorthand)* = forme abrégée (ex. `border`, `background`, etc.).
> *   *(expérimental/limitée)* = support partiel, facultatif selon ton scope.

***

## core/


### `core/_reset.scss` — (reset + a11y-safe)

*   **Box-model & base** :  
    `box-sizing`, `margin: 0`, `padding: 0`, `border: 0`, `outline: 0`, `background: none`, `color: inherit`, `font: inherit`, `line-height`, `vertical-align: baseline`
*   **Images & média** :  
    `max-width: 100%`, `height: auto`, `display: block`, `object-fit` *(rare, selon stratégie)*
*   **Typo & texte** :  
    `text-decoration: inherit`, `text-decoration-skip-ink: auto`, `text-rendering` *(optionnel)*, `-webkit-text-size-adjust` / `text-size-adjust`
*   **Listes & citations** :  
    `list-style: none`, `quotes: none`
*   **Tables** :  
    `border-collapse: collapse`, `border-spacing: 0`
*   **Formulaires** :  
    `appearance: none`, `background: none`, `border: 0`, `font: inherit`, `letter-spacing: inherit`, `color: inherit`, `-webkit-appearance: none`, `outline-offset` *(si focus visible)*
*   **Focus** :  
    `outline`, `outline-offset` (styles de focus visibles accessibles)
*   **Divers safe** :  
    `cursor: inherit` (sur éléments non interactifs si utile), `overflow-wrap: break-word` (sur `.prose`), `tab-size`


### `core/_tokens.scss` — (variables CSS, pas de propriétés)

*   Déclare **uniquement** des `--tokens` :  
    couleurs (`--color-…`), spacing scale (`--space-1..n`), radius (`--r-…`), shadows (`--shadow-…`), z-index (`--z-…`), typo scale (`--fs-…`, `--lh-…`), durations/ easings (`--dur-…`, `--ease-…`), breakpoints / containers (`--bp-…`, `--container-…`), opacités, etc.
*   **Aucune propriété “métier” ici**.

### `core/_mixins.core.scss` — (utils & mixins, pas de propriétés directes)

*   Mixins/fonctions génériques : `prop()`, `fluid-size()`, `mq()`, normalisation nombres nus, listes, maps, `clamp()` helpers, calculs `rem/em`, helpers RTL/logiques, etc.

***




## advanced/

### `advanced/_performance.scss`
  
- ✅ `will-change`, 
*   `contain`, 
*   `contain-intrinsic-size`, 
*   `contain-intrinsic-width`, 
*   `contain-intrinsic-height`,  
*   `contain-intrinsic-inline-size`, 
*   `contain-intrinsic-block-size`

### `advanced/_containers.scss`

*   `container-type`
*   `container-name`
*   `container` *(shorthand : name / type)*
*   `@container` (at-rule ; helpers/mixins associés)


***

## borders/

### `border/_border.scss`
  
- ✅ `border`
- ✅ `border-width`
- ✅ `border-style`
- ✅ `border-color`
- ✅ `border-top`
- ✅ `border-top-width`
- ✅ `border-top-style`
- ✅ `border-top-color`
- ✅ `border-right`
- ✅ `border-right-width`
- ✅ `border-right-style`
- ✅ `border-right-color`
- ✅ `border-bottom`
- ✅ `border-bottom-width`
- ✅ `border-bottom-style`
- ✅ `border-bottom-color`
- ✅ `border-left`
- ✅ `border-left-width`
- ✅ `border-left-style`
- ✅ `border-left-color`

### `border/_corner.scss`

- ✅ `corner-rounded`
- ✅ `corner-start`
- ✅ `corner-end`
- ✅ `corner-top`
- ✅ `corner-bottom`
- ✅ `corner-top-start`
- ✅ `corner-top-left`
- ✅ `corner-top-end`
- ✅ `corner-top-right`
- ✅ `corner-bottom-start`
- ✅ `corner-bottom-left`
- ✅ `corner-bottom-end`
- ✅ `corner-bottom-right`
- ✅ `corner-inline`
- ✅ `corner-block`
- ✅ `corner-rounded-full`
- ✅ `corner-rounded-circle`

### `border/_image.scss`

- ✅ `border-image`
- ✅ `border-image-source`
- ✅ `border-image-slice`
- ✅ `border-image-width`
- ✅ `border-image-outset`
- ✅ `border-image-repeat`

### `border/_outline.scss`

- ✅ `outline`
- ✅ `outline-width`
- ✅ `outline-style`
- ✅ `outline-color`
- ✅ `outline-offset`

### `border/_radius.scss`

- ✅ `border-radius`
- ✅ `border-top-left-radius`
- ✅ `border-top-right-radius`
- ✅ `border-bottom-left-radius`
- ✅ `border-bottom-right-radius`

### `border/_inline.scss`

- ✅ `border-inline`
- ✅ `border-inline-start`
- ✅ `border-inline-end`
- ✅ `border-inline-left`
- ✅ `border-inline-right`
- ✅ `border-inline-inherit`
- ✅ `border-inline-initial`
- ✅ `border-inline-unset`
- ✅ `border-inline-revert`
- ✅ `border-inline-none`
- ✅ `border-inline-default`
- ✅ `border-inline-width`
- ✅ `border-inline-style`
- ✅ `border-inline-color`

### `border/_block.scss`

- ✅ `border-block`
- ✅ `border-block-inherit`
- ✅ `border-block-initial`
- ✅ `border-block-unset`
- ✅ `border-block-revert`
- ✅ `border-block-none`
- ✅ `border-block-default`
- ✅ `border-block-hidden`
- ✅ `border-block-width`
- ✅ `border-block-style`
- ✅ `border-block-color`


***

## content/

### `content/_content.scss`

- ✅ `content`

### `content/_counter.scss`

- ✅ `counter-reset`, 
- ✅ `counter-increment`
- ✅ `counter-set`
- ✅ `counters`
- ✅ `counter`

### `content/_quotes.scss`

- ✅ `quotes`
- ✅ `quotes-inherit`
- ✅ `quotes-initial`
- ✅ `quotes-revert`
- ✅ `quotes-unset`
- ✅ `quotes-none`
- ✅ `quotes-auto`
- ✅ `quotes-default`
- ✅ `quotes-english`
- ✅ `quotes-french`
- ✅ `quotes-german`
- ✅ `quotes-japanese`
- ✅ `quotes-chinese`
- ✅ `quotes-spanish`
- ✅ `quotes-italian`
- ✅ `quotes-russian`
- ✅ `quotes-arabic`
- ✅ `quotes-hebrew`
- ✅ `quotes-korean`
- ✅ `quotes-english-single`
- ✅ `quotes-french-single`
- ✅ `quotes-german-single`
- ✅ `quotes-japanese-single`
- ✅ `quotes-chinese-single`
- ✅ `quotes-spanish-single`
- ✅ `quotes-italian-single`
- ✅ `quotes-russian-single`
- ✅ `quotes-arabic-single`
- ✅ `quotes-hebrew-single`
- ✅ `quotes-korean-single`


***

## interaction/

### `interaction/scroll/_scroll.scss`

- ✅ `scroll,
- ✅ `scroll-inherit`
- ✅ `scroll-initial`
- ✅ `scroll-revert`
- ✅ `scroll-unset`
- ✅ `scroll-auto`
- ✅ `scroll-smooth`
- ✅ `scroll-none`
- ✅ `scroll-visible`
- ✅ `scroll-hidden`
- ✅ `scroll-clip`
- ✅ `scroll-behavior`
- ✅ `overscroll-behavior`
- ✅ `overscroll-behavior-x`
- ✅ `overscroll-behavior-y`

### `interaction/scroll/_scrollbar.scss`

- ✅ `scrollbar-gutter` *(standard)*, 
- ✅ `scrollbar-width` *(Firefox)*, 
- ✅ `scrollbar-color` *(Firefox)*  

### `interaction/scroll/_snap.scss`

- ✅ `scroll-snap-type`
- ✅ `scroll-snap-align`
- ✅ `scroll-snap-stop`
- ✅ `scroll-snap-margin`
- ✅ `scroll-snap-padding`
- ✅ `scroll-snap-destination`
- ✅ `scroll-snap-coordinate`
- ✅ `scroll-snap-type-inherit`

### `interaction/ui/_appearance.scss`

- ✅ `appearance`

### `interaction/ui/_cursor.scss`

- ✅ `cursor`
- ✅ `cursor-inherit`
- ✅ `cursor-initial`
- ✅ `cursor-unset`
- ✅ `cursor-revert`
- ✅ `cursor-default`
- ✅ `cursor-pointer`
- ✅ `cursor-not-allowed`
- ✅ `cursor-wait`
- ✅ `cursor-move`
- ✅ `cursor-text`
- ✅ `cursor-help`
- ✅ `cursor-crosshair`
- ✅ `cursor-grab`
- ✅ `cursor-grabbing`
- ✅ `cursor-zoom-in`
- ✅ `cursor-zoom-out`
- ✅ `cursor-url`

### `interaction/ui/_pointer-events.scss`

- ✅ `pointer-events`
- ✅ `pointer-events($value`
- ✅ `pointer-events-inherit`
- ✅ `pointer-events-initial`
- ✅ `pointer-events-revert`
- ✅ `pointer-events-unset`
- ✅ `pointer-events-none`
- ✅ `pointer-events-auto`
- ✅ `pointer-events-visible`
- ✅ `pointer-events-visibleFill`
- ✅ `pointer-events-visibleStroke`
- ✅ `pointer-events-visiblePainted`
- ✅ `pointer-events-painted`
- ✅ `pointer-events-fill`
- ✅ `pointer-events-stroke`

### `interaction/ui/_touch-action.scss`

- ✅ `touch-action`
- ✅ `touch-callout`

### `interaction/ui/_user.scss`

- ✅ `user-select`
- ✅ `user-select-inherit`
- ✅ `user-select-initial`
- ✅ `user-select-revert`
- ✅ `user-drag`

### `interaction/ui/_resize.scss`

- ✅ `resize`
- ✅ `resize-inherit`
- ✅ `resize-initial`
- ✅ `resize-revert`
- ✅ `resize-unset`
- ✅ `resize-none`


***

## layout/

### `layout/flex/_alignment.scss`

- ✅ `flex-justify-content`
- ✅ `flex-align-items`
- ✅ `flex-align-self`
- ✅ `flex-align-content`

### `layout/flex/_direction.scss`

- ✅ `flex-direction`
- ✅ `flex-row`
- ✅ `flex-row-reverse`
- ✅ `flex-column`
- ✅ `flex-column-reverse`

### `layout/flex/_flex.scss`

- ✅ `flex`
- ✅ `flex-grow`
- ✅ `flex-shrink`
- ✅ `flex-basis`

### `layout/flex/_order.scss`

- ✅ `flex-order`

### `layout/flex/_wrap.scss`

- ✅ `flex-wrap`
- ✅ `flex-nowrap`
- ✅ `flex-wrap-inverse`

### `layout/flow/_box-sizing.scss`

- ✅ `box-sizing`

### `layout/flow/_clearfix.scss`

- ✅ `clearfix`
- ✅ `clear`
- ✅ `clear-both`
- ✅ `clear-left`
- ✅ `clear-right`
- ✅ `clear-none`
- ✅ `clear-inherit`
- ✅ `clear-inline-start`
- ✅ `clear-inline-end`

### `layout/flow/_contain.scss`

- ✅ `contain`
- ✅ `contain-none`
- ✅ `contain-strict`
- ✅ `contain-content`
- ✅ `contain-size`
- ✅ `contain-layout`
- ✅ `contain-paint`
- ✅ `contain-style`
- ✅ `contain-intrinsic-size`
- ✅ `contain-inline-size`

### `layout/flow/_display.scss`

- ✅ `display`
- ✅ `display-block`
- ✅ `display-inline`
- ✅ `display-inline-block`
- ✅ `display-inline-flex`
- ✅ `display-none`
- ✅ `display-content`
- ✅ `display-flex`
- ✅ `display-grid`
- ✅ `display-list`
- ✅ `display-table`
- ✅ `display-ruby`
- ✅ `display-flow-root`

### `layout/flow/_float.scss`

- ✅ `float`, 
- ✅ `float-left`, 
- ✅ `float-right`, 
- ✅ `float-none`, 
- ✅ `float-inherit`,

### `layout/flow/_overflow.scss`

- ✅ `overflow`
- ✅ `overflow-visible`
- ✅ `overflow-hidden`
- ✅ `overflow-clip`
- ✅ `overflow-scroll`
- ✅ `overflow-auto`
- ✅ `overflow-x`
- ✅ `overflow-x-visible`
- ✅ `overflow-x-hidden`
- ✅ `overflow-x-clip`
- ✅ `overflow-x-scroll`
- ✅ `overflow-x-auto`
- ✅ `overflow-y`
- ✅ `overflow-y-visible`
- ✅ `overflow-y-hidden`
- ✅ `overflow-y-clip`
- ✅ `overflow-y-scroll`
- ✅ `overflow-y-auto`
- ✅ `overflow-inline`
- ✅ `overflow-inline-visible`
- ✅ `overflow-inline-hidden`
- ✅ `overflow-inline-clip`
- ✅ `overflow-inline-scroll`
- ✅ `overflow-inline-auto`
- ✅ `overflow-block`
- ✅ `overflow-block-visible`
- ✅ `overflow-block-hidden`
- ✅ `overflow-block-clip`
- ✅ `overflow-block-scroll`
- ✅ `overflow-block-auto`
*   `overflow-clip-margin`
*   `overflow-anchor`

### `layout/flow/_visibility.scss`

- ✅ `visibility`
- ✅ `visibility-visible`
- ✅ `visibility-hidden`
- ✅ `visibility-collapse`

### `layout/grid/_alignment.scss`

- ✅ `grid-justify-self`
- ✅ `grid-justify-items`
- ✅ `grid-justify-content`
- ✅ `grid-align-self`
- ✅ `grid-align-items`
- ✅ `grid-align-content`
- ✅ `grid-place-self`
- ✅ `grid-place-items`
- ✅ `grid-place-content`

### `layout/grid/_auto.scss`

- ✅ `grid-auto-flow`
- ✅ `grid-auto-columns`
- ✅ `grid-auto-rows`

### `layout/grid/_column.scss`

- ✅ `grid-column`
- ✅ `grid-column-start`
- ✅ `grid-column-end`

### `layout/grid/_grid.scss`

- ✅ `grid`

### `layout/grid/_row.scss`

- ✅ `grid-row`
- ✅ `grid-row-start`
- ✅ `grid-row-end`

### `layout/grid/_template_.scss`

- ✅ `grid-area`
- ✅ `grid-template-columns`
- ✅ `grid-template-rows`
- ✅ `grid-template-areas`

### `layout/media/_ratio.scss`

- ✅ `aspect-ratio`

### `layout/media/_object.scss`

- ✅ `object-fit`
- ✅ `object-fit-cover`
- ✅ `object-fit-contain`
- ✅ `object-fit-fill`
- ✅ `object-fit-none`
- ✅ `object-fit-scale-down`
- ✅ `object-position`
- ✅ `object-position-center`
- ✅ `object-position-top`
- ✅ `object-position-bottom`
- ✅ `object-position-left`
- ✅ `object-position-right`
- ✅ `object-fit-position`
- ✅ `object-inherit`
- ✅ `object-initial`
- ✅ `object-unset`
- ✅ `object-revert`

### `layout/position/_position.scss`

- ✅ `position`
- ✅ `position-static`
- ✅ `position-relative`
- ✅ `position-absolute`
- ✅ `position-fixed`
- ✅ `position-sticky`
- ✅ `inset`
- ✅ `inset-top`
- ✅ `inset-right`
- ✅ `inset-bottom`
- ✅ `inset-left`
- ✅ `inset-inline`
- ✅ `inset-block`
- ✅ `inset-inline-start`
- ✅ `inset-inline-end`
- ✅ `inset-block-start`
- ✅ `inset-block-end`

### `layout/position/_z-index_.scss`

- ✅ `z-index`


### `layout/_multicol.scss` — (Multi-colonnes)

*   `columns` *(shorthand)*, 
`column-width`, 
`column-count`
*   `column-fill`, 
`column-span`, 
`column-rule`, 
`column-rule-color`, 
`column-rule-style`, 
`column-rule-width`

### `layout/_tables.scss` — (Tableaux)

*   `table-layout`
*   `border-collapse`
*   `border-spacing`
*   `caption-side`
*   `empty-cells`


***

## motion/

### `motion/_transition.scss`

- ✅ `transition` *(shorthand)*
- ✅ `transition-none`
- ✅ `transition-property`
- ✅ `transition-duration`
- ✅ `transition-timing-function`
- ✅ `transition-delay`

### `motion/_animation.scss`

- ✅ `animation` *(shorthand)*
- ✅ `animation-none`
- ✅ `animation-name`, `animation-duration`, `animation-timing`, `animation-delay`
- ✅ `animation-iteration-count`, `animation-direction`, `animation-fill-mode`, 
- ✅ `animation-play-state`, `animation-running`, `animation-play`, `animation-paused`, `animation-stop`
*   *(scroll-linked / view transitions – si adoptés)* :  
    `animation-timeline` *(si support)*, `view-transition-name`

### `motion/_transform.scss`

- ✅ `transform`
- ✅ `transform-origin`
- ✅ `transform-style`
- ✅ `perspective`
- ✅ `perspective-origin`
- ✅ `backface-visibility`

***



## sizing/

### `sizing/_height_.scss`

- ✅ `height`
- ✅ `min-height`
- ✅ `max-height`
- ✅ `height-auto`
- ✅ `height-fit` 
- ✅ `min-height-content`
- ✅ `max-height-content`

### `sizing/_sizing.scss`

- ✅ `size`
- ✅ `min-size`
- ✅ `max-size`
- ✅ `square`
- ✅ `content-size`
- ✅ `size-auto`
- ✅ `full-size`

### `sizing/_viewport_.scss`

- ✅ `viewport`
- ✅ `viewport-width`
- ✅ `viewport-height`

### `sizing/_width_.scss`

- ✅ `width`
- ✅ `min-width`
- ✅ `max-width`
- ✅ `width-auto`
- ✅ `width-full`
- ✅ `width-fit` 
- ✅ `min-width-content`
- ✅ `max-width-content`

`inline-size`, 
`min-inline-size`, 
`max-inline-size`, 
`block-size`, 
`min-block-size`, 
`max-block-size`


***

## spacing/

### `spacing/_gap.scss`

- ✅ `gap`, `row-gap`, `column-gap`  
    *(utilisés par flex, grid, multicol — centralisés ici)*

### `spacing/_margins.scss`

- ✅ `margin` 
- ✅ `margin-top`
- ✅ `margin-right`
- ✅ `margin-bottom`
- ✅ `margin-left`
- ✅ `margin-inline`
- ✅ `margin-inline-start`
- ✅ `margin-inline-end`
- ✅ `margin-block`
- ✅ `margin-block-start`
- ✅ `margin-block-end`
- ✅ `margin-x`
- ✅ `margin-y`

### `spacing/_paddings.scss`

- ✅ `padding`
- ✅ `padding-top`
- ✅ `padding-right`
- ✅ `padding-bottom`
- ✅ `padding-left`
- ✅ `padding-inline`
- ✅ `padding-inline-start`
- ✅ `padding-inline-end`
- ✅ `padding-block`
- ✅ `padding-block-start`
- ✅ `padding-block-end`
- ✅ `padding-x`
- ✅ `padding-y`

### `spacing/_scroll-spacing.scss`

*   `scroll-margin`
*   `scroll-margin-top`
*   `scroll-margin-right`
*   `scroll-margin-bottom`
*   `scroll-margin-left`

*   `scroll-margin-inline`
*   `scroll-margin-inline-start`
*   `scroll-margin-inline-end`
*   `scroll-margin-block`
*   `scroll-margin-block-start`
*   `scroll-margin-block-end`

*   `scroll-padding`, 
*   `scroll-padding-top`
*   `scroll-padding-right`
*   `scroll-padding-bottom`
*   `scroll-padding-left`

*   `scroll-padding-inline`
*   `scroll-padding-inline-start`
*   `scroll-padding-inline-end`
*   `scroll-padding-block`
*   `scroll-padding-block-start`
*   `scroll-padding-block-end`

***


## theme/

### `theme/_accents.scss`

- ✅ `accent-color`
- ✅ `caret-color`
*   `::selection`

### `theme/_background.scss`

- ✅ `background` *(shorthand)*
- ✅ `background-color`
- ✅ `background-image`
- ✅ `background-position`
- ✅ `background-position-x`
- ✅ `background-position-y`
- ✅ `background-size`
- ✅ `background-repeat`
- ✅ `background-attachment`
- ✅ `background-origin`
- ✅ `background-clip`

> ℹ️ **Mélanges** → `background-blend-mode` est **dans `visual/_blend.scss`**.

### `theme/_colors.scss`

- ✅ `color` *(couleur de texte / foreground)*

### `theme/_svg-colors.scss`

*   `fill`
*   `stroke`, 
*   `stroke-width`, 
*   `stroke-linecap`, 
*   `stroke-linejoin`, 
*   `stroke-miterlimit`
*   `stroke-dasharray`, 
*   `stroke-dashoffset`
*   `paint-order`

### `theme/_scheme.scss`

*   `color-scheme`


***

## typography/

### `typography/font/_accessibility.scss`

- ✅ `font-size-adjust`

### `typography/font/_font.scss`

- ✅ `font`,
- ✅ `font-family`, 
- ✅ `font-size`, 
- ✅ `font-style`, 
- ✅ `font-weight`, 
- ✅ `font-stretch`

### `typography/font/_variant.scss`

- ✅ `font-variant`, 
- ✅ `font-variant-normal`, 
- ✅ `font-variant-small-caps`, 
- ✅ `font-variant-all-small-caps`, 
- ✅ `font-variant-petite-caps`, 
- ✅ `font-variant-all-petite-caps`, 
- ✅ `font-variant-unicase`, 
- ✅ `font-variant-titling-caps`
- ✅ `font-variant-ligatures`, 
- ✅ `font-variant-caps`, 
- ✅ `font-variant-numeric`, 
- ✅ `font-variant-east-asian`, 
- ✅ `font-variant-alternates`

*   `font-feature-settings`, 
`font-kerning`
*   **Variable fonts** : 
`font-optical-sizing`, 
`font-variation-settings`, 
`font-synthesis`

### `typography/text/_accessibility.scss`

- ✅ `text-size-adjust`

### `typography/text/_alignment.scss`

- ✅ `text-align`, 
- ✅ `text-align-left`, 
- ✅ `text-align-right`, 
- ✅ `text-align-center`, 
- ✅ `text-align-start`, 
- ✅ `text-align-end`, 
- ✅ `text-align-first`,
- ✅ `text-align-last`, 
- ✅ `text-align-justify`, 
- ✅ `text-justify`, 
- ✅ `text-align-match-parent`, 

### `typography/text/_breakup.scss`

- ✅ `hyphens`, 
- ✅ `overflow-wrap`
- ✅ `word-wrap`, 
- ✅ `word-break`, 
- ✅ `line-break`

### `typography/text/_decoration.scss`

- ✅ `text-decoration`, 
- ✅ `text-decoration-line`, 
- ✅ `text-decoration-color`, 
- ✅ `text-decoration-style`, 
- ✅ `text-decoration-thickness`, 
- ✅ `text-underline-offset`, 
- ✅ `text-underline-position`, 
- ✅ `text-decoration-skip-ink`

### `typography/text/_indent.scss`

- ✅ `text-indent`

### `typography/text/_spacing.scss`

- ✅ `line-height`, 
- ✅ `letter-spacing`, 
- ✅ `word-spacing`
- ✅ `white-space`, 
- ✅ `tab-size`, 

### `typography/text/_transformation.scss`

- ✅ `text-transform`, 
- ✅ `text-transform-none`, 
- ✅ `text-uppercase`, 
- ✅ `text-lowercase`, 
- ✅ `text-capitalize`, 
- ✅ `text-full-width`, 
- ✅ `text-full-size-kana`

    `text-overflow`

*   **Wrapping moderne** :  
    `text-wrap` *(ex. `balance`)*

### `typography/_writing.scss`

*   `writing-mode`
*   `direction`
*   `unicode-bidi`
*   `text-orientation`
*   `hanging-punctuation`


***

## visual/

### `visual/_blend.scss`

- ✅ `mix-blend-mode`
- ✅ `isolation`
- ✅ `background-blend-mode`

### `visual/_filter.scss`

- ✅ `filter`
- ✅ `filter-none`
- ✅ `filter-initial`
- ✅ `filter-inherit`
- ✅ `filter-unset`
- ✅ `filter-revert`
- ✅ `filter-all`
- ✅ `filter-revert-layer`
- ✅ `filter-blur`
- ✅ `filter-brightness`
- ✅ `filter-contrast`
- ✅ `filter-grayscale`
- ✅ `filter-hue-rotate`
- ✅ `filter-invert`
- ✅ `filter-opacity`
- ✅ `filter-saturate`
- ✅ `filter-drop-shadow`
- ✅ `filter-url`
- ✅ `backdrop-filter`
- ✅ `backdrop-filter-none`
- ✅ `backdrop-filter-initial`
- ✅ `backdrop-filter-inherit`
- ✅ `backdrop-filter-unset`
- ✅ `backdrop-filter-revert`
- ✅ `backdrop-filter-all`
- ✅ `backdrop-filter-revert-layer`
- ✅ `backdrop-filter-blur`
- ✅ `backdrop-filter-brightness`
- ✅ `backdrop-filter-contrast`
- ✅ `backdrop-filter-grayscale`
- ✅ `backdrop-filter-hue-rotate`
- ✅ `backdrop-filter-invert`
- ✅ `backdrop-filter-opacity`
- ✅ `backdrop-filter-saturate`
- ✅ `backdrop-filter-drop-shadow`
- ✅ `backdrop-filter-url`

### `visual/_opacity.scss`

- ✅ `opacity`

### `visual/_shadow.scss`

- ✅ `box-shadow`
- ✅ `text-shadow`

### `visual/_clip.scss`

*   `clip-path`
*   `clip`

### `visual/_mask.scss`

*   `mask`
*   `mask-image`
*   `mask-mode`
*   `mask-repeat`
*   `mask-position`
*   `mask-size`,
*   `mask-origin`
*   `mask-clip`
*   `mask-composite`

*   `mask-border`
*   `mask-border-source`
*   `mask-border-mode`
*   `mask-border-slice`
*   `mask-border-width`
*   `mask-border-outset`
*   `mask-border-repeat`


***

















*   `image-rendering` *(peut rester ici en “rendering hints”)*

- `content-visibility` *(perf/skip rendering, mais placé ici pour l’usage layout)*

*   **Listes** *(placées ici faute de fichier dédié “lists”)* :  
    `list-style`, `list-style-type`, `list-style-position`, `list-style-image`  
    *(+ `::marker` pour styliser via `color`, `font`, etc.)*


*   **Shapes autour des floats** : `shape-outside`, `shape-image-threshold`, `shape-margin`

*   **Motion path (si utilisé)** : `offset`, `offset-position`, `offset-path`, `offset-distance`, `offset-rotate`, `offset-anchor` *(souvent expérimental/partiel)*

















## Structure

### Box Model 

#### Width

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

#### Height

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


#### Viewport

```scss
@include viewport(100, 100);       // width: 100vw; width: 100dvw; height: 100vh; height: 100dvh;
@include width-viewport(100);      // width: 100vw; width: 100dvw;
@include height-viewport(100);     // height: 100vh; height: 100dvh;

@include viewport(100, 100, true); // même sortie avec !important
```

#### Raccourcis de taille

```scss
@include size(320px, 200px);       // width: 320px; height: 200px;
@include min-size(240px, 120px);   // min-width: 240px; min-height: 120px;
@include max-size(1200px, 80vh);   // max-width: 1200px; max-height: 80vh;

@include square(48px);             // width: 48px; height: 48px;
@include content-size();           // width: max-content; height: auto;
@include size-auto();              // width: auto; height: auto;
@include full-size(true);          // width: 100% !important; height: 100% !important;
```


#### Box Sizing

```scss
@include box-sizing(border-box);         // box-sizing: border-box;
@include box-sizing(content-box, true);  // box-sizing: content-box !important;
```


### Display 

```scss
@include display(block, true);         // display: block !important;
@include display-block();              // display: block;
@include display-inline();             // display: inline;
@include display-inline-block();       // display: inline-block;
@include display-inline-flex();        // display: inline-flex;
@include display-none();               // display: none;
@include display-contents();           // display: contents;
@include display-flex();               // display: flex;
@include display-flex(inline);         // display: inline-flex;
@include display-flex(inline-flex);    // display: inline-flex;
@include display-grid();               // display: grid;
@include display-grid(inline);         // display: inline-grid;
@include display-grid(inline-grid);    // display: inline-grid;
@include display-list();               // display: list-item;
@include display-table();              // display: table;
@include display-table(inline);        // display: inline-table;
@include display-table(inline-table);  // display: inline-table;
@include display-table(row);           // display: table-row;
@include display-table(table-row);     // display: table-row;
@include display-table(cell);          // display: table-cell;
@include display-table(table-cell);    // display: table-cell;
@include display-ruby();               // display: ruby;
@include display-ruby(inline);         // display: inline-ruby;
@include display-ruby(inline-ruby);    // display: inline-ruby;
@include display-ruby(base);           // display: ruby-base;
@include display-ruby(ruby-base);      // display: ruby-base;
@include display-ruby(text);           // display: ruby-text;
@include display-ruby(ruby-text);      // display: ruby-text;
@include display-ruby(group);          // display: ruby-group;
@include display-ruby(ruby-group);     // display: ruby-group;
@include display-flow-root();          // display: flow-root;
```


### Position 

```scss
@include position(relative);           // position: relative;
@include position-static();            // position: static;
@include position-relative();          // position: relative;
@include position-absolute();          // position: absolute;
@include position-fixed();             // position: fixed;
@include position-sticky();            // position: sticky;
@include position-static();            // position: static;

@include top(10);                      // top: 10px;
@include right(10);                    // right: 10px;
@include bottom(10);                   // bottom: 10px;
@include left(10);                     // left: 10px;
@include z-index(10);                  // z-index: 10;

@include inset(10px);                  // top: 10px; right: 10px; bottom: 10px; left: 10px;
@include inset(10px 20px);             // top: 10px; right: 20px; bottom: 10px; left: 20px;
@include inset(10px 20px 30px);        // top: 10px; right: 20px; bottom: 30px; left: 20px;
@include inset(10px 20px 30px 40px);   // top: 10px; right: 20px; bottom: 30px; left: 40px;
@include inset(10px auto);             // top: 10px; right: auto; bottom: 10px; left: auto;
@include inset(10px auto, true);       // top: 10px !important; right: auto !important; bottom: 10px !important; left: auto !important;

@include inset-inline(10px);           // inset-inline: 10px;
@include inset-block(10px);            // inset-block: 10px;
@include inset-inline-start(10px);     // inset-inline-start: 10px;
@include inset-inline-end(10px);       // inset-inline-end: 10px;
@include inset-block-start(10px);      // inset-block-start: 10px;
@include inset-block-end(10px);        // inset-block-end: 10px;  
```

## Rendering 

```scss
@include contain(none);                          // contain: none;
@include contain(strict);                        // contain: strict;
@include contain(content);                       // contain: content;
@include contain(size);                          // contain: size;
@include contain(inline-size);                   // contain: inline-size;
@include contain(layout);                        // contain: layout;
@include contain(paint);                         // contain: paint;
@include contain(style);                         // contain: style;
@include contain(layout);                        // contain: layout;
@include contain(size paint);                    // contain: size paint;

@include contain-size();                         // contain: size;
@include contain-inline-size();                  // contain: inline-size;
@include contain-layout();                       // contain: layout;
@include contain-paint();                        // contain: paint;
@include contain-style();                        // contain: style;
@include contain-content();                      // contain: content;

@include cv-auto(10 400);                        // font-variant: cv(10, 400);

@include content-visibility('visible');          // content-visibility: visible;
@include content-visibility('auto');             // content-visibility: auto;
@include content-visibility('hidden');           // content-visibility: hidden;
@include contain-intrinsic-size('10px');         // contain-intrinsic-size: 10px;
@include contain-intrinsic-size('auto 10px');    // contain-intrinsic-size: auto 10px;
@include contain-intrinsic-size('10px 20px');    // contain-intrinsic-size: 10px 20px;
@include contain-intrinsic-size('auto 10px 20px');// contain-intrinsic-size: auto 10px 20px;
```

### Scroll

```scss
@include scrollbar-gutter(auto);               // scrollbar-gutter: auto;
@include scrollbar-gutter(stable);             // scrollbar-gutter: stable;
@include scrollbar-gutter(stable both-edges);  // scrollbar-gutter: stable both-edges;

@include overscroll-behavior(auto);            // overscroll-behavior: auto;
@include overscroll-behavior(contain);         // overscroll-behavior: contain;
@include overscroll-behavior(none);            // overscroll-behavior: none;
@include overscroll-behavior(auto none);       // overscroll-behavior: auto none;
@include overscroll-behavior(contain auto);    // overscroll-behavior: contain auto;

@include overscroll-behavior-x(auto);          // overscroll-behavior-x: auto;
@include overscroll-behavior-y(auto);          // overscroll-behavior-y: auto;
```



## Layout

### Flex 

```scss
@include flex(1 0 auto);                         // flex: 1 0 auto;

@include flex-direction(row);                    // flex-direction: row;
@include flex-direction(row-reverse);            // flex-direction: row-reverse;
@include flex-direction(column);                 // flex-direction: column;
@include flex-direction(column-reverse);         // flex-direction: column-reverse;

@include flex-wrap(nowrap);                      // flex-wrap: nowrap;
@include flex-wrap(wrap);                        // flex-wrap: wrap;
@include flex-wrap(wrap-reverse);                // flex-wrap: wrap-reverse;

@include flex-grow(0);                           // flex-grow: 0;
@include flex-grow(1);                           // flex-grow: 1;

@include flex-shrink(0);                         // flex-shrink: 0;
@include flex-shrink(1);                         // flex-shrink: 1;

@include flex-basis(100px);                      // flex-basis: 100px;
@include flex-basis(100);                        // flex-basis: 100px;
@include flex-basis(auto);                       // flex-basis: auto;
@include flex-basis(content);                    // flex-basis: content;

@include flex-justify-content(flex-start);       // justify-content: flex-start;
@include flex-justify-content(flex-end);         // justify-content: flex-end;
@include flex-justify-content(center);           // justify-content: center;
@include flex-justify-content(space-between);    // justify-content: space-between;
@include flex-justify-content(space-around);     // justify-content: space-around;
@include flex-justify-content(space-evenly);     // justify-content: space-evenly;

@include flex-align-items(flex-start);           // align-items: flex-start;
@include flex-align-items(flex-end);             // align-items: flex-end;
@include flex-align-items(center);               // align-items: center;
@include flex-align-items(baseline);             // align-items: baseline;
@include flex-align-items(stretch);              // align-items: stretch;

@include flex-align-content(flex-start);         // align-content: flex-start;
@include flex-align-content(flex-end);           // align-content: flex-end;
@include flex-align-content(center);             // align-content: center;
@include flex-align-content(space-between);      // align-content: space-between;
@include flex-align-content(space-around);       // align-content: space-around;
@include flex-align-content(stretch);            // align-content: stretch;

@include flex-align-self(auto);                  // align-self: auto;
@include flex-align-self(flex-start);            // align-self: flex-start;
@include flex-align-self(flex-end);              // align-self: flex-end;
@include flex-align-self(center);                // align-self: center;
@include flex-align-self(baseline);              // align-self: baseline;
@include flex-align-self(stretch);               // align-self: stretch;

@include flex-order(0);                          // order: 0;
@include flex-order(1);                          // order: 1;
@include flex-order(2);                          // order: 2;
@include flex-order(3);                          // order: 3;

@include flex-container(
    $display: flex,
    $direction: row,
    $wrap: wrap,
    $justify: center,
    $align-items: center,
    $align-content: center,
    $gap: 10px,
    $row-gap: 10px,
    $column-gap: 10px,
    $important: false
); // display: flex; flex-direction: row; flex-wrap: wrap; justify-content: center; align-items: center; align-content: center; gap: 10px; row-gap: 10px; column-gap: 10px;
```

### Grid

```scss
@include grid("auto 1fr / 2fr 1fr");  // grid-template: auto 1fr / 2fr 1fr;

@include grid-template-columns(100px 1fr 2fr);   // grid-template-columns: 100px 1fr 2fr;
@include grid-template-columns(repeat(3, 1fr));  // grid-template-columns: repeat(3, 1fr);

@include grid-template-rows(100px 1fr 2fr);   // grid-template-rows: 100px 1fr 2fr;
@include grid-template-rows(repeat(3, 1fr));  // grid-template-rows: repeat(3, 1fr);

@include grid-template-areas("header header header" "sidebar content content" "footer footer footer"); // grid-template-areas: "header header header" "sidebar content content" "footer footer footer";

@include grid-auto-flow(row dense);  // grid-auto-flow: row dense;
@include grid-auto-flow(column);     // grid-auto-flow: column;

@include grid-auto-columns(100px);  // grid-auto-columns: 100px;
@include grid-auto-columns(1fr);    // grid-auto-columns: 1fr;

@include grid-auto-rows(100px);  // grid-auto-rows: 100px;
@include grid-auto-rows(1fr);    // grid-auto-rows: 1fr;

@include grid-place-items(center);     // place-items: center;
@include grid-place-items(start end);  // place-items: start end;

@include grid-place-content(center);     // place-content: center;
@include grid-place-content(start end);  // place-content: start end;

@include grid-column(header);   // grid-column: header;
@include grid-column("1 / 3");  // grid-column: 1 / 3;
@include grid-column(span 2);   // grid-column: span 2;

@include grid-column-start(header);  // grid-column-start: header;
@include grid-column-start(1);       // grid-column-start: 1;

@include grid-column-end(header);  // grid-column-end: header;
@include grid-column-end(3);       // grid-column-end: 3;

@include grid-row(header);   // grid-row: header;
@include grid-row("1 / 3");  // grid-row: 1 / 3;
@include grid-row(span 2);   // grid-row: span 2;

@include grid-row-start(header);  // grid-row-start: header;
@include grid-row-start(1);       // grid-row-start: 1;

@include grid-row-end(header);  // grid-row-end: header;
@include grid-row-end(3);       // grid-row-end: 3;

@include place-self(center);     // place-self: center;
@include place-self(start end);  // place-self: start end;

@include justify-self(center);  // justify-self: center;
@include justify-self(start);   // justify-self: start;

@include align-self(center);  // align-self: center;
@include align-self(start);   // align-self: start;

@include grid-area(header);  // grid-area: header;
```

### Gaps 

```scss
@include gap(10px);                              // gap: 10px;
@include gap(10);                                // gap: 10px;
@include row-gap(10px);                          // row-gap: 10px;
@include row-gap(10);                            // row-gap: 10px;
@include column-gap(10px);                       // column-gap: 10px;
@include column-gap(10);                         // column-gap: 10px;
```

## Typography

### Font

```scss
@include font-family('Open Sans', sans-serif, true); // font-family: "Open Sans", sans-serif !important;
@include font-size(16px);                             // font-size: 16px;
@include font-weight(400, true);                      // font-weight: 400 !important;
@include font-style(italic);                          // font-style: italic;
@include font-stretch(normal);                        // font-stretch: normal;
@include font-variant(normal);                        // font-variant: normal;
```

### Line & spacing

```scss
@include line-height(1.5);     // line-height: 1.5;
@include letter-spacing(2px);  // letter-spacing: 2px;
@include letter-spacing(2);    // letter-spacing: 2px;
@include word-spacing(10px);   // word-spacing: 10px;
```

### Text behavior

```scss
@include text-align(center, true);            // text-align: center !important;
@include text-transform(uppercase);           // text-transform: uppercase;
@include text-decoration(underline overline); // text-decoration: underline overline;
@include text-indent(20px);                   // text-indent: 20px;
@include white-space(pre-line);               // white-space: pre-line;
@include word-break(break-all, true);         // word-break: break-all !important;
@include overflow-wrap(break-word, true);     // overflow-wrap: break-word !important;
@include hyphens(auto);                       // hyphens: auto;
```

### Text decoration & fine control

```scss
@include text-decoration-color(red);              // text-decoration-color: red;
@include text-decoration-thickness(2px);          // text-decoration-thickness: 2px;
@include text-underline-offset(2px);              // text-underline-offset: 2px;
@include text-underline-position(under, true);    // text-underline-position: under !important;
@include tab-size(4);                             // tab-size: 4;
@include text-wrap(normal);                       // text-wrap: normal;
@include text-size-adjust(auto, true);            // text-size-adjust: auto !important;
@include quotes('"«' '»"' '"‹' '›"');            // quotes: "«" "»" "‹" "›";
```

## Spacing
```scss
@include padding(10px 20px);             // padding: 10px 20px;
@include padding-top(10px);              // padding-top: 10px;
@include padding-right(20px);            // padding-right: 20px;
@include padding-bottom(10px);           // padding-bottom: 10px;
@include padding-left(20px);             // padding-left: 20px;

@include padding-x(20px);                // padding-right: 20px; padding-left: 20px;
@include padding-y(10px);                // padding-top: 10px; padding-bottom: 10px;

@include padding-inline(20px);           // padding-inline: 20px;
@include padding-inline-start(20px);     // padding-inline-start: 20px;
@include padding-inline-end(20px);       // padding-inline-end: 20px;
@include padding-block(10px);            // padding-block: 10px;
@include padding-block-start(10px);      // padding-block-start: 10px;
@include padding-block-end(10px);        // padding-block-end: 10px;

@include margin(10px 20px);              // margin: 10px 20px;
@include margin-top(10px);               // margin-top: 10px;
@include margin-right(20px);             // margin-right: 20px;
@include margin-bottom(10px);            // margin-bottom: 10px;
@include margin-left(20px);              // margin-left: 20px;

@include margin-x(20px);                 // margin-right: 20px; margin-left: 20px;
@include margin-y(10px);                 // margin-top: 10px; margin-bottom: 10px;

@include margin-inline(20px);            // margin-inline: 20px;
@include margin-inline-start(20px);      // margin-inline-start: 20px;
@include margin-inline-end(20px);        // margin-inline-end: 20px;
@include margin-block(10px);             // margin-block: 10px;
@include margin-block-start(10px);       // margin-block-start: 10px;
@include margin-block-end(10px);         // margin-block-end: 10px;
```


## Interactions

```scss
@include cursor(pointer);                        // cursor: pointer;
@include cursor(auto);                           // cursor: auto;
@include cursor(default);                        // cursor: default;
@include cursor(text);                           // cursor: text;
@include cursor(move);                           // cursor: move;
@include cursor(not-allowed);                    // cursor: not-allowed;
@include cursor(grab);                           // cursor: grab;
@include cursor(grabbing);                       // cursor: grabbing;
@include cursor(wait);                           // cursor: wait;
@include cursor(help);                           // cursor: help;
@include cursor(url('cursor.png'), pointer);     // cursor: url('cursor.png'), pointer;
@include cursor(pointer, true);                  // cursor: pointer !important;

@include user-select(none);                      // user-select: none;
@include user-select(text);                      // user-select: text;
@include user-select(all);                       // user-select: all;
@include user-select(auto);                      // user-select: auto;
@include user-select(text, true);                // user-select: text !important;

@include user-drag(none);                        // user-drag: none;
@include user-drag(auto);                        // user-drag: auto;
@include user-drag(element);                     // user-drag: element;
@include user-drag(element, true);               // user-drag: element !important;

@include pointer-events(auto);                   // pointer-events: auto;
@include pointer-events(none);                   // pointer-events: none;
@include pointer-events(visiblePainted);         // pointer-events: visiblePainted;
@include pointer-events(visibleFill);            // pointer-events: visibleFill;
@include pointer-events(visibleStroke);          // pointer-events: visibleStroke;
@include pointer-events(visible);                // pointer-events: visible;
@include pointer-events(painted);                // pointer-events: painted;
@include pointer-events(fill);                   // pointer-events: fill;
@include pointer-events(stroke);                 // pointer-events: stroke;
@include pointer-events(all);                    // pointer-events: all;
@include pointer-events(none, true);             // pointer-events: none !important;

@include touch-action(auto);                     // touch-action: auto;
@include touch-action(none);                     // touch-action: none;
@include touch-action(manipulation);             // touch-action: manipulation;
@include touch-action(pan-x);                    // touch-action: pan-x;
@include touch-action(pan-y);                    // touch-action: pan-y;
@include touch-action(pan-x pan-y);              // touch-action: pan-x pan-y;

@include touch-callout(none);                    // -webkit-touch-callout: none;
@include touch-callout(default);                 // -webkit-touch-callout: default;
@include touch-callout(inherit);                 // -webkit-touch-callout: inherit;

@include outline(1px solid red);                 // outline: 1px solid red;
@include outline(2px dashed blue, true);         // outline: 2px dashed blue !important;
@include outline-offset(5px);                    // outline-offset: 5px;
@include outline-offset(-2px, true);             // outline-offset: -2px !important;

@include tap-highlight-color(transparent);      // -webkit-tap-highlight-color: transparent;
@include tap-highlight-color(rgba(0, 0, 0, 0.1)); // -webkit-tap-highlight-color: rgba(0, 0, 0, 0.1);
```


### State
```scss
@include states-decls((
    color: (base: var(--c), hover: var(--c-hover)),
    'background-color': (base: var(--bg), focus: var(--bg-focus))
), (selector: '&'));
// color: var(--c); 
// &:hover { color: var(--c-hover); }
// background-color: var(--bg);
// &:focus { background-color: var(--bg-focus); }

@include color-states((base: #222, hover: #000)); 
// color: #222;
// &:hover { color: #000; }

@include caret-color-states((base: #222, hover: #000)); 
// caret-color: #222;
// &:hover { caret-color: #000; }

@include accent-color-states((base: #222, hover: #000)); 
// accent-color: #222;
// &:hover { accent-color: #000; }

@include text-decoration-color-states((base: #222, hover: #000)); 
// text-decoration-color: #222;
// &:hover { text-decoration-color: #000; }

@include text-emphasis-color-states((base: #222, hover: #000)); 
// text-emphasis-color: #222;
// &:hover { text-emphasis-color: #000; }

@include text-shadow-states((base: none, hover: 1px 1px 2px #000)); 
// text-shadow: none;
// &:hover { text-shadow: 1px 1px 2px #000; }

@include text-stroke-color-states((base: #222, hover: #000)); 
// -webkit-text-stroke-color: #222;
// &:hover { -webkit-text-stroke-color: #000; }

@include background-color-states((base: #fff, hover: #eee));
// background-color: #fff;
// &:hover { background-color: #eee; }

@include background-color-states((base: #fff, hover: #eee), (selector: '&:STATE')); 
// background-color: #fff;
// &:hover { background-color: #eee; }

@include background-states((base: #fff url(img.png) no-repeat, hover: #eee url(img-hover.png) repeat));
// background: #fff url(img.png) no-repeat;
// &:hover { background: #eee url(img-hover.png) repeat; }

@include background-image-states((base: url(img.png), hover: url(img-hover.png)));
// background-image: url(img.png);
// &:hover { background-image: url(img-hover.png); }

@include background-position-states((base: '0 0', hover: '10px 10px'));
// background-position: 0 0;
// &:hover { background-position: 10px 10px; }

@include background-size-states((base: 'auto', hover: 'cover'));
// background-size: auto;
// &:hover { background-size: cover; }

@include background-repeat-states((base: 'no-repeat', hover: 'repeat-x'));
// background-repeat: no-repeat;
// &:hover { background-repeat: repeat-x; }

@include background-attachment-states((base: 'scroll', hover: 'fixed'));
// background-attachment: scroll;
// &:hover { background-attachment: fixed; }

@include background-clip-states((base: 'border-box', hover: 'padding-box'));
// background-clip: border-box;
// &:hover { background-clip: padding-box; }

@include background-origin-states((base: 'border-box', hover: 'padding-box'));
// background-origin: border-box;
// &:hover { background-origin: padding-box; }

@include border-color-states((base: #ccc, focus: #999));
// border-color: #ccc;
// &:focus { border-color: #999; }

@include border-width-states((base: '1px', focus: '2px'));
// border-width: 1px;
// &:focus { border-width: 2px; }

@include border-style-states((base: 'solid', focus: 'dashed'));
// border-style: solid;
// &:focus { border-style: dashed; }

@include border-radius-states((base: '4px', focus: '8px'));
// border-radius: 4px;
// &:focus { border-radius: 8px; }

@include border-top-color-states((base: #ccc, focus: #999));
// border-top-color: #ccc;
// &:focus { border-top-color: #999; }

@include border-right-color-states((base: #ccc, focus: #999));
// border-right-color: #ccc;
// &:focus { border-right-color: #999; }

@include border-bottom-color-states((base: #ccc, focus: #999));
// border-bottom-color: #ccc;
// &:focus { border-bottom-color: #999; }

@include border-left-color-states((base: #ccc, focus: #999));
// border-left-color: #ccc;
// &:focus { border-left-color: #999; }

@include outline-color-states((base: #222, hover: #000));
// outline-color: #222;
// &:hover { outline-color: #000; }

@include outline-width-states((base: '1px', hover: '2px'));
// outline-width: 1px;
// &:hover { outline-width: 2px; }

@include outline-style-states((base: 'solid', hover: 'dashed'));
// outline-style: solid;
// &:hover { outline-style: dashed; }

@include outline-states((base: '1px solid #222', hover: '2px dashed #000'));
// outline: 1px solid #222;
// &:hover { outline: 2px dashed #000; }

@include fill-states((base: #000, hover: #555));
// fill: #000;
// &:hover { fill: #555; }

@include stroke-states((base: #000, hover: #555));
// stroke: #000;
// &:hover { stroke: #555; }

@include stroke-width-states((base: '1px', hover: '2px'));
// stroke-width: 1px;
// &:hover { stroke-width: 2px; }

@include opacity-states((base: 1, hover: 0.8));
// opacity: 1;
// &:hover { opacity: 0.8; }

@include box-shadow-states((base: 'none', hover: '0 4px 6px rgba(0,0,0,0.1)'));
// box-shadow: none;
// &:hover { box-shadow: 0 4px 6px rgba(0,0,0,0.1); }

@include filter-states((base: 'none', hover: 'blur(5px)'));
// filter: none;
// &:hover { filter: blur(5px); }

@include backdrop-filter-states((base: 'none', hover: 'blur(5px)'));
// backdrop-filter: none;
// &:hover { backdrop-filter: blur(5px); }

@include mix-blend-mode-states((base: 'normal', hover: 'multiply'));
// mix-blend-mode: normal;
// &:hover { mix-blend-mode: multiply; }

@include isolation-states((base: 'auto', hover: 'isolate'));
// isolation: auto;
// &:hover { isolation: isolate; }

@include cursor-states((base: 'default', hover: 'pointer'));
// cursor: default;
// &:hover { cursor: pointer; }

@include pointer-events-states((base: 'auto', hover: 'none'));
// pointer-events: auto;
// &:hover { pointer-events: none; }

@include user-select-states((base: 'auto', hover: 'none'));
// user-select: auto;
// &:hover { user-select: none; }

@include touch-action-states((base: 'auto', touch-drag: 'pan-x pinch-zoom'));
// touch-action: auto;
// @supports (touch-action: pan-x) {
//   &:touch-drag { touch-action: pan-x pinch-zoom; }
// }

@include display-states((base: 'block', hover: 'none'));
// display: block;
// &:hover { display: none; }

@include visibility-states((base: 'visible', hover: 'hidden'));
// visibility: visible;
// &:hover { visibility: hidden; }
```

### Transition

```scss
@include transition((opacity 200ms ease, transform 300ms));                  // transition: opacity 200ms ease, transform 300ms;
@include transition((opacity 200ms ease, transform 300ms), true);            // transition: opacity 200ms ease, transform 300ms !important;

@include transition-ease(opacity, 200, ease);                                 // transition: opacity 200ms ease;
@include transition-ease(opacity, 200, ease, true);                           // transition: opacity 200ms ease !important;

@include transition-property((opacity, transform));                           // transition-property: opacity, transform;
@include transition-property((opacity, transform), true);                     // transition-property: opacity, transform !important;

@include transition-duration((200, 300ms));                                   // transition-duration: 200ms, 300ms;
@include transition-duration((200, 300ms), true);                             // transition-duration: 200ms, 300ms !important;

@include transition-delay((100, 200ms));                                      // transition-delay: 100ms, 200ms;
@include transition-delay((100, 200ms), true);                                // transition-delay: 100ms, 200ms !important;

@include transition-timing-function((ease, linear));                          // transition-timing-function: ease, linear;
@include transition-timing-function((ease, linear), true);                    // transition-timing-function: ease, linear !important;

@include transition-none();                                                   // transition: none;
@include transition-none(true);                                               // transition: none !important;

@include transition-set((opacity, transform), 200, ease);                     // transition: opacity 200ms ease, transform 200ms ease;
@include transition-set((opacity, transform), 200, ease, true);               // transition: opacity 200ms ease, transform 200ms ease !important;

@include transition-vars((opacity, transform), 200, ease, 100ms);             // transition: opacity 200ms ease 100ms, transform 200ms ease 100ms;
@include transition-vars((opacity, transform), 200, ease, 100ms, true);       // transition: opacity 200ms ease 100ms, transform 200ms ease 100ms !important;
```



### Clear

```scss
@include clear(both);               // clear: both;
@include clear(left);               // clear: left;
@include clear(right);              // clear: right;
@include clear(none);               // clear: none;
@include clear-both;                // clear: both;
@include clear-left;                // clear: left;
@include clear-right;               // clear: right;
@include clear-none;                // clear: none;
@include clear-inline-start;        // clear: inline-start;
@include clear-inline-end;          // clear: inline-end;
@include clearfix;                  // clear: both; (clearfix helper)
```

### Corner

```scss
@include corner-rounded(8 12 10 9);   // border-radius: 8px 12px 10px 9px;

@include corner-start(8 12);          // border-start-start-radius: 8px;    // border-end-start-radius: 12px;
@include corner-end(8 12);            // border-start-end-radius: 8px;    // border-end-end-radius: 12px;
@include corner-top(8 12);            // border-top-left-radius: 8px;   // border-top-right-radius: 12px;
@include corner-bottom(8 12);         // border-bottom-left-radius: 8px;  // border-bottom-right-radius: 12px;

@include corner-top-start(8 12);      // border-start-start-radius: 8px 12px;
@include corner-top-end(8 12);        // border-start-end-radius: 8px 12px;
@include corner-top-left(8 12);       // border-top-left-radius: 8px 12px;
@include corner-top-right(8 12);      // border-top-right-radius: 8px 12px;

@include corner-bottom-start(8 12);   // border-end-start-radius: 8px 12px;
@include corner-bottom-end(8 12);     // border-end-end-radius: 8px 12px;
@include corner-bottom-left(8 12);    // border-bottom-left-radius: 8px 12px;
@include corner-bottom-right(8 12);   // border-bottom-right-radius: 8px 12px;

@include corner-inline(8, 12);        // border-start-start-radius: 8px;   // border-end-start-radius: 8px;  // border-start-end-radius: 12px;  // border-end-end-radius: 12px;
@include corner-block(8, 12);         // border-start-start-radius: 8px;  // border-start-end-radius: 8px;   // border-end-start-radius: 12px;   // border-end-end-radius: 12px;
@include corner-rounded-full();       // border-radius: 9999px;
@include corner-rounded-circle();     // border-radius: 50%;
```


### Animation
```scss
@include animation(fade-in 1s ease-in-out);// animation: fade-in 1s ease-in-out;
@include animation-ease(blink, 200ms, ease, 0s);// animation: blink 200ms ease 0s;
@include animation-steps(blink, 5, end);// animation-timing-function: steps(5, end);
@include animation-paused();// animation-play-state: paused;
@include animation-running();// animation-play-state: running;

@include animation-name(fade-in);// animation-name: fade-in;
@include animation-duration(1s);// animation-duration: 1s;
@include animation-timing-function(ease-in-out);// animation-timing-function: ease-in-out;
@include animation-delay(0s);// animation-delay: 0s;
@include animation-iteration-count(infinite);// animation-iteration-count: infinite;
@include animation-direction(alternate);// animation-direction: alternate;
@include animation-fill-mode(forwards);// animation-fill-mode: forwards;
@include animation-play-state(running);// animation-play-state: running;

@include keyframes(fade-in) {
  from { opacity: 0; }
  to { opacity: 1; }
}// @keyframes fade-in {  from { opacity: 0; }  to { opacity: 1; }}
``

### Visual
```scss
// -- ---------------------------------------------
// -- Define the theme for the xxx component.
// -- ---------------------------------------------
@mixin xxx-theme() {

    // Propriétés
    // - color
    // - background-color
    // - background-image / size / position / repeat
    // - border-color
    // - border-width
    // - border-style
    // - border-radius
    // - outline-color
    // - box-shadow
    // - text-shadow
    // - caret-color
    // - accent-color

    // Background fine control
    // - background-clip
    // - background-origin

    // Borders (avancés, rarement utilisés)
    // - border-image-source
    // - border-image-slice
    // - border-image-outset
    // - border-image-repeat

    // UA reset
    // - appearance

    @content;
}
```

### Effects
```scss
@include opacity(0.5);                                           // opacity: 0.5;
@include filter(blur(5px) grayscale(50%) brightness(150%));      // filter: blur(5px) grayscale(50%) brightness(150%);
@include backdrop-filter(blur(5px) grayscale(50%) brightness(150%)); // backdrop-filter: blur(5px) grayscale(50%) brightness(150%);
@include mix-blend-mode(multiply);                               // mix-blend-mode: multiply;
@include isolation(isolate);                                     // isolation: isolate;
@include will-change(opacity, filter, backdrop-filter);          // will-change: opacity, filter, backdrop-filter;
@include transform-box(border-box);                              // transform-box: border-box;

@include transform-origin(50% 50%);                              // transform-origin: 50% 50%;
@include transform-style(preserve-3d);                           // transform-style: preserve-3d;
@include perspective(1000px);                                    // perspective: 1000px;
@include perspective-origin(50% 50%);                            // perspective-origin: 50% 50%;
@include backface-visibility(hidden);                            // backface-visibility: hidden;

@include translate(10px, 20px);                                  // translate: 10px 20px;
@include rotate(45deg);                                          // rotate: 45deg;
@include scale(1.5, 1.5);                                        // scale: 1.5 1.5;
```


### Overflow

```scss
@include overflow(hidden);                 // overflow: hidden;
@include overflow(scroll);                 // overflow: scroll;
@include overflow(auto);                   // overflow: auto;
@include overflow(visible);                // overflow: visible;
@include overflow(clip);                   // overflow: clip;

@include overflow-x(hidden);               // overflow-x: hidden;
@include overflow-x(scroll);               // overflow-x: scroll;
@include overflow-x(auto);                 // overflow-x: auto;
@include overflow-x(visible);              // overflow-x: visible;
@include overflow-x(clip);                 // overflow-x: clip;

@include overflow-y(hidden);               // overflow-y: hidden;
@include overflow-y(scroll);               // overflow-y: scroll;
@include overflow-y(auto);                 // overflow-y: auto;
@include overflow-y(visible);              // overflow-y: visible;
@include overflow-y(clip);                 // overflow-y: clip;

@include overflow-visible();               // overflow: visible;
@include overflow-hidden();                // overflow: hidden;
@include overflow-clip();                  // overflow: clip;
@include overflow-scroll();                // overflow: scroll;
@include overflow-auto();                  // overflow: auto;

@include overflow-inline(visible);         // overflow-inline: visible;
@include overflow-inline(hidden);          // overflow-inline: hidden;
@include overflow-inline(auto);            // overflow-inline: auto;

@include overflow-block(visible);          // overflow-block: visible;
@include overflow-block(hidden);           // overflow-block: hidden;
@include overflow-block(auto);             // overflow-block: auto;

@include overflow-scrollbars-hide();       // scrollbar-width: none; -ms-overflow-style: none; &::-webkit-scrollbar { display: none; }
@include overflow-smooth-scroll();         // scroll-behavior: smooth;
@include overflow-contain();               // overscroll-behavior: contain;
@include overflow-touch();                 // -webkit-overflow-scrolling: touch;

@include visibility(visible);              // visibility: visible;
@include visibility(hidden);               // visibility: hidden;
@include visibility(collapse);             // visibility: collapse;
@include visibility-visible();             // visibility: visible;
@include visibility-hidden();              // visibility: hidden;
@include visibility-collapse();            // visibility: collapse;
```


















### Grid - Exemples contextuels

#### 1. Layout principal (Header, Sidebar, Content, Footer)

```scss
.app-layout {
    @include display-grid();
    @include grid-template-columns(250px 1fr);
    @include grid-template-rows(auto 1fr auto);
    @include grid-template-areas(
        "header header"
        "sidebar content"
        "footer footer"
    );
    @include height-viewport(100);
    @include gap(0);

    .header {
        @include grid-area(header);
    }

    .sidebar {
        @include grid-area(sidebar);
    }

    .content {
        @include grid-area(content);
    }

    .footer {
        @include grid-area(footer);
    }
}
```

#### 2. Galerie d'images responsive (auto-fit)

```scss
.image-gallery {
    @include display-grid();
    @include grid-template-columns(repeat(auto-fit, minmax(200px, 1fr)));
    @include gap(16px);
    @include padding(20px);

    .gallery-item {
        @include square(100%);
        @include border-radius(8px);
        overflow: hidden;
    }
}
```

#### 3. Dashboard avec widgets de tailles variées

```scss
.dashboard {
    @include display-grid();
    @include grid-template-columns(repeat(12, 1fr));
    @include grid-auto-rows(100px);
    @include gap(20px);

    .widget-large {
        @include grid-column("span 8");
        @include grid-row("span 2");
    }

    .widget-medium {
        @include grid-column("span 4");
        @include grid-row("span 2");
    }

    .widget-small {
        @include grid-column("span 3");
        @include grid-row("span 1");
    }
}
```

#### 4. Form layout avec labels alignés

```scss
.form-grid {
    @include display-grid();
    @include grid-template-columns(150px 1fr);
    @include row-gap(16px);
    @include column-gap(24px);
    @include grid-place-items(start stretch);

    label {
        @include justify-self(end);
        @include align-self(center);
        font-weight: 600;
    }

    input,
    textarea,
    select {
        @include width-full();
    }

    .form-actions {
        @include grid-column("2 / 3");
        @include justify-self(start);
        @include gap(12px);
    }
}
```







### States example 

```scss 

// 1) Simple : une propriété
.button {
  @include color-states((
    base: var(--btn-fg),
    hover: var(--btn-fg-hover),
    disabled: (var(--btn-fg-disabled), true) // important par état
  ), (
    selector: '&', // par défaut
  ));
}

// 2) Template avec position STATE au milieu (liens dans un nav)
.nav-item {
  // '&:STATE > a' deviendra '& > a' (base) ou '&:hover > a' (hover), etc.
  @include states('color', (
    base: var(--nav),
    hover: var(--nav-hover),
    focus-visible: var(--nav-focus)
  ), (
    selector: '&:STATE > a'
  ));
}

// 3) Plusieurs propriétés d’un coup
.card {
  @include states-decls((
    color: (
      base: var(--card-fg),
      hover: var(--card-fg-hover)
    ),
    'background-color': (
      base: var(--card-bg),
      focus-within: var(--card-bg-focus)
    ),
    'border-color': (
      base: var(--card-bd),
      hover: (var(--card-bd-hover), true) // important pour hover seulement
    )
  ), (selector: '&'));
}

// 4) Wrapper media (forced-colors + dark)
.tag {
  @include states('border-color', (
    base: var(--bd),
    hover: var(--bd-hover)
  ), (
    selector: '&',
    forced-colors: true,
    scheme: dark
  ));
}
``` 

