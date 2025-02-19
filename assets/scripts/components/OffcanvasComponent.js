"use strict";

import ButtonComponent from "./ButtonComponent";
import { getPrefix } from "../utils/generated";


export default class OffcanvasComponent
{
    /**
     * Component Classname
     * 
     * @type {string}
     */
    static name = "offcanvas";

    /**
     * Component prefix
     * 
     * @type {string}
     */
    static prefix = getPrefix();

    /**
     * Allowed actions
     *
     * @type {string[]}
     */
    static actions = ['open', 'close', 'toggle'];

    /**
     * Class List
     * 
     * @type {object}
     */
    static classList = {
        open: 'open',
    };

    /**
     * Component selector
     * 
     * @type {string}
     */
    static selector = `[rel=js-${this.prefix}${this.name}]`;

    /**
     * Main component node
     * 
     * @type {HTMLElement}
     */
    #node;

    /**
     * Document body element
     *
     * @type {HTMLElement}
     */
    #body;
    
    constructor(node)
    {
        this.#node = node;
        this.#body = document.querySelector('body');
        
        if (!this.#node.id) return;

        document.querySelectorAll(`[data-action][data-target=${this.#node.id}]`).forEach(trigger => {
            new ButtonComponent(trigger).onClick = (event, element) => {
                if (this.constructor.actions.includes(trigger.dataset.action)) {
                    this[trigger.dataset.action]();
                }
            }
        })

        // this.#node.onclick = this.close.bind(this);
        document.addEventListener('click', event => {
            if (event.target == this.#node) {
                event.stopImmediatePropagation();
                this.close();
            }
        });

        document.addEventListener('keydown', event => {
            if (event.key === "Escape" || event.key === "Esc") {
                event.preventDefault();
                event.stopImmediatePropagation();
                this.close();
            }
        });
        

        if (this.#node.classList.contains(this.constructor.classList.open)) {
            this.open();
        }
    }

    open() {
        // this.#node.style.display = 'flex';
        this.#node.style.display = 'block';
        this.#body.classList.add(`${this.constructor.prefix}no-scroll`);
        setTimeout(() => this.#node.classList.add(this.constructor.classList.open),1);
    }
    close() {
        this.#body.classList.remove(`${this.constructor.prefix}no-scroll`);
        this.#node.classList.remove(this.constructor.classList.open)
        setTimeout(() => this.#node.style.display = 'none', 300);
    }
    toggle() {
        !this.#node.classList.contains(this.constructor.classList.open) ? this.open() : this.close();
    }
}

document.querySelectorAll(OffcanvasComponent.selector).forEach(node => new OffcanvasComponent(node));
