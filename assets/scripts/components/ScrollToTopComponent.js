// * ---- @osw3/symfony-ux/assets/scripts/components/ScrollToTopComponent.js ---
// *
// *    ScrollToTop Component
// *    ---------------------
// *
// *    Import
// *        import './../../vendor/osw3/symfony-ux/assets/scripts/components/ScrollToTopComponent';
// *
// * ---------------------------------------------------------------------------
"use strict";

import { getPrefix } from "../utils/generated";

/** Component name
 * 
 * @var string  
 */
const NAME = 'scroll-to-top';

/** Component selector
 * 
 * @var string 
 */
const SELECTOR = `[rel=js-${getPrefix()}${NAME}]`;

/** Component selector
 * 
 * @var number 
 */
const TOP_AT = 0;

/** Trigger point to show/hide the button
 * 
 * @var number  
 */
const TOGGLE_AT = 200;

export default class ScrollToTopComponent {
    #node;

    constructor(node) {
        this.node       = node;
        node.onclick    = () => this.#onClick();
        window.onload   = () => this.#onScroll();
        window.onscroll = () => this.#onScroll();
    }

    #onClick() {
        const topAt = this.node.dataset.topAt ?? TOP_AT;

        document.body.scrollTop = topAt;
        document.documentElement.scrollTop = topAt;
    }

    #onScroll() {
        const toggleAt = this.node.dataset.toggleAt ?? TOGGLE_AT;
        const toggleShow = document.body.scrollTop > toggleAt || document.documentElement.scrollTop > toggleAt;

        this.node.classList.toggle('show', toggleShow);
    }
}

document.querySelectorAll(SELECTOR).forEach(node => new ScrollToTopComponent(node));
