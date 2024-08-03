// ***************************** DevBrain Theme ***************************** //
// *
// *    Components: Searchbar
// *
// ************************************************************************** //
// *
// *    <div rel="js-searchbar">
// *
// ************************************************************************** //

import AbstractComponent from "./AbstractComponent";

const SELECTOR          = '[rel=js-searchbar]';
const CLASS_NAME_ACTIVE = 'active';

export default class SearchbarComponent extends AbstractComponent
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

document.querySelectorAll(SELECTOR).forEach(node => new SearchbarComponent(node));