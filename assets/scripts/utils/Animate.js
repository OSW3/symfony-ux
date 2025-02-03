// ************************************************************************** //
// *
// *    Utils Animate
// *
// ************************************************************************** //
"use strict";

export default class Animate
{
    #node;
    #delay;

    constructor(node, delay=0)
    {
        this.#node = node;
        this.#delay = delay * 1000;
    }

    #play(animation, callback) {
        animation.play();

        if (typeof callback === 'function') {
            animation.onfinish = callback
        }
    }

    // Fade Animation
    // --
    
    fade(keyframes, onfinish)
    {
        const options = {
            duration: 2000,
            delay: this.#delay,
            easing: 'ease',
            fill: 'forwards'
        };

        const animation = new Animation(
            new KeyframeEffect(this.#node, keyframes, options),
            document.timeline
        );

        this.#play(animation, onfinish);
    }
    fadeIn(onfinish)
    {
        const keyframes = [
            { opacity: 0 },
            { opacity: 1 } 
        ];

        this.fade(keyframes, onfinish);
    }
    fadeOut(onfinish)
    {
        const keyframes = [
            { opacity: 1 }, 
            { opacity: 0 } 
        ];

        this.fade(keyframes, onfinish);
    }



    // resize(keyframes, onfinish) {

    //     const options = {
    //         duration: 2000,
    //         delay: this.#delay,
    //         easing: 'ease',
    //         fill: 'forwards'
    //     };

    //     const animation = new Animation(
    //         new KeyframeEffect(this.#node, keyframes, options),
    //         document.timeline
    //     );

    //     this.#play(animation, onfinish);
    // }
    // reduce(onfinish) {
    //     const keyframes = [
    //         { height: this.#node.offsetHeight + 'px' }, 
    //         { height: '0px' }
    //     ];

    //     this.resize(keyframes, onfinish);
    // }
}