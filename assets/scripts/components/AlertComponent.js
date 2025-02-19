"use strict";

import Animate from "../utils/Animate";
import ButtonComponent from "./ButtonComponent";
import { getPrefix } from "../utils/generated";
import { getCssClass } from "../utils/CssClassMap";

export default class AlertComponent 
{
    /**
     * Component Classname
     * 
     * @type {string}
     */
    static name = "alert";

    /**
     * Component prefix
     * 
     * @type {string}
     */
    static prefix = getPrefix();

    /**
     * Class List
     * 
     * @type {object}
     */
    static classList = {
        main    : getCssClass(`${this.prefix}${this.name}`),
        btnClose: getCssClass(`${this.prefix}button-close`),
    };

    /**
     * Component selector
     * 
     * @type {string}
     */
    static selector = `.${this.classList.main}[data-dismissible]`;

    /**
     * Main component node
     * 
     * @type {HTMLElement}
     */
    #node;

    constructor(node) {
        this.#node = node;
        this.#initCloseButton();
        this.#handleAutoClose();      
    }
    
    #initCloseButton() {
        const btn = this.#node.querySelector(`.${this.constructor.classList.btnClose}`);

        new ButtonComponent(btn).onClick = () => {
            new Animate(
                this.#node
            ).fadeOut(() => this.#close());
        };
    }

    #handleAutoClose() {
        const delay = this.#node.dataset.delay;
        if (delay) new Animate(this.#node, delay).fadeOut(() => this.#close());
    }

    #close() {
        this.#node.remove();
    }
}

document.querySelectorAll(AlertComponent.selector).forEach(node => new AlertComponent(node));
