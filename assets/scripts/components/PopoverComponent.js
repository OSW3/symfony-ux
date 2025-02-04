// ************************************************************************** //
// *
// *    Components: Popover
// *
// ************************************************************************** //
// *
// *    <div rel="js-popover">
// *
// ************************************************************************** //

import AbstractComponent from "../abstracts/AbstractComponent";

const SELECTOR          = '[rel=js-popover]';
const CLASS_NAME_ACTIVE = 'active';

export default class PopoverComponent extends Component
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