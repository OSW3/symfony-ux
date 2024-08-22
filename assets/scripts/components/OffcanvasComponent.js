// ************************************************************************** //
// *
// *    Components: Offcanvas
// *
// ************************************************************************** //
"use strict";

import { getPrefix } from "../utils/prefix";
import ButtonComponent from "./ButtonComponent";
import OverlayComponent from "./OverlayComponent";


/** @var string Component classname */
const NAME = 'offcanvas';

/** @var string Components prefix */
const PREFIX = getPrefix();

/** @var string Component selector */
const SELECTOR = `[rel=js-${PREFIX}${NAME}]`;


/** @var array Allowed actions */
const ACTIONS = ['show','hide','toggle'];

const CLASS_OFFCANVAS_SHOW = 'show';


export default class OffcanvasComponent
{
    #node;
    #hasBackdrop = true;
    #overlay;
    
    constructor(node)
    {
        this.#node = node;
        this.#hasBackdrop = !this.#node.classList.contains(`${PREFIX}${NAME}-no-backdrop`);
        
        if (this.#hasBackdrop) {
            this.#overlay = new OverlayComponent(this.#node);
            this.#overlay.onClick(() => this.hide());
        }

        document.querySelectorAll(`[data-action][data-target=${this.#node.id}]`).forEach(trigger => {
            new ButtonComponent(trigger).onClick = (event, element) => {
                if (ACTIONS.includes(event.target.dataset.action)) {
                    this[event.target.dataset.action]();
                }
            }
        })
    }

    show() {
        this.#node.classList.add(CLASS_OFFCANVAS_SHOW);
        if (this.#hasBackdrop) this.#overlay.show();
    }
    hide() {
        this.#node.classList.remove(CLASS_OFFCANVAS_SHOW);
        if (this.#hasBackdrop) this.#overlay.hide();
    }
    toggle() {
        this.#node.classList.toggle(CLASS_OFFCANVAS_SHOW);
        if (this.#hasBackdrop) this.#overlay.toggle();
    }
}

document.querySelectorAll(SELECTOR).forEach(node => new OffcanvasComponent(node));