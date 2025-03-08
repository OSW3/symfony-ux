# Symfony UX

Add many UX Components to your app.

## Getting started
- [Installation](./getting-started/installation.md)
- [Configuration](./getting-started/configuration.md)
- [SASS Integration](./getting-started/sass-integration.md)
- [JavaScript Integration](./getting-started/js-integration.md)
- [Obfuscate CSS](./getting-started/obfuscate-css.md)

## Layout
- [Prefix](./layout/prefix.md)
- [Breakpoints & Containers](./layout/breakpoints.md)
- [Grid & Columns](./layout/grid.md)
- [Colors](./layout/colors.md)
- [Palette & Context](./layout/palette.md)
<!-- - [Themes](./layout/themes.md) -->
<!-- - [Transitions](./layout/transitions.md) -->

## Components
<!-- - [Accordions](./components/accordion.md) -->
- [Alerts](./components/alert.md)
- [Analytics](./components/analytics.md)
- [Announcement](./components/announcement.md)
- [Brand](./components/brand.md)
- [Breadcrumb](./components/breadcrumb.md)
- [Buttons](./components/buttons.md)
- [Copyright](./components/copyright.md)
- [Navbar](./components/navbar.md)

- [Links](./components/link.md)
- [Menus](./components/menu.md)
- [Offcanvas](./components/offcanvas.md)
- [Rating](./components/rating.md)
<!-- - [Rotators](./components/rotator.md) -->
- [Scroll to top](./components/scroll-to-top.md)
- [Tickers](./components/ticker.md)

## Forms
  - [Widget](./forms/widgets.md)

<br>

## How UX Components works ?

The UX Components bundle contains many default settings for layout and components.

Each of the parameters can be overloaded in 2 ways:
- overloaded by the symfony_ux.yaml configuration file
- overloaded by SCSS variable definition

> **!!! Higher priority is given to SCSS variables !!!**

This means that UX component bundle variables can be overridden by parameter definition in symfony_ux.yaml file and parameter definition in symfony_ux.yaml file can be overridden by SCSS variables.