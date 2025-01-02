# How to integrate Symfony UX (SCSS)

## Method 1 - Import all of Symfony UX

This method include **Variables**, **Builder** and **Components**, 

Import the `symfony-ux-bundle` to your scss file

```scss
@import '<path-to-your-vendor>/osw3/symfony-ux/dist/sass/symfony-ux-bundle';
```

## Method 2 - Import Symfony UX groups one by one

Import the `symfony-ux-bundle` to your scss file

```scss
@import '<path-to-your-vendor>/osw3/symfony-ux/dist/sass/symfony-ux-variables';
@import '<path-to-your-vendor>/osw3/symfony-ux/dist/sass/symfony-ux-builders';
@import '<path-to-your-vendor>/osw3/symfony-ux/dist/sass/symfony-ux-components';
```

## Method 3 - Import Symfony UX elements one by one according to your needs

Import the `symfony-ux-bundle` to your scss file.  
See each component's documentation for variable and builder dependencies.

```scss
@import '<path-to-your-vendor>/osw3/symfony-ux/assets/sass/variables/<variable>';
@import '<path-to-your-vendor>/osw3/symfony-ux/assets/sass/factories/<builder>';
@import '<path-to-your-vendor>/osw3/symfony-ux/assets/sass/components/<component>';
```
