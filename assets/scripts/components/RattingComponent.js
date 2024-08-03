// ***************************** DevBrain Theme ***************************** //
// *
// *    Components: Ratting
// *
// ************************************************************************** //
// *
// *    <div rel="js-ratting">
// *
// ************************************************************************** //

import AbstractComponent from "./AbstractComponent";

const SELECTOR          = '[rel=js-ratting]';
const CLASS_NAME_ACTIVE = 'active';

export default class RattingComponent extends AbstractComponent
{
    constructor(node)
    {
        super(node);
    }

    _onInit() 
    {
    }

    update()
    {
    }
}

document.querySelectorAll(SELECTOR).forEach(node => new RattingComponent(node));