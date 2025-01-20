// ************************************************************************** //
// *
// *    Components: Tabs
// *
// ************************************************************************** //
// *
// *    <div rel="js-tabs">
// *
// ************************************************************************** //

import AbstractComponent from "../abstracts/AbstractComponent";

const SELECTOR          = '[rel=js-tabs]';
const CLASS_NAME_ACTIVE = 'active';

export default class TabsComponent extends Component
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