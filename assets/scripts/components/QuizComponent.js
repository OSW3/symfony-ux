// ************************************************************************** //
// *
// *    Components: Quiz
// *
// ************************************************************************** //
// *
// *    <div rel="js-quiz">
// *
// ************************************************************************** //

import AbstractComponent from "../abstracts/AbstractComponent";

const SELECTOR          = '[rel=js-quiz]';
const CLASS_NAME_ACTIVE = 'active';

export default class QuizComponent extends Component
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