# Breakpoints & Containers



## What is it about ?

Breakpoints are customizable widths that define how your responsive layout behaves across screen or viewport sizes.  
We provide six breakpoints.

| Names | Breakpoint at | Container size |
|-|-|-|
| phone | 576px | 540px |
| tablet | 768px | 720px |
| laptop | 992px | 960px |
| desktop | 1200px | 1140px |
| wide | 1400px | 1440px |
| ultra | 1600px | 1520px |



## Integration

<!-- tabs:start -->
### **SCSS**

Import the builder

```css 
@use './<path-to-vendor>/osw3/symfony-ux/assets/sass/builders/containers';
```
<!-- tabs:end -->



## Configuration

> Don't forget to run the command `php bin/console ux:build` to apply changes.

<!-- tabs:start -->
### **Available breakpoints**

Redefine available breakpoints.

| Parameter | Type | Description | Required |
|-|-|-|-|
| `name` | `string` | Allows you to rename the breakpoint | no |
| `breakpoint` | `integer` | Set breakpoint trigger screen dimensions | no |
| `container` | `integer` | Set container size | no |

```yaml
symfony_ux:
    layout:
        breakpoints:
            base:
                phone:
                    name: phone
                    breakpoint: 576
                    container: 540
                tablet:
                    name: tablet
                    breakpoint: 768
                    container: 720
                laptop:
                    name: laptop
                    breakpoint: 992
                    container: 960
                desktop:
                    name: desktop
                    breakpoint: 1200
                    container: 1140
                wide:
                    name: wide
                    breakpoint: 1200
                    container: 1140
                ultra:
                    name: ultra
                    breakpoint: 1600
                    container: 1520
```

### **Additional breakpoints**

Add your custom breakpoints.

| Parameter | Type | Description | Required |
|-|-|-|-|
| `name` | `string` | The name of the custom breakpoint | yes |
| `breakpoint` | `integer` | Set breakpoint trigger screen dimensions | yes |
| `container` | `integer` | Set container size | yes |

```yaml
symfony_ux:
    layout:
        breakpoints:
            additional:
                { name: my-new-breakpoint, breakpoint: 1600, container: 1520 }
```

### **Useless breakpoints**

Remove useless breakpoints.

```yaml
symfony_ux:
    layout:
        breakpoints:
            useless: [wide, ultra]
```
<!-- tabs:end -->



## Customize SCSS

<!-- tabs:start -->

### **Available breakpoints**

```css 
@use './<path-to-vendor>/osw3/symfony-ux/assets/sass/storages/breakpoints';

@include breakpoints.replace-names((
    'phone'  : 'phone',
    'tablet' : 'tablet',
    'laptop' : 'laptop',
    'desktop': 'desktop',
    'wide'   : 'wide',
    'ultra'  : 'ultra',
));

@include breakpoints.replace-breakpoints-values((
    'phone'  : 576px,
    'tablet' : 768px,
    'laptop' : 992px,
    'desktop': 1200px,
    'wide'   : 1400px,
    'ultra'  : 1600px,
));

@include breakpoints.replace-containers-values((
    'phone'  : 540px,
    'tablet' : 720px,
    'laptop' : 960px,
    'desktop': 1140px,
    'wide'   : 1440px,
    'ultra'  : 1520px,
));
```

### **Additional breakpoints**

```css 
@use './<path-to-vendor>/osw3/symfony-ux/assets/sass/storages/breakpoints';

@include breakpoints.add((
    'my-new-breakpoint': (
        breakpoint: 1800px, 
        container: 1740px
    )
));
```

### **Useless breakpoints**

```css 
@use './<path-to-vendor>/osw3/symfony-ux/assets/sass/storages/breakpoints';

@include breakpoints.remove(('tablet'));
```
<!-- tabs:end -->
