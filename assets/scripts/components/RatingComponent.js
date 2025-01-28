// * ---- @osw3/symfony-ux/assets/scripts/components/RatingComponent.js ---
// *
// *    ScrollToTop Component
// *    ---------------------
// *
// *    Import
// *        import './../../vendor/osw3/symfony-ux/assets/scripts/components/RatingComponent';
// *
// * ---------------------------------------------------------------------------
"use strict";

import { getPrefix, getData } from "../utils/generated";

/** Component name
 * 
 * @var string  
 */
const NAME = 'rating';

/** Component selector
 * 
 * @var string 
 */
const SELECTOR = `[rel=js-${getPrefix()}${NAME}]`;

export default class RatingComponent {
    #value;
    #selectors;
    #counterNode;
    #legendNode;
    #inputs;
    #ratingScale;
    #rating = 0;
    #selected;
    #legends = getData('RATING_LEGENDS');

    constructor(node) {
        this.#value       = node.dataset.value;
        this.#ratingScale = node.dataset.ratingScale || 5;
        this.#selectors   = Array.from(node.querySelectorAll('label'));
        this.#inputs      = Array.from(node.querySelectorAll('input'));
        this.#selected    = node.querySelector('input[checked]');
        this.#counterNode = node.querySelector(`.${getPrefix()}${NAME}-counter`);
        this.#legendNode  = node.querySelector(`.${getPrefix()}${NAME}-legend`);
        
        this.#selectors.forEach(label => label.onmouseover = this.#onMouseOver.bind(this));
        this.#inputs.forEach(input => input.onchange = this.#onChange.bind(this));
        this.#init();
    }

    #init() {
        this.#calculate( this.#inputs );
        this.#setNote();
        this.#setLabel();
    }

    #onChange(event) {
        this.#selected = event.target;
        this.#calculate( this.#inputs );
        this.#setNote();
        this.#setLabel();
    }

    #onMouseOver(event) {
        // this.#calculate(this.#selectors);
        // this.#setNote();
        // this.#setLabel();
    }

    #calculate(boxes) {
        const length = boxes.length;
        const index  = boxes.indexOf(this.#selected) + 1;
        const ratio  = this.#ratingScale / length;
        this.#rating = index * ratio;
    }

    #setNote() {
        if (this.#counterNode) {
            this.#counterNode.textContent = this.#rating;
        }
    }

    #setLabel() {
        
        if (this.#legendNode) {
            this.#legendNode.textContent = this.#legends[0].name;
            this.#legends.forEach(evaluation => {
                console.log(evaluation, this.#rating);
                if (evaluation.value <= this.#rating) {
                    this.#legendNode.textContent = evaluation.label;
                }
            });
        }
    }
}

document.querySelectorAll(SELECTOR).forEach(node => new RatingComponent(node));