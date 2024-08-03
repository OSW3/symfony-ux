// ***************************** DevBrain Theme ***************************** //
// *
// *    Components: Stepper
// *
// ************************************************************************** //
// *
// *    <div rel="js-stepper">
// *
// ************************************************************************** //

import AbstractComponent from "./AbstractComponent";

const SELECTOR          = '[rel=js-stepper]';
const CLASS_NAME_ACTIVE = 'active';

export default class StepperComponent extends AbstractComponent
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

document.querySelectorAll(SELECTOR).forEach(node => new StepperComponent(node));