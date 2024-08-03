// ***************************** DevBrain Theme ***************************** //
// *
// *    Components: Tabs
// *
// ************************************************************************** //
// *
// *    <div rel="js-tabs">
// *
// ************************************************************************** //

import AbstractComponent from "./AbstractComponent";

const SELECTOR          = '[rel=js-tabs]';
const CLASS_NAME_ACTIVE = 'active';

export default class TabsComponent extends AbstractComponent
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

document.querySelectorAll(SELECTOR).forEach(node => new TabsComponent(node));