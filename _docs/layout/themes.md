# Themes

## Default Theme

The default theme name is `light`.  
This has no effect if you don't use multiple themes on your site.

```yaml 
symfony_ux:
    layout: 
        default_theme: "light"
```

to change the default theme, simply replace the value of 'layout->default_theme' with the name of one of your themes.

> Don't forget to run the command **`php bin/console ux:build`** to apply changes.

## Create Theme

### 1. Theme architecture

Your file structure for a theme might look like this:

```text
<your-sass-directory>/
├── ...
├── themes/
│   └── <theme-name>/
│       ├── abstracts/
│       │   └── _palette.scss
│       ├── layout/
│       │   ├── _header.scss
│       │   └── _footer.scss
│       ├── components/
│       │   ├── _accordion.scss
│       │   ├── _alert.scss
│       │   └── ...
│       └── _main.scss
└── app.scss
```

### 2. Define the theme

In the main theme file, you will define its general properties and import them into your project.

```scss
// themes/light/_main.scss
// ************************************************************************** //
// *
// *    Theme Light
// *
// ************************************************************************** //

// * Define the name of the theme
// * --
// * The name will be used as reference to apply the theme on the site
// *
// * @var string
// * @required
// *
$name: 'light';

// * Properties list
// * --
// * The list of layout and components properties
// *
// * @var list
// * @required
// *
$properties: ();

// * Layout elements
// * --
// * Import properties of layout elements
// *
// * @optional
// *
@import './layout/header';
@import './layout/footer';
// @import './layout/sidebar';

// * Components
// * --
// * Import properties of components
// *
// * @optional
// *
@import './components/accordion';
@import './components/alert';
// ... add other components as you needs, see components list in the doc.

// * Export properties
// * --
// *
// * @required
// *
$themes: () !default;
$themes: map.merge($themes, ($name: $properties));
```

### 3. Define the palette

The palette centralizes the theme colors. You can use CSS variables or HTML colors directly.

```scss 
// themes/light/abstracts/_palette_.scss
// ************************************************************************** //
// *
// *    Theme:      Light
// *    Abstract:   Palette
// *
// ************************************************************************** //

// * =============================================
// *
// *    Primary
// *
// * =============================================

$primary--text-color              : var(--black);
$primary--text-color--hover       : var(--black);
$primary--text-color--active      : var(--black);
$primary--text-color--muted       : var(--black);

$primary--background-color        : #6610f2, //var(--indigo);
$primary--background-color--hover : #6f42c1, //var(--purple);
$primary--background-color--active: #6f42c1, //var(--purple);
$primary--background-color--muted : #6f42c1, //var(--purple);

$primary--border-color            : var(--gray-800);
$primary--border-color--hover     : var(--gray-800);
$primary--border-color--active    : var(--gray-800);
$primary--border-color--muted     : var(--gray-800);


// * =============================================
// *
// *    Secondary
// *
// * =============================================

$secondary--text-color              : var(--white);
$secondary--text-color--hover       : var(--white);
$secondary--text-color--active      : var(--white);
$secondary--text-color--muted       : var(--white);

$secondary--background-color        : var(--yellow);
$secondary--background-color--hover : var(--orange);
$secondary--background-color--active: var(--orange);
$secondary--background-color--muted : var(--orange);

$secondary--border-color            : var(--gray-800);
$secondary--border-color--hover     : var(--gray-800);
$secondary--border-color--active    : var(--gray-800);
$secondary--border-color--muted     : var(--gray-800);
```

### 4. Components & layout elements properties

Here is an example for the Accordion component.  
You can adapt it to other components by following the documentation specific to each.

```scss
// themes/light/components/_accordion.scss
// ************************************************************************** //
// *
// *    Theme:      Light
// *    Component:  Accordion
// *
// ************************************************************************** //

@use './../abstracts/palette';

$properties: map.merge($properties, (
    accordion--item--border-color                 : palette.$primary--border-color,         // You can user Palette definition
    accordion--item--header--text-color           : var(--black),                           // Or CSS variable
    accordion--item--header--background-color     : #6610f2,                                // Or HTML colors    
    
    // Commented properties are not applied.
    // accordion--item-open--header--text-color      : palette.$primary--text-color--active,
    // accordion--item-open--header--background-color: palette.$primary--background-color--active,
));
```

### 4. Import your theme

```scss
// app.scss
@import './themes/light/main';
```
