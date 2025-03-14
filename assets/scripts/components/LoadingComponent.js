// ************************************************************************** //
// *
// *    Components: Loading
// *
// ************************************************************************** //
// *
// *    <div rel="js-loading">
// *
// ************************************************************************** //

import AbstractComponent from "../abstracts/AbstractComponent";

const SELECTOR          = '[rel=js-loading]';
const CLASS_NAME_ACTIVE = 'active';

export default class LoadingComponent extends Component
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

    update()
    {
    }

    isShown()
    {
    }
}

document.querySelectorAll(SELECTOR).forEach(node => new LoadingComponent(node));