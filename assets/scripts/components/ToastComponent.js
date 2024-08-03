// ***************************** DevBrain Theme ***************************** //
// *
// *    Components: Toast
// *
// ************************************************************************** //
// *
// *    <div rel="js-toast">
// *
// ************************************************************************** //

import AbstractComponent from "./AbstractComponent";

const SELECTOR          = '[rel=js-toast]';
const CLASS_NAME_ACTIVE = 'active';

export default class ToastComponent extends AbstractComponent
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

    isShown()
    {
    }
}

document.querySelectorAll(SELECTOR).forEach(node => new ToastComponent(node));