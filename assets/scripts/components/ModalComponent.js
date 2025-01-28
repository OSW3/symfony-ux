// ************************************************************************** //
// *
// *    Components: Dialog
// *
// ************************************************************************** //
"use strict";

// todo: make it draggable

import { getPrefix } from "../utils/generated";
import ButtonComponent from "./ButtonComponent";


/** @var string Component classname */
const NAME = 'modal';

/** @var string Components prefix */
const PREFIX = getPrefix();

/** @var string Component selector */
const SELECTOR = `[rel=js-${PREFIX}${NAME}]`;

/** @var array Allowed actions */
const ACTIONS = ['open','close'];

/** @var string State classname */
const CLASS_OPEN = 'open';


export default class ModalComponent 
{
    #node;
    #document;
    
    constructor(node)
    {
        this.#node = node;
        this.#document = document.querySelector('body');

        if (!this.#node.id) {
            return;
        }
        
        document.querySelectorAll(`[data-action][data-target=${this.#node.id}]`).forEach(trigger => {
            new ButtonComponent(trigger).onClick = (event, element) => {
                if (ACTIONS.includes(event.target.dataset.action)) {
                    this[event.target.dataset.action]();
                }
            }
        })
        
        // this.#node.onclick = this.close.bind(this);
        document.addEventListener('click', (event) => {
            if (event.target == this.#node) {
                event.stopImmediatePropagation();
                this.close();
            }
        });

        if (this.#node.classList.contains(CLASS_OPEN)) {
            this.open();
        }
    }

    open(fn)
    {
        this.#node.style.display = 'flex';
        this.#document.classList.add(`${PREFIX}no-scroll`);
        setTimeout(() => this.#node.classList.add(CLASS_OPEN),1);

        if (typeof fn === 'function') (fn)(this.#node);
    }

    close(fn)
    {
        this.#document.classList.remove(`${PREFIX}no-scroll`);
        this.#node.classList.remove(CLASS_OPEN)
        setTimeout(() => this.#node.style.display = 'none', 300);

        if (typeof fn === 'function') (fn)(this.#node);
    }
}

document.querySelectorAll(SELECTOR).forEach(node => new ModalComponent(node));