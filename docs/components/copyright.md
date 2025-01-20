# Copyright

## What is it about ?

Display a copyright, generally on the website footer.

## Integration

```twig
<twig:Component:Copyright />
``` 

## Configuration
<!-- tabs:start -->
### **YAML**

```yaml
symfony_ux:
    components:
        copyright: 
            company: "My Company"
            since: 2009
            symbol: "&copy;"
            dates_separator: "-"
            separator: " • "
```

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `company` | `string` | Set the name of the company. | no |  |
| `since` | `string` | Set the year since the company has been active. | no | current year  |
| `symbol` | `string` | Set the copyright symbol to use. | no | \&copy; |
| `dates_separator` | `string` | Set the separator to use between dates in the display. | no | - |
| `separator` | `string` | Set the separator to use between elements in the display. | no | • |

### **Twig Components**

### Twig configuration

```twig 
<twig:Component:Copyright company="My awesome company" since="2025" />
```

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `id` | `string` | Set the accordion `id` attribute. | no |  |
| `class` | `string` | Set custom classname. | no |  |
| `dataset` | `array` | Set list of `data` attributes; | no |  |
| * `company` | `string` | Set the name of the company. | no |  |
| * `since` | `string` | Set the year since the company has been active. | no | current year  |
| * `symbol` | `string` | Set the copyright symbol to use. | no | \&copy; |
| * `dates_separator` | `string` | Set the separator to use between dates in the display. | no | - |
| * `separator` | `string` | Set the separator to use between elements in the display. | no | • |

Parameters marked with * override the configuration in the `config/package/symfony_ux.yaml` file.

### **SASS**

<!-- tabs:end -->

