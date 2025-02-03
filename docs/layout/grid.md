# Grid



## What is it about ?

The Grid Processor allows you to manage the Grid, Columns, Grid Alignment and Column Spacing/Gutters.



## Integration

<!-- tabs:start -->
### **SCSS**

Import the builder

```css 
@use './<path-to-vendor>/osw3/symfony-ux/assets/sass/builders/grid';
```
<!-- tabs:end -->



## Configuration

> Don't forget to run the command `php bin/console ux:build` to apply changes.

<!-- tabs:start -->
### **Grid**

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `divisions` | `integer` | Set the number of columns of the grid | no | 12 |
| `columns` | `boolean` | If `true`, classes `grid-columns-xx` will added | no | true |
| `container` | `boolean` | If `true`, classes `grid-content-xx` (alignment) will added | no | true |

```yaml
symfony_ux:
    layout:
        grid:
            divisions: 12
            columns: true
            alignments: true
```

### **Columns**

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `sizes` | `boolean` | Set the number of columns of the grid | no | 12 |
| `offset` | `boolean` | If `true`, classes `grid-columns-xx` will added | no | true |
| `shift` | `boolean` | If `true`, classes `grid-content-xx` (alignment) will added | no | true |

```yaml
symfony_ux:
    layout:
        columns:
            sizes: true
            offset: true
            shift: true
```

### **Useless breakpoints**

<!-- tabs:end -->
