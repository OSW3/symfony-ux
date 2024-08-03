// ***************************** DevBrain Theme ***************************** //
// *
// *    Components: ScrollToTopComponent
// *
// ************************************************************************** //
// *
// *    Import
// *        import ScrollToTopComponent from '../../vendor/devbraincode/devbrain-ui/src/Resources/scripts/ScrollToTopComponent';
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

import AbstractComponent from "./../abstracts/AbstractComponent";

const defaults = {
    topAt   : 0,
    toggleAt: 200,
};

export default class ScrollToTopComponent extends AbstractComponent
{
    _onInit() 
    {
        window.onscroll = x => this.#scroll();
        this.on('click');
    }

    #scroll()
    {
        const toggleAt   = this.node.dataset.toggleAt ?? defaults.toggleAt;
        const toggleShow = document.body.scrollTop > toggleAt || document.documentElement.scrollTop > toggleAt;

        this.node.classList.toggle('show', toggleShow);
    }

    _onClickAlways()
    {
        const topAt = this.node.dataset.topAt ?? defaults.topAt;

        document.body.scrollTop            = topAt;
        document.documentElement.scrollTop = topAt;
    }
}

document.querySelectorAll('[rel=js-ux--scroll-to-top]').forEach(node => new ScrollToTopComponent(node));