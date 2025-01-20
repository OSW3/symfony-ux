// ************************************************************************** //
// *
// *    Components: Stepper
// *
// ************************************************************************** //
// *
// *    <div rel="js-stepper">
// *
// ************************************************************************** //

import AbstractComponent from "../abstracts/AbstractComponent";

const SELECTOR          = '[rel=js-stepper]';
const CLASS_NAME_ACTIVE = 'active';

export default class StepperComponent extends Component
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