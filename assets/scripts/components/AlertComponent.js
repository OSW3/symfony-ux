// ***************************** DevBrain Theme ***************************** //
// *
// *    Components: Alert
// *
// ************************************************************************** //
// *
// *    <div rel="js-alert">
// *
// ************************************************************************** //

import AbstractComponent from "./AbstractComponent";
import ButtonComponent from "./ButtonComponent";

const SELECTOR          = '[rel=js-alert]';
const CLASS_NAME_ACTIVE = 'active';

export default class AlertComponent extends AbstractComponent
{
    constructor(node)
    {
        super(node);
        this.element = node;
    }

    _onInit() 
    {
        const btn = this.node.querySelector('[data-dismiss=alert]');
        new ButtonComponent(btn).onClick = (event, element) => this.close();
    }

    close()
    {
        this.node.remove();
    }
}

document.querySelectorAll(SELECTOR).forEach(node => new AlertComponent(node));