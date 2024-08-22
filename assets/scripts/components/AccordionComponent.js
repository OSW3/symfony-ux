// ************************************************************************** //
// *
// *    Components: Accordion
// *
// ************************************************************************** //
"use strict";

import { getPrefix } from "../utils/prefix";


/** @var string Component classname */
const NAME = 'accordion';

/** @var string Components prefix */
const PREFIX = getPrefix();

/** @var string Component selector */
const SELECTOR = `[rel=js-${PREFIX}${NAME}]`;


/** @var string Component element classname; Open state */
const CLASS_ACCORDION_OPEN = 'open';

/** @var string Component element classname; Item wrapper */
const CLASS_ACCORDION_ITEM = `${PREFIX}accordion-item`;

/** @var string Component element classname; Item header */
const CLASS_ACCORDION_HEADER = `${PREFIX}accordion-header`;

/** @var string Component element classname; Item content */
const CLASS_ACCORDION_CONTENT = `${PREFIX}accordion-content`;


export default class AccordionComponent
{
    #node;
    #items;
    
    constructor(node)
    {
        this.#node = node;
        this.#items = this.#node.querySelectorAll(`.${CLASS_ACCORDION_ITEM}`);
        
        for(let i=0; i < this.#items.length; i++) {

            const item = this.#items[i];
            const button = this.#items[i].querySelector(`.${CLASS_ACCORDION_HEADER}`);

            if (item.classList.contains(CLASS_ACCORDION_OPEN))
                this.#open(item);

            button?.addEventListener('click', x => {
                x.preventDefault();
                x.stopImmediatePropagation();
                
                let toggle = true;

                if (this.#node.dataset.multiple == undefined){
                    toggle = !item.classList.contains(CLASS_ACCORDION_OPEN);

                    this.#reset();
                }
                
                if (toggle) {
                    this.#toggle(item);
                }
            });
        }
    }

    #reset()
    {
        for(let i=0; i < this.#items.length; i++) {
            this.#close(this.#items[i]);
        }
    }

    #toggle(item)
    {
        item.classList.contains(CLASS_ACCORDION_OPEN)
            ? this.#close(item)
            : this.#open(item)
        ;
    }

    #open(item)
    {
        const content = item.querySelector(`.${CLASS_ACCORDION_CONTENT}`);
        content.style.maxHeight = `${content.scrollHeight}px`;
        item.classList.add(CLASS_ACCORDION_OPEN);
    }

    #close(item)
    {
        const content = item.querySelector(`.${CLASS_ACCORDION_CONTENT}`);
        content.style.maxHeight = null;
        item.classList.remove(CLASS_ACCORDION_OPEN);
    }
}

document.querySelectorAll(SELECTOR).forEach(node => new AccordionComponent(node));