"use strict";

import { getPrefix } from "../utils/generated";
import { getCssClass } from "../utils/CssClassMap";


// /** @var string Component classname */
// const NAME = 'accordion';

// /** @var string Components prefix */
// const PREFIX = getPrefix();

// /** @var string Component selector */
// const SELECTOR = `[rel=js-${PREFIX}${NAME}]`;


// /** @var string Component element classname; Open state */
// const CLASS_ACCORDION_OPEN = 'open';

// /** @var string Component element classname; Item wrapper */
// const CLASS_ACCORDION_ITEM = `${PREFIX}accordion-item`;

// /** @var string Component element classname; Item header */
// const CLASS_ACCORDION_HEADER = `${PREFIX}accordion-header`;

// /** @var string Component element classname; Item content */
// const CLASS_ACCORDION_CONTENT = `${PREFIX}accordion-content`;


export default class AccordionComponent
{
    /**
     * Component Classname
     * 
     * @type {string}
     */
    static name = "accordion";
    
    /**
     * Component prefix
     * 
     * @type {string}
     */
    static prefix = getPrefix();
    
    /**
     * Class List
     * 
     * @type {object}
     */
    static classList = {
        item   : getCssClass(`${this.prefix}${this.name}-item`),
        header : getCssClass(`${this.prefix}${this.name}-header`),
        content: getCssClass(`${this.prefix}${this.name}-content`),
        open   : 'open',
    };

    /**
     * Component selector
     * 
     * @type {string}
     */
    static selector = `[rel=js-${this.prefix}${this.name}]`;

    /**
     * Main component node
     * 
     * @type {HTMLElement}
     */
    #node;

    /**
     * Items node
     * 
     * @type {NodeListOf<HTMLElement>}
     */
    #items;
    
    constructor(node)
    {
        this.#node = node;
        this.#items = this.#node.querySelectorAll(`.${this.constructor.classList.item}`);
        
        this.#items.forEach(item => {
            const button = item.querySelector(`.${this.constructor.classList.header}`);

            if (item.classList.contains(this.constructor.classList.open)) {
                this.#open(item);
            }

            button?.addEventListener('click', event => {
                event.preventDefault();
                event.stopImmediatePropagation();

                this.#open(item);
            });


            console.log(button);
        });




        // console.log(this.#items);
        
        
    //     for(let i=0; i < this.#items.length; i++) {

    //         const item = this.#items[i];
    //         const button = this.#items[i].querySelector(`.${CLASS_ACCORDION_HEADER}`);

    //         if (item.classList.contains(CLASS_ACCORDION_OPEN))
    //             this.#open(item);

    //         button?.addEventListener('click', x => {
    //             x.preventDefault();
    //             x.stopImmediatePropagation();
                
    //             let toggle = true;

    //             if (this.#node.dataset.multiple == undefined){
    //                 toggle = !item.classList.contains(CLASS_ACCORDION_OPEN);

    //                 this.#reset();
    //             }
                
    //             if (toggle) {
    //                 this.#toggle(item);
    //             }
    //         });
    //     }
    }

    // #reset()
    // {
    //     for(let i=0; i < this.#items.length; i++) {
    //         this.#close(this.#items[i]);
    //     }
    // }

    // #toggle(item)
    // {
    //     item.classList.contains(CLASS_ACCORDION_OPEN)
    //         ? this.#close(item)
    //         : this.#open(item)
    //     ;
    // }

    #open(item) {
        const content = item.querySelector(`.${this.constructor.classList.content}`);
    //     content.style.maxHeight = `${content.scrollHeight}px`;
        item.classList.add(this.constructor.classList.open);
    }

    // #close(item)
    // {
    //     const content = item.querySelector(`.${CLASS_ACCORDION_CONTENT}`);
    //     content.style.maxHeight = null;
    //     item.classList.remove(CLASS_ACCORDION_OPEN);
    // }
}

document.querySelectorAll(AccordionComponent.selector).forEach(node => new AccordionComponent(node));
