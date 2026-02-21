# builder

## Structure
```scss
// -- ---------------------------------------------
// -- Define the structure of the xxx component.
// -- ---------------------------------------------
@mixin xxx-structure() {

    // Display & positioning
    // 
    // - display
    // - position
    // - top / right / bottom / left
    // - z-index

        // Box model
        // "mixins/structure/_box-model.scss"
        // 
        // - width
        // - min-width
        // - max-width
        // - height
        // - min-height
        // - max-height
        // - box-sizing

        // Overflow & visibility
        // 
        // - overflow
        // - overflow-x
        // - overflow-y
        // - visibility

    // Rendering & performance (optionnel / avancé)
    // 
    // - contain
    // - content-visibility

    // Scroll containers (optionnel / avancé)
    // 
    // - scrollbar-gutter
    // - overscroll-behavior


    @content;
}
```

## Layout
```scss
// -- ---------------------------------------------
// -- Define the layout of the xxx component.
// -- ---------------------------------------------
@mixin xxx-layout() {

    // Flexbox
    // - flex
    // - flex-direction
    // - flex-wrap
    // - flex-grow
    // - flex-shrink
    // - flex-basis
    // - justify-content
    // - align-items
    // - align-content
    // - gap
    // - row-gap
    // - column-gap

    // Grid
    // - display: grid
    // - grid-template-columns
    // - grid-template-rows
    // - grid-template-areas
    // - grid-auto-flow
    // - grid-auto-columns
    // - grid-auto-rows
    // - place-items
    // - place-content

    // Flex item (children)
    // - order
    // - align-self

    // Grid item (children)
    // - grid-column
    // - grid-row
    // - place-self

@content;
}
```

## Typography
```scss
    // -- ---------------------------------------------
    // -- Define the typography of the xxx component.
    // -- ---------------------------------------------
    @mixin xxx-typography() {

    // Font
    // - font-family
    // - font-size
    // - font-weight
    // - font-style
    // - font-stretch
    // - font-variant

    // Line & spacing
    // - line-height
    // - letter-spacing
    // - word-spacing

    // Text behavior
    // - text-align
    // - text-transform
    // - text-decoration
    // - text-indent
    // - white-space
    // - word-break
    // - overflow-wrap
    // - hyphens

    // Text decoration & fine control
    // - text-decoration-color
    // - text-decoration-thickness
    // - text-underline-offset
    // - text-underline-position
    // - tab-size
    // - text-wrap
    // - text-size-adjust
    // - quotes

    @content;
}
```

## Spacing
```scss
// -- ---------------------------------------------
// -- Define the spacing of the xxx component.
// -- ---------------------------------------------
@mixin xxx-spacing() {

    // Propriétés
    // - padding
    // - padding-top / right / bottom / left
    // - margin
    // - margin-top / right / bottom / left

@content;
}
```

## Interactions
```scss
    // -- ---------------------------------------------
    // -- Define the interactions for the xxx component.
    // -- ---------------------------------------------
    @mixin xxx-interactions() {

    // Propriétés
    // - cursor
    // - user-select
    // - pointer-events
    // - touch-action
    // - outline
    // - outline-offset

    @content;
}
```

## State
```scss
// -- ---------------------------------------------
// -- Define the state styles for the xxx component.
// -- ---------------------------------------------
@mixin xxx-state() {

    // États
    // - :hover
    // - :active
    // - :focus
    // - :focus-visible
    // - :focus-within
    // - :disabled

@content;
}
```

## Transition
```scss
    // -- ---------------------------------------------
    // -- Define the transition effects for the xxx component.
    // -- ---------------------------------------------
    @mixin xxx-transition() {

        // Propriétés
        // - transition
        // - transition-property
        // - transition-duration
        // - transition-delay
        // - transition-timing-function

        @content;
    }
```

## Animation
```scss
    // -- ---------------------------------------------
    // -- Define the animation effects for the xxx component.
    // -- ---------------------------------------------
    @mixin xxx-animation() {

    // Propriétés
    // - animation
    // - animation-name
    // - animation-duration
    // - animation-delay
    // - animation-timing-function
    // - animation-iteration-count
    // - animation-direction
    // - animation-fill-mode
    // - animation-play-state
    // - @keyframes

    @content;
}
```

## Theme
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

## Effects
```scss
    // -- ---------------------------------------------
    // -- Define the effects for the xxx component.
    // -- ---------------------------------------------
    @mixin xxx-effects() {

    // Propriétés
    // - opacity
    // - filter
    // - backdrop-filter
    // - mix-blend-mode
    // - isolation

    // Transform & 3D
    // - transform
    // - transform-origin
    // - transform-style
    // - perspective
    // - perspective-origin
    // - backface-visibility
    // (ou propriétés individuelles modernes: translate / rotate / scale)

    @content;
}