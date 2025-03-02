# How to integrate SASS components

## Install Webpack & SASS support

Ensure the `symfony/webpack-encore-bundle` is installed:

```shell
composer require symfony/webpack-encore-bundle
```

and install NPM dependencies:

```shell
npm install
```

Install `sass` and `sass-loader`

```shell
npm install sass-loader@latest sass --save-dev
```

## Add your own SCSS file

Create your own SCSS file in `assets/sass/ui.scss` and this file to the Encore Styles entries 

```js 
Encore
    // ...
    .addStyleEntry('ui', './assets/sass/ui.scss');
    // ...
;
```

## Enable SASS support

In the `webpack.config.js`, uncomment the line

```js
Encore
    // ...
    .enableSassLoader()
    // ...
;
```


## Build CSS files

```shell
npm run watch 
```






Import the `symfony-ux-bundle` to your scss file

```scss
@import '<path-to-your-vendor>/osw3/symfony-ux/dist/sass/symfony-ux-variables';
@import '<path-to-your-vendor>/osw3/symfony-ux/dist/sass/symfony-ux-builders';
@import '<path-to-your-vendor>/osw3/symfony-ux/dist/sass/symfony-ux-components';
```
