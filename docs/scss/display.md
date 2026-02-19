# Display


## `display`
The 'display' mixin is a utility that allows you to set the display property 
of an element with an optional !important flag. 

@param {Display} $value - The display value to set (e.g., block, inline, flex).
@param {Boolean} $important - Whether to add the !important flag (default: false).

```scss
@include display(block);
@include display(inline, true);
```


## `display-block`
The 'display-block' mixin is a utility that allows you to set the display
property to 'block'.

@param {Boolean} $important - Whether to add the !important flag (default: false).

```scss
@include display-block();
@include display-block(true);
```

## `display-inline`
The 'display-inline' mixin is a utility that allows you to set the display
property to 'inline'.

@param {Boolean} $important - Whether to add the !important flag (default: false).

```scss
@include display-inline();
@include display-inline(true);
```

## `display-inline-block`
The 'display-inline-block' mixin is a utility that allows you to set the display
property to 'inline-block'.

@param {Boolean} $important - Whether to add the !important flag (default: false).

```scss
@include display-inline-block();
@include display-inline-block(true);
```

## `display-inline-flex`
The 'display-inline-flex' mixin is a utility that allows you to set the display
property to 'inline flex'.

@param {Boolean} $important - Whether to add the !important flag (default: false).

```scss
@include display-inline-flex();
@include display-inline-flex(true);
```

## `display-none`
The 'display-none' mixin is a utility that allows you to set the display 
property to 'none'.

@param {Boolean} $important - Whether to add the !important flag (default: false).

```scss
@include display-none();
@include display-none(true);
```

## `display-contents`
The 'display-contents' mixin is a utility that allows you to set the display 
property to 'contents'.

@param {Boolean} $important - Whether to add the !important flag (default: false).

```scss
@include display-contents();
@include display-contents(true);
```

## `display-flex`
The 'display-flex' mixin is a utility that allows you to set the display
property to 'flex' or 'inline-flex', with optional support for older browsers.

@param {String} $type - The type of flex display ('flex' or 'inline') (default: 'flex').
@param {Boolean} $important - Whether to add the !important flag (default: false).

```scss
@include display-flex();
@include display-flex('inline', true);
```

## `display-grid`
The 'display-grid' mixin is a utility that allows you to set the display
property to 'grid' or 'inline-grid'.

@param {String} $type - The type of grid display ('grid' or 'inline') (default: 'grid').
@param {Boolean} $important - Whether to add the !important flag (default: false).

```scss
@include display-grid();
@include display-grid('inline', true);
```

## `display-list`
The 'display-list' mixin is a utility that allows you to set the display
property to 'list-item'.

@param {Boolean} $important - Whether to add the !important flag (default: false).

```scss
@include display-list();
@include display-list(true);
```

## `display-table`
The 'display-table' mixin is a utility that allows you to set the display
property to various table display types (e.g., 'table', 'inline-table', '
table-row', 'table-cell').

@param {String} $type - The type of table display ('table', 'inline-table', 'table-row', 'table-cell') (default: 'table').
@param {Boolean} $important - Whether to add the !important flag (default: false).

```scss
@include display-table();
@include display-table('inline-table', true);
```

## `display-ruby`
The 'display-ruby' mixin is a utility that allows you to set the display
property to various ruby display types (e.g., 'ruby', 'inline-ruby', 'ruby-base', 'ruby-text', 'ruby-group').

@param {String} $type - The type of ruby display ('ruby', 'inline-ruby', 'ruby-base', 'ruby-text', 'ruby-group') (default: 'ruby').
@param {Boolean} $important - Whether to add the !important flag (default: false).

```scss
@include display-ruby();
@include display-ruby('inline-ruby', true);
```