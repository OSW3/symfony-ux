# Grid

The Grid Processor allows you to manage the Grid, Columns, Grid Alignment and Column Spacing/Gutters.

## Integration

Create your custom scss file  (like `app.scss`) and add:

```scss 
@import './<path-to-vendor>/osw3/symfony-ux/assets/sass/variables/grid';
@import './<path-to-vendor>/osw3/symfony-ux/assets/sass/factories/grid';
```

## The grid

<div class="ux-grid" style="border: 1px solid green;">
    <div class="ux-column" style="border: 1px solid gray;">column</div>
    <div class="ux-column" style="border: 1px solid gray;">column</div>
    <div class="ux-column" style="border: 1px solid gray;">column</div>
</div>

```html
<div class="ux-grid" style="border: 1px solid green;">
    <div class="ux-column" style="border: 1px solid gray;">column</div>
    <div class="ux-column" style="border: 1px solid gray;">column</div>
    <div class="ux-column" style="border: 1px solid gray;">column</div>
</div>
```

<hr>

<div class="ux-grid" style="border: 1px solid green;">
    <div class="ux-column-2" style="border: 1px solid gray;">column-2</div>
    <div class="ux-column-2" style="border: 1px solid gray;">column-2</div>
    <div class="ux-column-2" style="border: 1px solid gray;">column-2</div>
    <div class="ux-column-2" style="border: 1px solid gray;">column-2</div>
    <div class="ux-column-2" style="border: 1px solid gray;">column-2</div>
    <div class="ux-column-2" style="border: 1px solid gray;">column-2</div>
</div>

```html 
<div class="ux-grid">
    <div class="ux-column-2">column-2</div>
    <div class="ux-column-2">column-2</div>
    <div class="ux-column-2">column-2</div>
    <div class="ux-column-2">column-2</div>
    <div class="ux-column-2">column-2</div>
    <div class="ux-column-2">column-2</div>
</div>
```

<hr>

<div class="ux-grid" style="border: 1px solid green;">
    <div class="ux-column-6" style="border: 1px solid gray;">column-6</div>
    <div class="ux-column-3" style="border: 1px solid gray;">column-3</div>
    <div class="ux-column-4" style="border: 1px solid gray;">column-4</div>
    <div class="ux-column-3" style="border: 1px solid gray;">column-3</div>
    <div class="ux-column-3" style="border: 1px solid gray;">column-3</div>
    <div class="ux-column-2" style="border: 1px solid gray;">column-2</div>
</div>

```html 
<div class="ux-grid">
    <div class="ux-column-6">column-6</div>
    <div class="ux-column-3">column-3</div>
    <div class="ux-column-4">column-4</div>
    <div class="ux-column-2">column-2</div>
    <div class="ux-column-2">column-2</div>
    <div class="ux-column-2">column-2</div>
</div>
```

## Grid divisions (number of columns)

### From the `symfony_ux.yaml`configuration file

By default, the grid system is based on 12 divisions.

```yaml 
symfony_ux:
    layout:
        grid_divisions: 12
```

> Don't forget to run the command `php bin/console ux:build` to apply changes.

### From `SCSS` variables

Define your custom grid division before the Symfony UX integration.

```scss 
// Your custom grid divisions
$grid-divisions: 12;

// Import Symfony UX bundle
@import './<path-to-vendor>/osw3/symfony-ux/assets/sass/variables/grid';
@import './<path-to-vendor>/osw3/symfony-ux/assets/sass/factories/grid';
```

## Grid alignments

<div class="ux-grid ux-grid-start" style="border: 1px solid green;">
    <div class="ux-column-2" style="border: 1px solid gray;">column-2</div>
    <div class="ux-column-2" style="border: 1px solid gray;">column-2</div>
    <div class="ux-column-2" style="border: 1px solid gray;">column-2</div>
</div>
<div class="ux-grid ux-grid-center" style="border: 1px solid green;">
    <div class="ux-column-2" style="border: 1px solid gray;">column-2</div>
    <div class="ux-column-2" style="border: 1px solid gray;">column-2</div>
    <div class="ux-column-2" style="border: 1px solid gray;">column-2</div>
</div>
<div class="ux-grid ux-grid-end" style="border: 1px solid green;">
    <div class="ux-column-2" style="border: 1px solid gray;">column-2</div>
    <div class="ux-column-2" style="border: 1px solid gray;">column-2</div>
    <div class="ux-column-2" style="border: 1px solid gray;">column-2</div>
</div>

```html 
<div class="ux-grid ux-grid-start" style="border: 1px solid green;">
    <div class="ux-column-2" style="border: 1px solid gray;">column-2</div>
    <div class="ux-column-2" style="border: 1px solid gray;">column-2</div>
    <div class="ux-column-2" style="border: 1px solid gray;">column-2</div>
</div>
<div class="ux-grid ux-grid-center" style="border: 1px solid green;">
    <div class="ux-column-2" style="border: 1px solid gray;">column-2</div>
    <div class="ux-column-2" style="border: 1px solid gray;">column-2</div>
    <div class="ux-column-2" style="border: 1px solid gray;">column-2</div>
</div>
<div class="ux-grid ux-grid-end" style="border: 1px solid green;">
    <div class="ux-column-2" style="border: 1px solid gray;">column-2</div>
    <div class="ux-column-2" style="border: 1px solid gray;">column-2</div>
    <div class="ux-column-2" style="border: 1px solid gray;">column-2</div>
</div>
```

<br>

## Spaces & Gutters

<div class="ux-grid ux-gap-5" style="border: 1px solid green;">
    <div class="ux-column-2" style="border: 1px solid gray;">column-2</div>
    <div class="ux-column-2" style="border: 1px solid gray;">column-2</div>
    <div class="ux-column-2" style="border: 1px solid gray;">column-2</div>
    <div class="ux-column-2" style="border: 1px solid gray;">column-2</div>
    <div class="ux-column-2" style="border: 1px solid gray;">column-2</div>
    <div class="ux-column-2" style="border: 1px solid gray;">column-2</div>
</div>

```html 
<div class="ux-grid ux-gap-5">
    <div class="ux-column-2">column-2</div>
    <div class="ux-column-2">column-2</div>
    <div class="ux-column-2">column-2</div>
    <div class="ux-column-2">column-2</div>
    <div class="ux-column-2">column-2</div>
    <div class="ux-column-2">column-2</div>
</div>
```
<div class="ux-grid ux-gap-0" style="border: 1px solid green;">
    <div class="ux-column-2" style="border: 1px solid gray;">column-2</div>
    <div class="ux-column-2" style="border: 1px solid gray;">column-2</div>
    <div class="ux-column-2" style="border: 1px solid gray;">column-2</div>
    <div class="ux-column-2" style="border: 1px solid gray;">column-2</div>
    <div class="ux-column-2" style="border: 1px solid gray;">column-2</div>
    <div class="ux-column-2" style="border: 1px solid gray;">column-2</div>
</div>

```html 
<div class="ux-grid ux-gap-0">
    <div class="ux-column-2">column-2</div>
    <div class="ux-column-2">column-2</div>
    <div class="ux-column-2">column-2</div>
    <div class="ux-column-2">column-2</div>
    <div class="ux-column-2">column-2</div>
    <div class="ux-column-2">column-2</div>
</div>
```
