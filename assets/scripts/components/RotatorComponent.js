// ************************************************************************** //
// *
// *    Components: Rotator
// *
// ************************************************************************** //
"use strict";

import { getPrefix } from "../utils/generated";
import { parseBoolean } from "../utils/parseBoolean";
import Animate from "../utils/Animate";

/** @var string Component classname */
const NAME = 'rotator';

/** @var string Components prefix */
const PREFIX = getPrefix();

/** @var string Component selector */
const SELECTOR = `[rel=js-${PREFIX}${NAME}]`;

/** @var string Component element classname; inner wrapper */
const CLASS_TICKER_INNER = `${PREFIX}${NAME}-inner`;

/** @var string Component element classname; Item wrapper */
const CLASS_TICKER_ITEM = `${PREFIX}${NAME}-item`;

/** @var number Delay before playing next message */
const DELAY = 3000;

/** @var number change position of XX pixel at every #play */
// const CHUNK = 1;

/** @var bool Play in loop */
const LOOP = true;

/** @var bool Pause ticker on mouse over */
const PAUSE_HOVER = true;

export default class RotatorComponent {
    #node;
    #items;
    #index = 0;
    #instance;

    #delay = DELAY;
    #loop = LOOP;
    #pauseHover = PAUSE_HOVER;

    constructor(node)
    {
        this.#node = node;
        this.#items = this.#node.querySelectorAll(`.${CLASS_TICKER_ITEM}`);

        // Option delay
        this.#delay = this.#node.dataset.delay ?? DELAY;

        // Option loop
        let loop = this.#node.dataset.loop ?? PAUSE_HOVER;
        this.#loop = parseBoolean(loop, loop);

        // Option Pause on Hover
        let pausehover = this.#node.dataset.pausehover ?? PAUSE_HOVER;
        this.#pauseHover = parseBoolean(pausehover, pausehover);

        this.#init();
    }

    #init()
    {
        // Move items to Inner
        this.#node.innerHTML = '';

        const container = document.createElement('div');
              container.classList.add(CLASS_TICKER_INNER);
        
        this.#items.forEach(item => {
            container.append(item);
        });

        this.#node.append(container);

        this.#play(true);
    }

    #play(animate)
    {
        if (this.#delay > 0)
        {
            this.#items[this.#index].style.display = 'block';
            if (animate) {
                new Animate(this.#items[this.#index]).fadeIn();
            }

            this.#instance = setTimeout(() => {
                new Animate(this.#items[this.#index]).fadeOut(() => {
    
                    this.#items[this.#index].style.display = 'none';
                    clearInterval(this.#instance);
                    this.#index++;
    
                    // Replay
                    if (this.#index == this.#items.length && this.#loop == true) {
                        this.#index = 0;
                        this.#play(true);
                    } 
                    // Next
                    else if (this.#index < this.#items.length) {
                        this.#play(true);
                    }
                });
                
            }, this.#delay);
        }

        if (this.#pauseHover)
        {
            this.#node.onmouseover = () => clearInterval(this.#instance);
            this.#node.onmouseout = () => this.#play(false);
        }
    }
}

document.querySelectorAll(SELECTOR).forEach(node => new RotatorComponent(node));