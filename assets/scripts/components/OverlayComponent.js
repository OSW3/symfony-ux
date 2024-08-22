// ************************************************************************** //
// *
// *    Components: Overlay
// *
// ************************************************************************** //
"use strict";

import { getPrefix } from "../utils/prefix";


/** @var string Component classname */
const NAME = 'overlay';

/** @var string Components prefix */
const PREFIX = getPrefix();

/** @var string Component selector */
const SELECTOR = `[rel=js-${PREFIX}${NAME}]`;


export default class OverlayComponent 
{
    #node;
    #document;
    #parent;
    #doOnClick;

    constructor(parent)
    {
        this.#parent = parent;
        this.#document = document.querySelector('body');
    }

    onClick(fn)
    {
        this.#doOnClick = fn;
    }

    show() 
    {
        let node = document.querySelector(`${PREFIX}${NAME}`);

        if (!node) {
            node = document.createElement('div');
            node.classList.add(`${PREFIX}${NAME}`);
            
            this.#parent.insertAdjacentElement('afterend', node);

            setTimeout(() => node.classList.add('show'),1);
        }

        node.addEventListener('click', () => {
            if (typeof this.#doOnClick === 'function') (this.#doOnClick)();
        });

        this.#document.classList.add(`${PREFIX}no-scroll`);

        this.#node = node;
    }

    hide() 
    {
        this.#node?.classList.remove('show');
        this.#document?.classList.remove(`${PREFIX}no-scroll`);
        setTimeout(() => this.#node?.remove(),301);
    }

    toggle() 
    {
        !document.querySelector(`${PREFIX}${NAME}`) ? this.show() : this.hide();
    }
}