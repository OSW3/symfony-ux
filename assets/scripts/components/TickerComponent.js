// ************************************************************************** //
// *
// *    Components: Ticker
// *
// ************************************************************************** //
"use strict";

import { getPrefix } from "../utils/prefix";
import { parseBoolean } from "../utils/parseBoolean";

/** @var string Component classname */
const NAME = 'ticker';

/** @var string Components prefix */
const PREFIX = getPrefix();

/** @var string Component selector */
const SELECTOR = `[rel=js-${PREFIX}${NAME}]`;

/** @var string Component element classname; inner wrapper */
const CLASS_TICKER_INNER = `${PREFIX}${NAME}-inner`;

/** @var string Component element classname; Item wrapper */
const CLASS_TICKER_ITEM = `${PREFIX}${NAME}-item`;

/** @var number time interval of setting new location */
const SPEED = 15;

/** @var number Delay before playing next message */
const DELAY = 0;

/** @var number change position of XX pixel at every #play */
const CHUNK = 1;

/** @var bool Play in loop */
const LOOP = true;

/** @var bool Pause ticker on mouse over */
const PAUSE_HOVER = true;

const DIRECTION = 'rtl';
// const DIRECTION = 'ltr';

export default class TickerComponent
{
    #node;
    #items;
    #index = 0;
    #instance;

    #speed = SPEED;
    #delay = DELAY;
    #direction = DIRECTION;
    #loop = LOOP;
    #pauseHover = PAUSE_HOVER;

    constructor(node)
    {
        this.#node = node;
        this.#items = this.#node.querySelectorAll(`.${CLASS_TICKER_ITEM}`);

        // Option speed
        this.#speed = this.#node.dataset.speed ?? SPEED;

        // Option delay
        this.#delay = this.#node.dataset.delay ?? DELAY;

        // Option direction
        this.#direction = this.#node.dataset.direction ?? DIRECTION;

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

        this.#play(this.#node.offsetWidth);
    }

    #play(trans_width)
    {
        this.#items[this.#index].style.display = 'block';
        this.#direction != 'ltr'
            ? this.#items[this.#index].style.left = `${trans_width}px`
            : this.#items[this.#index].style.right = `${trans_width}px`
        ;
        
        if (this.#speed > 0) {
            this.#instance = setInterval(() => {

                if (this.#direction != 'ltr' && parseInt(this.#items[this.#index].style.left) > -this.#items[this.#index].offsetWidth) {
                    this.#items[this.#index].style.left = parseInt(this.#items[this.#index].style.left) - CHUNK + "px";
                } else if (this.#direction == 'ltr' && parseInt(this.#items[this.#index].style.right) > -this.#items[this.#index].offsetWidth) {
                    this.#items[this.#index].style.right = parseInt(this.#items[this.#index].style.right) - CHUNK + "px";
                } else {
                    this.#items[this.#index].style.display = 'none';
                    clearInterval(this.#instance);
                    trans_width = this.#node.offsetWidth;
                    this.#index++;
    
                    // Replay
                    if (this.#index == this.#items.length && this.#loop == true) {
                        this.#index = 0;
                        this.#play(trans_width);
                    } 
                    // Next
                    else if (this.#index < this.#items.length) {
                        setTimeout(() => this.#play(trans_width), this.#delay);
                    }
                }
            }, this.#speed);
        }

        if (this.#pauseHover)
        {
            this.#node.onmouseover = () => this.#pause();
            this.#node.onmouseout = () => this.#resume();
        }
    }

    #pause() {
        // this.#items[this.#index].style.transition = "left 1s ease-in-out"; // Smoothly stop the movement
        clearInterval(this.#instance);
        
    }

    #resume() {
        // this.#items[this.#index].style.transition = ""; // Remove smooth effect when resuming
        this.#play(parseInt(this.#items[this.#index].style.left));
    }
}

document.querySelectorAll(SELECTOR).forEach(node => new TickerComponent(node));