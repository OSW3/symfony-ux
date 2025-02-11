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
// const NAME = 'modal';

/** @var string Components prefix */
// const PREFIX = getPrefix();

/** @var string Component selector */
const SELECTOR = `input[data-has-interaction],select[data-has-interaction],textarea[data-has-interaction]`;


export default class FormWidgetComponent 
{
    #input;
    #label;
    #output;
    #description;
    
    constructor(node)
    {
        this.#input            = node;
        this.#label            = document.querySelector(`label[for=${this.#input.id}]`);
        this.#output           = document.querySelector(`output[for=${this.#input.id}]`);
        this.#description      = document.querySelector(`#${this.#input.getAttribute('aria-describedby')}`);

        this.#input.onblur     = this.#onBlur.bind(this);
        // this.#input.onload   = this.#onChange.bind(this);
        this.#input.oninput   = this.#onChange.bind(this);
        this.#input.onclick    = this.#onClick.bind(this);
        this.#input.onkeyup    = this.#onKeyup.bind(this);
        this.#input.onkeypress = this.#onKeypress.bind(this);
        this.#input.onfocus    = this.#onFocus.bind(this);

        this.#writeOutputValue();
    }

    get label()
    {
        return document.querySelector(`label[for=${this.#input.id}]`)?.textContent;
    }
    get hasLabel()
    {
        return !!this.label;
    }

    get hasDescription()
    {
        return !!document.querySelector(`#${this.#input.getAttribute('aria-describedby')}`);
    }
    
    #writeOutputValue() {
        if (this.#output) {
            this.#output.textContent = this.#input?.value;
        }
    }

    #onBlur(event)
    {
        // console.log(`Blur: ${this.#input.id}`);
        // console.log(`Blur: ${event.target.id}`);
    }

    #onChange(event)
    {
        // console.log(`Change: ${this.#input.id}`);
        // console.log(`Change: ${event.target.id}`);
        // this.#output.textContent = this.#input.value;
        this.#writeOutputValue();
    }

    #onClick(event)
    {
        // console.log(`Click: ${this.#input.id}`);
        // console.log(`Click: ${event.target.id}`);
    }

    #onKeyup(event)
    {
        // console.log(`Keyup: ${this.#input.id}`);
        // console.log(`Keyup: ${event.target.id}`);
    }

    #onKeypress(event)
    {
        // console.log(`Keypress: ${this.#input.id}`);
        // console.log(`Keypress: ${event.target.id}`);
    }

    #onFocus(event)
    {
        // console.log(`Focus: ${this.#input.id}`);
        // console.log(`Focus: ${event.target.id}`);        
        // console.log( this.hasDescription );
        // console.log( this.hasLabel );
        // console.log( this.label );
    }
}

document.querySelectorAll(SELECTOR).forEach(node => new FormWidgetComponent(node));