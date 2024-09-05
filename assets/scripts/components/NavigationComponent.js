// ************************************************************************** //
// *
// *    Components: Navigation
// *
// ************************************************************************** //
"use strict";

import { getPrefix } from "../utils/prefix";
import ButtonComponent from "./ButtonComponent";

/** @var string Component classname */
const NAME = 'navigation';

/** @var string Components prefix */
const PREFIX = getPrefix();

/** @var string Component selector */
const SELECTOR = `nav.${PREFIX}${NAME}`;

/** @var array Allowed actions */
const ACTIONS = ['show','hide','toggle'];

/** @var string State classname */
const CLASS_OPEN = 'open';


export default class NavigationComponent
{
    #node;

    constructor(node)
    {
        this.#node = node;

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

    show() 
    {
        this.#node.classList.add(CLASS_OPEN)
    }

    hide() 
    {
        this.#node.classList.remove(CLASS_OPEN)
    }

    toggle() 
    {
        this.#node.classList.toggle(CLASS_OPEN)
    }
}

document.querySelectorAll(SELECTOR).forEach(node => new NavigationComponent(node));