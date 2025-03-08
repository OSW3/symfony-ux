"use strict";

import ButtonComponent from "./ButtonComponent";
import { getPrefix } from "../utils/generated";
import { getCssClass } from "../utils/CssClassMap";


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
        // open: 'lb6-mK', //getCssClass('open'),
        open: getCssClass('open'),
        noScroll: getCssClass(`${this.prefix}no-scroll`),
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
    
    constructor(node) {
        this.#node = node;
        this.#body = document.querySelector('body');
        

        console.log(this.constructor.classList);
        
        if (!this.#node.id) return;

        document.querySelectorAll(`[data-action][data-target=${this.#node.id}]`).forEach(trigger => {
            new ButtonComponent(trigger).onClick = (event, element) => {
                if (this.constructor.actions.includes(trigger.dataset.action)) {
                    this[trigger.dataset.action]();
                }
            }
        })

        // Click outside the offcanvas
        document.addEventListener('click', event => {
            if (event.target == this.#node) {
                event.stopImmediatePropagation();
                this.close();
            }
        });
        
        // Press escape key
        document.addEventListener('keydown', event => {
            if (event.key === "Escape" || event.key === "Esc") {                
                event.preventDefault();
                event.stopImmediatePropagation();
                this.close();
            }
        });
        
        // Open on load
        if (this.#node.classList.contains(this.constructor.classList.open)) {
            this.open();
        }
    }

    open() {
        this.#node.style.display = 'block';
        this.#body.classList.add(this.constructor.classList.noScroll);
        setTimeout(() => this.#node.classList.add(this.constructor.classList.open),1);
    }
    close() {
        this.#body.classList.remove(this.constructor.classList.noScroll);
        document.querySelectorAll(`${this.constructor.selector}.${this.constructor.classList.open}`).forEach(node => {
            node.classList.remove(this.constructor.classList.open)
            setTimeout(() => node.style.display = 'none', 300);
        });
    }
    toggle() {
        !this.#node.classList.contains(this.constructor.classList.open) ? this.open() : this.close();
    }
}

document.querySelectorAll(OffcanvasComponent.selector).forEach(node => new OffcanvasComponent(node));
