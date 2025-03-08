"use strict";

import ButtonComponent from "./ButtonComponent";
import { getPrefix } from "../utils/generated";
import { getCssClass } from "../utils/CssClassMap";


export default class NavbarComponent
{
    /**
     * Component Classname
     * 
     * @type {string}
     */
    static name = "navbar";
    
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
     * Component selector
     * 
     * @type {string}
     */
    static selector = `[rel=js-${this.prefix}${this.name}]`;

    /**
     * Class List
     * 
     * @type {object}
     */
    static classList = {
        open: getCssClass('open'),
    };

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

        this.#node.querySelectorAll(`[data-action][data-target=${this.#node.id}-nav]`).forEach(trigger => {            
            new ButtonComponent(trigger).onClick = (event, element) => {
                if (this.constructor.actions.includes(trigger.dataset.action)) {
                    this[trigger.dataset.action]();
                }
            }
        })

        // Click outside the offcanvas
        document.addEventListener('click', event => {            
            if (event.target == document.querySelector(`#${this.#node.id}-nav`)) {
                this.close();
                event.stopImmediatePropagation();
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
        // if (this.#node.classList.contains(this.constructor.classList.open)) {
        //     this.open();
        // }
    }

    open() {
        // this.#node.style.display = 'block';
        this.#node.querySelector(`#${this.#node.id}-nav`).style.display = 'block';
        
        // this.#body.classList.add(`${this.constructor.prefix}no-scroll`);
        setTimeout(() => this.#node.classList.add(this.constructor.classList.open),1);
    }
    close() {
        const element = this.#node.querySelector(`#${this.#node.id}-nav`);
        const timeInSeconds = getComputedStyle(element).transitionDuration;
        const timeInMs = parseFloat(timeInSeconds) * 1000;
        
        // this.#body.classList.remove(`${this.constructor.prefix}no-scroll`);
        document.querySelectorAll(`${this.constructor.selector}.${this.constructor.classList.open}`).forEach(node => {
            node.classList.remove(this.constructor.classList.open)
            setTimeout(() => node.querySelector(`#${node.id}-nav`).style.removeProperty('display'), timeInMs);
        });
    }
    toggle() {
        !this.#node.classList.contains(this.constructor.classList.open) ? this.open() : this.close();
    }

}

document.querySelectorAll(NavbarComponent.selector).forEach(node => new NavbarComponent(node));
