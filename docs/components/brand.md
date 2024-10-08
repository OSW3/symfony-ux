# Brand

## What is it about ?

Create a responsive brand component.

<!-- {"file": "00-default.html", "language": "twig"} -->

## Component configuration

```yaml
symfony_ux:
    components:
        brand:
            size: medium
            name: My Company
            tagline: My tagline
            logo:
                phone: images/logo-small.png
                tablet: images/logo-medium.png
                desktop: images/logo-large.png
            # route: app_homepage
            url: https://netlab.osw3.net
```

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `size` | `enum` | Set the the size of the component  `small`, `medium`, `large`  | no | `medium` |
| `name` | `string` | Set the company/brand name. also used to ste `alt` attributes | no |  |
| `tagline` | `string` | Set the company/brand tagline | no |  |
| `logo` | `array` | Define a set of images ([`breakpoint`](./../layout/breakpoints.md): `image.png`)| no |  |
| `url` | `string` | Set the URL of the link | no |  |
| `route` | `string` | Set the route of the link (generate url), overload the URL | no |  |

## Twig integration

```twig
<twig:Ux:Brand />
``` 

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `name` | `string` | Set the company/brand name. also used to ste `alt` attributes | no |  |
| `tagline` | `string` | Set the company/brand tagline | no |  |
| `logo` | `array` | Define a set of images ([`breakpoint`](./../layout/breakpoints.md): `image.png`)| no |  |
| `url` | `string` | Set the URL of the link | no |  |
| `route` | `string` | Set the route of the link (generate url), overload the URL | no |  |

## SASS variables

### Layout variables

```scss
$brand--small--font-size: 1.2rem;
$brand--small--tagline-size: .8rem;
$brand--small--tagline-offset: 0px;
$brand--small--font-weight: 600;
$brand--small--img-height: 32px;

$brand--medium--font-size: 1.5rem;
$brand--medium--tagline-size: 1rem;
$brand--medium--tagline-offset: 0px;
$brand--medium--font-weight: 700;
$brand--medium--img-height: 42px;

$brand--large--font-size: 2rem;
$brand--large--tagline-size: 1.2rem;
$brand--large--tagline-offset: 0px;
$brand--large--font-weight: 900;
$brand--large--img-height: 56px;
```

### Theme variables

#### Single theme or default theme values

If your application has only one theme, you can set the values ​​of it in the SCSS variables.
These variables will also be used to set default values ​​if your application has multiple themes.

```scss
$brand--text-color: #6c757d;
$brand--text-color--hover: #111111;
```

#### Multiple themes

If your application has multiple themes, you need to set the component's theme properties in the theme property list.

Learn more about [creating a theme](./../layout/themes.md).

```scss
$properties: map-merge($properties, (
    brand--text-color: #6c757d,
    brand--text-color--hover: #111111,
));
```