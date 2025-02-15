// ************************************************************************** //
// *
// *    Components: Dialog
// *
// ************************************************************************** //
"use strict";

import { getCssClass } from "../utils/CssClassMap";
import { getPrefix } from "../utils/generated";
import ButtonComponent from "./ButtonComponent";

/** @var string Component classname */
const NAME = 'form-widget';

/** @var string Components prefix */
const PREFIX = getPrefix();

/** @var string form-widget-group-text */
const CLASS_FORM_WIDGET_GROUP = getCssClass(`${PREFIX}${NAME}-group`);

/** @var string Component selector */
// const SELECTOR = `input[data-has-interaction],select[data-has-interaction],textarea[data-has-interaction]`;
const SELECTOR = `[data-${PREFIX}widget-id]`;


export default class FormWidgetComponent 
{
    #widget;
    #id;
    #type;
    #label;
    #controls;

    #output;
    #group;
    #description;
    
    constructor(node)
    {
        const prefix = PREFIX.slice(0,-1);
        this.#widget   = node;
        this.#id       = this.#widget.dataset[`${prefix}WidgetId`];
        this.#type     = this.#widget.dataset[`${prefix}WidgetType`];
        this.#label    = this.#widget.querySelector(`label[for=${this.#id}]`);
        this.#controls = this.#widget.querySelectorAll('input,select,textarea');
        this.#group    = this.#widget.querySelectorAll(`.${CLASS_FORM_WIDGET_GROUP} > :not(input,select,textarea)`);
        this.#output   = this.#widget.querySelector(`output`);


        // Click on groups elements to set focus
        this.#group.forEach(node => node.onclick = this.#setFocus.bind(this));
        
        // Click on output element to set focus
        if (this.#output) {
            this.#output.onclick = this.#setFocus.bind(this);
            this.#getValue(this.#controls[0]);
        }


        this.#controls.forEach(node => node.oninput = event => this.#getValue(event.target));
        


        // console.log(this.#type, this.#controls.length);
        

        // this.#output           = document.querySelector(`output[for=${this.#input.id}]`);
        // this.#description      = document.querySelector(`#${this.#input.getAttribute('aria-describedby')}`);




        // this.#input.onblur     = this.#onBlur.bind(this);
        // // this.#input.onload  = this.#onChange.bind(this);
        // this.#input.oninput    = this.#onChange.bind(this);
        // this.#input.onclick    = this.#onClick.bind(this);
        // this.#input.onkeyup    = this.#onKeyup.bind(this);
        // this.#input.onkeypress = this.#onKeypress.bind(this);
        // this.#input.onfocus    = this.#onFocus.bind(this);

        // this.#writeOutputValue();


    }

    #getValue(node) {
        let value;

        if (['date','tel','time'].indexOf(this.#type) > -1) {
            if (value == undefined) value = {};
            this.#controls.forEach(control => {
                let name = control.name.match(/\[(.*?)\]/)[1];
                value[name]= control.value;
            });
        }
        else {
            value = node.value;
        }

        if (this.#output) {
            this.#output.textContent = value;
        }
    }

    #setFocus() {
        ['color','file'].indexOf(this.#type) > -1
            ? this.#controls[0].click()
            : this.#controls[0].focus()
        ;
    }

}

document.querySelectorAll(SELECTOR).forEach(node => new FormWidgetComponent(node));