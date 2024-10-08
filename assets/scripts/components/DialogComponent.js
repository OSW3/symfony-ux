// ************************************************************************** //
// *
// *    Components: Dialog
// *
// ************************************************************************** //
"use strict";

import { getPrefix } from "../utils/prefix";
import ButtonComponent from "./ButtonComponent";


/** @var string Component classname */
const NAME = 'dialog';

/** @var string Components prefix */
const PREFIX = getPrefix();

/** @var string Component selector */
const SELECTOR = `[rel=js-${PREFIX}${NAME}]`;

/** @var array Allowed actions */
const ACTIONS = ['open','close'];

/** @var string State classname */
const CLASS_OPEN = 'open';


export default class DialogComponent
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
    }

    open()
    {
        this.#node.style.display = 'flex';
        setTimeout(() => this.#node.classList.add(CLASS_OPEN),1);
    }

    close()
    {
        this.#node.style.display = 'none';
        this.#node.classList.remove(CLASS_OPEN);
    }
}

document.querySelectorAll(SELECTOR).forEach(node => new DialogComponent(node));