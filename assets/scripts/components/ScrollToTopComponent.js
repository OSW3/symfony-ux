// ************************************************************************** //
// *
// *    Components: ScrollToTopComponent
// *
// ************************************************************************** //
// *
// *    Import
// *        import ScrollToTopComponent from './../../../bundle/assets/scripts/components/ScrollToTopComponent';
// *
// *    Instance
// *        new ScrollToTopComponent( document.querySelector('.my-custom-component') );
// *
// *    Events
// *        onClick(event, element)
// *        onBeforeClick(event, element)
// *        onAfterClick(event, element)
// *
// *    Methods
// *        isActive()
// *
// ************************************************************************** //
"use strict";

import AbstractComponent from './../abstracts/AbstractComponent';
import { getPrefix } from "../utils/prefix";

/** @var string Component classname */
const NAME = 'scroll-to-top';

/** @var string Components prefix */
const PREFIX = getPrefix();

/** @var string Component selector */
const SELECTOR = `[rel=js-${PREFIX}${NAME}]`;


/** @var number Set the "top" position */
const TOP_AT = 0;

/** @var number Trigger point to show/hide the button */
const TOGGLE_AT = 200;

export default class ScrollToTopComponent extends AbstractComponent
{
    _onInit() 
    {
        window.onload = x => this.#scroll();
        window.onscroll = x => this.#scroll();
        this.on('click');
    }

    #scroll()
    {
        const toggleAt   = this.node.dataset.toggleAt ?? TOGGLE_AT;
        const toggleShow = document.body.scrollTop > toggleAt || document.documentElement.scrollTop > toggleAt;

        this.node.classList.toggle('show', toggleShow);
    }

    _onClickAlways()
    {
        const topAt = this.node.dataset.topAt ?? TOP_AT;

        document.body.scrollTop            = topAt;
        document.documentElement.scrollTop = topAt;
    }
}

document.querySelectorAll(SELECTOR).forEach(node => new ScrollToTopComponent(node));