# Copyright

Display a copyright, generally on the website footer.

## Configuration

```yaml
ux: 
    copyright: 
        company: "My Company"
        since: 2009
        symbol: "&copy;"
        dates_separator: "-"
        separator: " • "
```

- `company` (`string`) : The name of the company.
    - Default : ""
    - Example : "My Company"
- `since` (`integer`|`string`) : The year since the company has been active.
    - Default : current year
    - Example : 2009
- `symbol` (`string`) : The copyright symbol to use.
    - Default : "&copy;"
    - Example : "&copy;"
- `dates_separator` (`string`) : The separator to use between dates in the display.
    - Default : "-"
    - Example : "-"
- `separator` (`string`) : The separator to use between elements in the display.
    - Default : " • "
    - Example : " • "
<br>

## How to use

### Basic usage

```twig 
<twig:Copyright />
```
<br>

### Extra attributes usage

- Add your custom ID.
    ```twig 
    <twig:Copyright id="my-custom-id" />
    ```

- Add your custom class.
    ```twig 
    <twig:Copyright class="my-custom-class" />
    ```

- Add your custom data attributes.
    ```twig 
    {% set my_dataset = {extra: "Extra data value"} %}
    <twig:Copyright :dataset="my_dataset" />
    ```
<br>

### Overriding configuration attributes

```twig 
<twig:Copyright company="My Awesome Company" since="2020" />
```

The replaceable configuration attributes are :

- company
- since
- symbol
- dates_separator
- separator