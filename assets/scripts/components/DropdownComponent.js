// ***************************** DevBrain Theme ***************************** //
// *
// *    Components: Dropdown
// *
// ************************************************************************** //
// *
// *    <div rel="js-dropdown">
// *
// ************************************************************************** //

import AbstractComponent from "./AbstractComponent";

const SELECTOR          = '[rel=js-dropdown]';
const CLASS_NAME_ACTIVE = 'active';

export default class DropdownComponent extends AbstractComponent
{
    constructor(node)
    {
        super(node);
    }

    _onInit() 
    {
    }

    show()
    {
    }

    hide()
    {
    }

    toggle()
    {
    }

    update()
    {
    }
}

document.querySelectorAll(SELECTOR).forEach(node => new DropdownComponent(node));