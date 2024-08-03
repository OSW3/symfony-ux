// ***************************** DevBrain Theme ***************************** //
// *
// *    Components: Dialog
// *
// ************************************************************************** //
// *
// *    <div rel="js-dialog">
// *
// ************************************************************************** //

import AbstractComponent from "./AbstractComponent";

const SELECTOR          = '[rel=js-dialog]';
const CLASS_NAME_ACTIVE = 'active';

export default class DialogComponent extends AbstractComponent
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

document.querySelectorAll(SELECTOR).forEach(node => new DialogComponent(node));