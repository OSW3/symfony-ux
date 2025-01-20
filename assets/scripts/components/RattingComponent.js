// ************************************************************************** //
// *
// *    Components: Ratting
// *
// ************************************************************************** //
// *
// *    <div rel="js-ratting">
// *
// ************************************************************************** //

import AbstractComponent from "../abstracts/AbstractComponent";

const SELECTOR          = '[rel=js-ratting]';
const CLASS_NAME_ACTIVE = 'active';

export default class RattingComponent extends Component
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