// ************************************************************************** //
// *
// *    Components: Calendar
// *
// ************************************************************************** //
// *
// *    <div rel="js-calendar">
// *
// ************************************************************************** //

import AbstractComponent from "../abstracts/AbstractComponent";

const SELECTOR          = '[rel=js-calendar]';
const CLASS_NAME_ACTIVE = 'active';

export default class CalendarComponent extends Component
{
    constructor(node)
    {
        super(node);
    }

    _onInit() 
    {
    }

    next()
    {
    }

    prev()
    {
    }

    to()
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
}

document.querySelectorAll(SELECTOR).forEach(node => new CalendarComponent(node));