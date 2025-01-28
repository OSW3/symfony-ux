// ************************************************************************** //
// *
// *    Components: Alert
// *
// ************************************************************************** //
"use strict";

import Animate from "../utils/Animate";
import { getPrefix } from "../utils/generated";
import ButtonComponent from "./ButtonComponent";


/** @var string Component classname */
const NAME = 'alert';

/** @var string Components prefix */
const PREFIX = getPrefix();

/** @var string Component selector */
const SELECTOR = `.${PREFIX}${NAME}[data-dismissible]`;


export default class AlertComponent
{
    #node;
    #button;

    constructor(node)
    {
        this.#node = node;

        // Close button
        // --

        this.#button = this.#node.querySelector(`.${PREFIX}button-close`);

        if (this.#button) {
            let button = new ButtonComponent(this.#button);
                button.onClick = (event, element) => {
                    new Animate(
                        this.#node
                    ).fadeOut(() => this.#close());
                };
        }
        
        
        // Auto close delay
        // --

        if (this.#node.dataset.delay)
        {
            new Animate(
                this.#node, 
                this.#node.dataset.delay
            ).fadeOut(() => this.#close());
        }        
    }
    
    #close()
    {
        this.#node.remove();
    }
}

document.querySelectorAll(SELECTOR).forEach(node => new AlertComponent(node));