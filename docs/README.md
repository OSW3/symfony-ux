# Symfony UX

Add many UX Components to your app.

## Installation
- [Installation (no comment process)](./install/no-comment.md)
- [Installation (process explained)](./install/explained.md)

## Layout
- [Prefix](./layout/prefix.md)
- [Breakpoints & Containers](./layout/breakpoints.md)
- [Colors](./layout/colors.md)
- [palette & Context](./layout/palette.md)
<!-- - [Grid](./layout/grid.md) -->
<!-- - [Themes](./layout/themes.md) -->
<!-- - [Transitions](./layout/transitions.md) -->

## Components
<!-- - [Accordions](./components/accordion.md) -->
<!-- - [Alerts](./components/alert.md) -->
<!-- - [Analytics](./components/analytics.md) -->
<!-- - [Announcement](./components/analytics.md) -->
  - [Buttons](./components/buttons.md)
<!-- - [Copyright](./components/copyright.md) -->
<!-- - [link](./components/link.md) -->
<!-- - [Rotators](./components/rotator.md) -->
<!-- - [Scroll to top](./components/scroll-to-top.md) -->
<!-- - [Tickers](./components/ticker.md) -->
<br>

## How UX Components works ?

The UX Components bundle contains many default settings for layout and components.

Each of the parameters can be overloaded in 2 ways:
- overloaded by the symfony_ux.yaml configuration file
- overloaded by SCSS variable definition

> **!!! Higher priority is given to SCSS variables !!!**

This means that UX component bundle variables can be overridden by parameter definition in symfony_ux.yaml file and parameter definition in symfony_ux.yaml file can be overridden by SCSS variables.