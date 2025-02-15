// ************************************************************************** //
// *
// *    Components: Alert
// *
// ************************************************************************** //
"use strict";

import { getCssClass } from "../utils/CssClassMap";
import Animate from "../utils/Animate";
import { getPrefix } from "../utils/generated";
import ButtonComponent from "./ButtonComponent";


/** @var string Component classname */
const NAME = 'alert';

/** @var string Components prefix */
const PREFIX = getPrefix();

const CLASS_ALERT = getCssClass(`${PREFIX}${NAME}`);
const CLASS_BTN_CLOSE = getCssClass(`${PREFIX}button-close`);

/** @var string Component selector */
const SELECTOR = `.${CLASS_ALERT}[data-dismissible]`;

export default class AlertComponent
{
    #node;
    #button;

    constructor(node)
    {
        this.#node = node;

        // Close button
        // --

        this.#button = this.#node.querySelector(`.${CLASS_BTN_CLOSE}`);

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

        if (this.#node.dataset.duration)
        {
            new Animate(
                this.#node, 
                this.#node.dataset.duration
            ).fadeOut(() => this.#close());
            // new Animate(
            //     this.#node, 
            //     this.#node.dataset.duration
            // ).reduce(() => this.#close());
        }        
    }
    
    #close()
    {
        this.#node.remove();
    }
}

document.querySelectorAll(SELECTOR).forEach(node => new AlertComponent(node));