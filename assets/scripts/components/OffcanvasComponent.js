// ************************************************************************** //
// *
// *    Components: Offcanvas
// *
// ************************************************************************** //
"use strict";

import { getPrefix } from "../utils/prefix";
import ButtonComponent from "./ButtonComponent";
// import OverlayComponent from "./OverlayComponent";


/** @var string Component classname */
const NAME = 'offcanvas';

/** @var string Components prefix */
const PREFIX = getPrefix();

/** @var string Component selector */
const SELECTOR = `[rel=js-${PREFIX}${NAME}]`;

/** @var array Allowed actions */
const ACTIONS = ['open','close','toggle'];

/** @var string State classname */
const CLASS_OPEN = 'open';


export default class OffcanvasComponent
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
        document.addEventListener('click', event => {
            if (event.target == this.#node) {
                event.stopImmediatePropagation();
                this.close();
            }
        });

        document.addEventListener('keydown', event => {
            if (event.key === "Escape" || event.key === "Esc") {
                event.preventDefault();
                event.stopImmediatePropagation();
                this.close();
            }
        });
        

        if (this.#node.classList.contains(CLASS_OPEN)) {
            this.open();
        }
    }

    open() {
        this.#node.style.display = 'flex';
        this.#document.classList.add(`${PREFIX}no-scroll`);
        setTimeout(() => this.#node.classList.add(CLASS_OPEN),1);
    }
    close() {
        this.#document.classList.remove(`${PREFIX}no-scroll`);
        this.#node.classList.remove(CLASS_OPEN)
        setTimeout(() => this.#node.style.display = 'none', 300);
    }
    toggle() {
        !this.#node.classList.contains(CLASS_OPEN) ? this.open() : this.close();
    }
}
// export default class OffcanvasComponent
// {
//     #node;
//     #hasBackdrop = true;
//     #overlay;
    
//     constructor(node)
//     {
//         this.#node = node;
//         this.#hasBackdrop = !this.#node.classList.contains(`${PREFIX}${NAME}-no-backdrop`);
        
//         if (!this.#node.id) {
//             return;
//         }

//         if (this.#hasBackdrop) {
//             this.#overlay = new OverlayComponent(this.#node);
//             this.#overlay.onClick(() => this.hide());
//         }

//         document.querySelectorAll(`[data-action][data-target=${this.#node.id}]`).forEach(trigger => {
//             new ButtonComponent(trigger).onClick = (event, element) => {
//                 if (ACTIONS.includes(event.target.dataset.action)) {
//                     this[event.target.dataset.action]();
//                 }
//             }
//         })
//     }

//     show() {
//         this.#node.classList.add(CLASS_OPEN);
//         if (this.#hasBackdrop) this.#overlay.show();
//     }
//     hide() {
//         this.#node.classList.remove(CLASS_OPEN);
//         if (this.#hasBackdrop) this.#overlay.hide();
//     }
//     toggle() {
//         this.#node.classList.toggle(CLASS_OPEN);
//         if (this.#hasBackdrop) this.#overlay.toggle();
//     }
// }

document.querySelectorAll(SELECTOR).forEach(node => new OffcanvasComponent(node));