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
        // this.element = this.#node; //.querySelector(`.${PREFIX}${NAME}-content`);
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

    
    // _onInit() 
    // {
    //     // Retrouve les actions liées au composant
    //     document.querySelectorAll('[data-action]').forEach(btn => {
    //         const target = btn.dataset.target;
    //         const action = btn.dataset.action;

    //         if (target == this.node.id && ACTIONS_HANDLER.includes(action))
    //         {
    //             console.log(btn);
    //             switch (action)
    //             {
    //                 case 'show': new ButtonComponent(btn).onClick = (event, element) => this.show(); break;
    //                 case 'hide': new ButtonComponent(btn).onClick = (event, element) => this.hide(); break;
    //                 case 'toggle': new ButtonComponent(btn).onClick = (event, element) => this.toggle(); break;
    //             }
    //         }
    //     });
    // }
}

document.querySelectorAll(SELECTOR).forEach(node => new NavigationComponent(node));