// ***************************** DevBrain Theme ***************************** //
// *
// *    Components: Datepicker
// *
// ************************************************************************** //
// *
// *    <div rel="js-datepicker">
// *
// ************************************************************************** //

import AbstractComponent from "./AbstractComponent";

const SELECTOR          = '[rel=js-datepicker]';
const CLASS_NAME_ACTIVE = 'active';

export default class DatePickerComponent extends AbstractComponent
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

document.querySelectorAll(SELECTOR).forEach(node => new DatePickerComponent(node));