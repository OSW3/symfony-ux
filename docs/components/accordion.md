# Accordions

- [What is it about ?](#what-is-it-about-)
- [Component configuration](#component-configuration)
- [Twig integration](#twig-integration)

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