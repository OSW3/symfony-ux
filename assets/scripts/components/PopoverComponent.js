// ***************************** DevBrain Theme ***************************** //
// *
// *    Components: Popover
// *
// ************************************************************************** //
// *
// *    <div rel="js-popover">
// *
// ************************************************************************** //

import AbstractComponent from "./AbstractComponent";

const SELECTOR          = '[rel=js-popover]';
const CLASS_NAME_ACTIVE = 'active';

export default class PopoverComponent extends AbstractComponent
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
}

document.querySelectorAll(SELECTOR).forEach(node => new PopoverComponent(node));