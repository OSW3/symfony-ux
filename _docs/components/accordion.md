# Accordions

## What is it about ?

Accordions are vertically collapsing components that allow you to toggle between showing and hiding content in a compact layout.

<!-- Example -->
<!-- {"file": "00-main.html", "language": "twig"} -->

## Integration

### SASS Integration

To integrate the **accordion** styles into your project, import the necessary SCSS dependencies.

```scss 
// app.scss
@import '<path-to-vendor>/osw3/symfony-ux/assets/sass/components/accordion';
```

### JavaScript Integration

To enable the accordion's JavaScript functionality, import the component in your JS file.  
The javascript component is instantiated automatically

```javascript 
// app.js

// Component integration 
require('<path-to-vendor>/osw3/symfony-ux/assets/scripts/components/AccordionComponent');
// or
import AccordionComponent from '<path-to-vendor>/osw3/symfony-ux/assets/scripts/components/AccordionComponent';
```

### Twig integration

In your Twig templates, you can integrate the accordion component using the following syntax:

```twig
<twig:Ux:Accordion :items="items" />
``` 

<hr>

## Configuration

### Configuration YAML

The YAML configuration allows you to define default parameters for all accordion components.  
These can be overridden on a per-component basis when using the Twig integration.

```yaml
symfony_ux:
    components:
        accordions:
            multiple: false
            header: 
                tag: h2
            content:
                max_height: 200
```

#### `accordions` properties

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `multiple` | `bool` | Allows multiple accordion items to be open simultaneously. | no | `false` |
| `header` | `array` | Configuration options for the accordion item headers. | no |  |
| `content` | `array` | Configuration options for the accordion item content. | no |  |

#### `header` properties

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `tag` | `string` | Defines the HTML tag for accordion headers. | no | `h2` |

#### `content` properties

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `max_height` | `null|int` | Defines the maximum height for content. | no | `null` |

### Configuration Twig

#### `Accordion` attributes

Here’s an example of how to customize an accordion using Twig:

```twig
<twig:Ux:Accordion 
    id="my-custom-id"
    class="my-custom-class"
    :items="[...]" 
    :dataset="{...}"
    multiple {# it same as :multiple="true" #} 
    headerTag="h3"
/>
```

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `id` | `string` | Set the accordion's `id` attribute. | no |  |
| `class` | `string` | Adds a custom CSS class. | no |  |
| `dataset` | `array` | Specifies data-* attributes for the accordion. | no |  |
| `items` | `array` | The list of items to be displayed in the accordion. | yes |  |
| `multiple` | `bool` | Allows multiple accordion items to be opened at once. | no | `false` |
| `headerTag` | `string` | Defines the tag type for the accordion headers. | no | `h2` |

#### `Accordion.items` properties

You can pass an array of items to the accordion in your Twig template as follows:

```twig
{% set items = [
    {
        title : "Accordion item 1",
        content : "This is an item content"
    },
    {
        title : "Accordion item 2",
        template : "components/accordion/demo/item.html.twig"
    },
] %}
``` 

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `title` | `string` | The title for the accordion item. | yes |  |
| `content` | `string` | The content to be displayed within the item. | no |  |
| `template` | `string` | Specifies a template for the accordion content. | no |  |
| `open` | `bool` | Sets whether the item is open by default. | no | `false` |


## SASS variables

### Layout and structure variables

```scss
// customs/accordion.scss

// Layout and structure
$accordion--border-radius            : 'small';
$accordion--item--gap                : -1px;
$accordion--item--transition-speed   : 'normal';
$accordion--item--header--font-size  : 1.2rem;
$accordion--item--header--padding-x  : 1rem;
$accordion--item--header--padding-y  : 1rem;
$accordion--item--content--max-height: null;
$accordion--item--content--padding-x : 1rem;
$accordion--item--content--padding-y : 1rem;

// Theme
// ...

// Component integration 
@import '<path-to-vendor>/osw3/symfony-ux/assets/sass/components/accordion';
```

### Theme variables

#### Single theme or default theme values

If your application has only one theme, you can set the values ​​of it in the SCSS variables.
These variables will also be used to set default values ​​if your application has multiple themes.

```scss
// customs/accordion.scss

// Layout and structure
// ...

// Theme
$accordion--item--border-color                 : #adb5bd;
$accordion--item--header--text-color           : #495057;
$accordion--item--header--background-color     : #e9ecef;
$accordion--item-open--header--text-color      : #212529;
$accordion--item-open--header--background-color: #ced4da;

// Component integration 
@import '<path-to-vendor>/osw3/symfony-ux/assets/sass/components/accordion';
```

#### Multiple themes

If your application has multiple themes, you need to set the component's theme properties in the theme property list.

```scss
// theme/might/components/accordion.scss
$properties: map.merge($properties, (
    accordion--item--border-color                 : #adb5bd,
    accordion--item--header--text-color           : #495057,
    accordion--item--header--background-color     : #e9ecef,
    accordion--item-open--header--text-color      : #212529,
    accordion--item-open--header--background-color: #ced4da,
));
```

*See the themes documentation page*
