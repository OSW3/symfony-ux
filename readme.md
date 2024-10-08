# Symfony UX

Add many UX Components to your app.

## Installation
- [Installation (no comment process)](./docs/install/no-comment.md)
- [Installation (process explained)](./docs/install/explained.md)

## Layout
- [Prefix](./docs/layout/prefix.md)
- [Breakpoints & Containers](./docs/layout/breakpoints.md)
- [Colors](./docs/layout/colors.md)
- [palette & Context](./docs/layout/palette.md)
<!-- - [Grid](./docs/layout/grid.md) -->
<!-- - [Themes](./docs/layout/themes.md) -->
<!-- - [Transitions](./docs/layout/transitions.md) -->

## Components
- [Accordions](./docs/components/accordion.md)
- [Alerts](./docs/components/alert.md)
- [Analytics](./docs/components/analytics.md)
- [Announcement](./docs/components/analytics.md)
- [Copyright](./docs/components/copyright.md)
- [link](./docs/components/link.md)
- [Rotators](./docs/components/rotator.md)
- [Scroll to top](./docs/components/scroll-to-top.md)
- [Tickers](./docs/components/ticker.md)
<br>

## How UX Components works ?

The UX Components bundle contains many default settings for layout and components.

Each of the parameters can be overloaded in 2 ways:
- overloaded by the symfony_ux.yaml configuration file
- overloaded by SCSS variable definition

> **!!! Higher priority is given to SCSS variables !!!**

This means that UX component bundle variables can be overridden by parameter definition in symfony_ux.yaml file and parameter definition in symfony_ux.yaml file can be overridden by SCSS variables.