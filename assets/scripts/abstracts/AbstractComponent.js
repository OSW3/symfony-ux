"use strict";

// const EVENTS = new Set([
//     'click',
//     'dblclick',
//     'mouseup',
//     'mousedown',
//     'contextmenu',
//     'mousewheel',
//     'DOMMouseScroll',
//     'mouseover',
//     'mouseout',
//     'mousemove',
//     'selectstart',
//     'selectend',
//     'keydown',
//     'keypress',
//     'keyup',
//     'orientationchange',
//     'touchstart',
//     'touchmove',
//     'touchend',
//     'touchcancel',
//     'pointerdown',
//     'pointermove',
//     'pointerup',
//     'pointerleave',
//     'pointercancel',
//     'gesturestart',
//     'gesturechange',
//     'gestureend',
//     'focus',
//     'blur',
//     'change',
//     'reset',
//     'select',
//     'submit',
//     'focusin',
//     'focusout',
//     'load',
//     'unload',
//     'beforeunload',
//     'resize',
//     'move',
//     'DOMContentLoaded',
//     'readystatechange',
//     'error',
//     'abort',
//     'scroll'
// ])

// const EVENTS_PREFIX = new Set([
//     'onBefore', 
//     'on',
//     'onAfter'
// ]);


export default class AbstractComponent
{
    // #id;
    // #node;

    // constructor(node)
    // {
    //     this.#node   = node;
    //     this.#id     = node.id;

    //     if (typeof this._onInit === 'function') this._onInit();
    // }

    // get node()
    // {
    //     return this.#node;
    // }

    // get id()
    // {
    //     return this.#id;
    // }

    // on(eventName)
    // {
    //     if (!EVENTS.has(eventName)) return;
        
    //     this.node.addEventListener(eventName, event => {
    //         EVENTS_PREFIX.forEach(subEvent => {
    //             const subEventName = `${subEvent}${this.#capitalized(eventName)}`;
                
    //             // Always do on event
    //             if (typeof this[`_${subEventName}Always`] === 'function') {
    //                 (this[`_${subEventName}Always`])(this, event)
    //             }

    //             // Do custom action
    //             if (typeof this[subEventName] === 'function') {
    //                 (this[subEventName])(this, event)
    //             }
    //             // or do default action
    //             else if (typeof this[subEventName] !== 'function' && typeof this[`_${subEventName}Default`] === 'function') {
    //                 (this[`_${subEventName}Default`])(this, event)
    //             }
    //         });
    //     });
    // }

    // #capitalized(str)
    // {
    //     return str.charAt(0).toUpperCase() + str.slice(1);
    // } 
}