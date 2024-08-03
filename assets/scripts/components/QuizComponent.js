// ***************************** DevBrain Theme ***************************** //
// *
// *    Components: Quiz
// *
// ************************************************************************** //
// *
// *    <div rel="js-quiz">
// *
// ************************************************************************** //

import AbstractComponent from "./AbstractComponent";

const SELECTOR          = '[rel=js-quiz]';
const CLASS_NAME_ACTIVE = 'active';

export default class QuizComponent extends AbstractComponent
{
    constructor(node)
    {
        super(node);
    }

    _onInit() 
    {
    }

    start()
    {
    }

    next()
    {
    }

    prev()
    {
    }
}

document.querySelectorAll(SELECTOR).forEach(node => new QuizComponent(node));