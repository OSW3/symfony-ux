# Accordions

- [What is it about ?](#what-is-it-about-)
- [Component configuration](#component-configuration)
- [Twig integration](#twig-integration)
- [SASS variables](#sass-variables)
    - [Layout variables](#layout-variables)
    - [Theme variables](#theme-variables)

## What is it about ?

Create vertically collapsing accordions.

## Component configuration

```yaml
ux:
    components:
        accordions:
            multiple: false
            header: 
                tag: h2
            content:
                max_height: 200
```

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `multiple` | `bool` | Set whether Accordions can open multiple items in same time. | no | `false` |
| `header` | `array` | Set options for items header. | no |  |
| `content` | `array` | Set options for items content. | no |  |

### `header` properties

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `tag` | `string` | Set the tag type of items header. | no | `h2` |

### `content` properties

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `max_height` | `null|int` | Set the max height of items content. | no | `null` |

## Twig integration

```twig
{% set items = [
    {
        title : "Nav item 1",
        content : "This is an item content"
    },
    {
        title : "Nav item 2",
        template : "components/accordion/demo/item.html.twig",
        content : "This is an item content",
        open: true
    }
] %}
<twig:Accordion :items="items" />
``` 

### Accordion attributes

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `id` | `string` | Set the accordion `id` attribute. | no |  |
| `class` | `string` | Set custom classname. | no |  |
| `dataset` | `array` | Set list of `data` attributes; | no |  |
| `items` | `array` | Set accordion items list. | yes |  |
| `multiple` | `bool` | Set whether Accordion can open multiple items in same time. | no | `false` |
| `headerTag` | `string` | Set the tag type for items header. | no | `h2` |

### Accordion items properties

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `title` | `string` | Set the title of the item. | yes |  |
| `content` | `string` | Set the content of the item. | no |  |
| `template` | `string` | Set the template of the content of the item. | no |  |
| `open` | `bool` | Set whether the item is open or not. | no | `false` |

## SASS variables

### Layout variables

```scss
$accordion--border-radius: 'small';
$accordion--item--gap: -1px;
$accordion--item--transition-speed: 'normal';
$accordion--item--header--font-size: 1.2rem;
$accordion--item--header--padding-x: 1rem;
$accordion--item--header--padding-y: 1rem;
$accordion--item--content--max-height: null;
$accordion--item--content--padding-x: 1rem;
$accordion--item--content--padding-y: 1rem;
```

### Theme variables

#### Single theme or default theme values

If your application has only one theme, you can set the values ​​of it in the SCSS variables.
These variables will also be used to set default values ​​if your application has multiple themes.

```scss
$accordion--item--border-color: #adb5bd;
$accordion--item--header--text-color: #495057;
$accordion--item--header--background-color: #e9ecef;
$accordion--item-open--header--text-color: #212529;
$accordion--item-open--header--background-color: #ced4da;
```

#### Multiple themes

If your application has multiple themes, you need to set the component's theme properties in the theme property list.

Learn more about [creating a theme](./../layout/themes.md).

```scss
$properties: map-merge($properties, (
    accordion--item--border-color: #adb5bd,
    accordion--item--header--text-color: #495057,
    accordion--item--header--background-color: #e9ecef,
    accordion--item-open--header--text-color: #212529,
    accordion--item-open--header--background-color: #ced4da,
));
```