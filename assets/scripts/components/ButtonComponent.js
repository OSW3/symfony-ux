// ************************************************************************** //
// *
// *    Components: Button
// *
// ************************************************************************** //
// *
// *    Instance
// *        new ButtonComponent( document.querySelector('.my-custom-component') );
// *
// *    Events
// *        onClick(event, element)
// *        onBeforeClick(event, element)
// *        onAfterClick(event, element)
// *
// *        onMousedown(event, element)
// *        onBeforeMousedown(event, element)
// *        onAfterMousedown(event, element)
// *
// *        onMouseup(event, element)
// *        onBeforeMouseup(event, element)
// *        onAfterMouseup(event, element)
// *
// *    Methods
// *        isActive()
// *
// ************************************************************************** //
"use strict";

// import AbstractComponent from "../abstracts/AbstractComponent";

// const SELECTOR          = '[rel=js-button]';
const CLASS_NAME_ACTIVE = 'active';


// Available events for the component
// const EVENTS = ['click', 'mousedown', 'mouseup', 'mouseout'];

const EVENTS_PREFIX = new Set([
    'onBefore', 
    'on',
    'onAfter'
]);
const EVENTS = new Set([
    'click', // can create function onClick, onBeforeClick, onAfterClick
    'mousedown', 
    'mouseup', 
    'mouseout'
]);
// const EVENTS = [
//     'click', // can create function onClick, onBeforeClick, onAfterClick
//     'mousedown', 
//     'mouseup', 
//     'mouseout'
// ]; 

// const COMPONENT_EVENTS = ['click']; 
// _onClickAlways           onClick          _onClickDefault
// _onBeforeClickAlways     onBeforeClick    _onBeforeClickDefault
// _onAfterClickAlways      onAfterClick     _onAfterClickDefault


export default class ButtonComponent // extends Component
{
    #node;

    constructor(node)
    {
        this.#node = node;        
        EVENTS.forEach(eventName => this.on(eventName));
    }

    on(eventName)
    {
        this.#node.addEventListener(eventName, event => {
            EVENTS_PREFIX.forEach(subEvent => {
                const subEventName = `${subEvent}${this.#capitalized(eventName)}`;
                
                // Always do on event
                // if (typeof this[`_${subEventName}Always`] === 'function') {
                //     (this[`_${subEventName}Always`])(this, event)
                // }

                // Do custom action
                if (typeof this[subEventName] === 'function') {
                    (this[subEventName])(event, this)
                }
                // or do default action
                // else if (typeof this[subEventName] !== 'function' && typeof this[`_${subEventName}Default`] === 'function') {
                //     (this[`_${subEventName}Default`])(this, event)
                // }
            });
        });
    }

    #capitalized(str)
    {
        return str.charAt(0).toUpperCase() + str.slice(1);
    } 



    // Do ALWAYS on Click event
    _onClickAlways(handler, event)
    {
        console.log("Do always on click");
    }

    // Do Default on Click event, if onClick() is not defined
    _onClickDefault(handler, event)
    {
        // console.log("Do default on click");
    }

}




//     _toggle()
//     {
//         this.node.classList.contains(CLASS_NAME_ACTIVE) ? this._deactivate() : this._activate();
//     }

//     _activate()
//     {
//         this.node.setAttribute('aria-pressed', true);
//         this.node.classList.add(CLASS_NAME_ACTIVE);
//     }

//     _deactivate()
//     {
//         this.node.setAttribute('aria-pressed', false);
//         this.node.classList.remove(CLASS_NAME_ACTIVE);
//     }





















    
//     // _onClick(handler, event, element)
//     // {
//     //     // Always Click script
//     //     // --

//     //     // console.log(handler, event);


//     //     // Custom Click script
//     //     // --

//     //     if (typeof handler.onClick === 'function')
//     //     {
//     //         handler.onClick(event, element); 
//     //         return;
//     //     }

        
//     //     // Default Click script
//     //     // --
        
//     //     console.log("Default do click");
//     // }
//     // _onBeforeClick(handler, event, element)
//     // {
//     // //     // Always Before Click script
//     // //     // --


//     // //     //  Custom Before Click script
//     // //     // --

//     // //     if (typeof handler.onBeforeClick === 'function')
//     // //     {
//     // //         handler.onBeforeClick(event, element); 
//     // //         return;
//     // //     }

        
//     // //     //  Default Before Click script
//     // //     // --
        
//     // //     // console.log("Default do before click");
//     // }
//     // _onAfterClick(handler, event, element)
//     // {
//     // //     // Always After Click script
//     // //     // --


//     // //     //  Custom After Click script
//     // //     // --

//     // //     if (typeof handler.onAfterClick === 'function')
//     // //     {
//     // //         handler.onAfterClick(event, element); 
//     // //         return;
//     // //     }

        
//     // //     //  Default After Click script
//     // //     // --
        
//     // //     // console.log("Default do after click");
//     // }




//     // _mousedown(handler, event, element)
//     // {
//     //     // Always Mousedown script
//     //     // --
//     //     handler._activate();


//     //     //  Custom Mousedown script
//     //     // --

//     //     if (typeof handler.onMousedown === 'function')
//     //     {
//     //         handler.onMousedown(event, element); 
//     //         return;
//     //     }

        
//     //     //  Default Mousedown script
//     //     // --
        
//     //     // console.log("Default do mousedown");
//     // }
//     // _beforeMousedown(handler, event, element)
//     // {
//     //     // Always Before Mousedown script
//     //     // --

//     //     // handler._toggle();


//     //     //  Custom Before Mousedown script
//     //     // --

//     //     if (typeof handler.onBeforeMousedown === 'function')
//     //     {
//     //         handler.onBeforeMousedown(event, element); 
//     //         return;
//     //     }

        
//     //     //  Default Before Mousedown script
//     //     // --
        
//     //     // console.log("Default do before mousedown");
//     // }
//     // _afterMousedown(handler, event, element)
//     // {
//     //     // Always After Mousedown script
//     //     // --


//     //     //  Custom After Mousedown script
//     //     // --

//     //     if (typeof handler.onAfterMousedown === 'function')
//     //     {
//     //         handler.onAfterMousedown(event, element); 
//     //         return;
//     //     }

        
//     //     //  Default After Mousedown script
//     //     // --
        
//     //     // console.log("Default do after mousedown");
//     // }

//     // _mouseup(handler, event, element)
//     // {
//     //     // Always Mouseup script
//     //     // --
        
//     //     handler._deactivate();


//     //     //  Custom Mouseup script
//     //     // --

//     //     if (typeof handler.onMouseup === 'function')
//     //     {
//     //         handler.onMouseup(event, element); 
//     //         return;
//     //     }

        
//     //     //  Default Mouseup script
//     //     // --
        
//     //     // console.log("Default do mouseup");
//     // }
//     // _beforeMouseup(handler, event, element)
//     // {
//     //     // Always Before Mouseup script
//     //     // --


//     //     //  Custom Before Mouseup script
//     //     // --

//     //     if (typeof handler.onBeforeMouseup === 'function')
//     //     {
//     //         handler.onBeforeMouseup(event, element); 
//     //         return;
//     //     }

        
//     //     //  Default Before Mouseup script
//     //     // --
        
//     //     // console.log("Default do before mouseup");
//     // }
//     // _afterMouseup(handler, event, element)
//     // {
//     //     // Always After Mouseup script
//     //     // --


//     //     //  Custom After Mouseup script
//     //     // --

//     //     if (typeof handler.onAfterMouseup === 'function')
//     //     {
//     //         handler.onAfterMouseup(event, element); 
//     //         return;
//     //     }

        
//     //     //  Default After Mouseup script
//     //     // --
        
//     //     // console.log("Default do after mouseup");
//     // }

//     // _mouseout(handler, event, element)
//     // {
//     //     // Always Mouseout script
//     //     // --
        
//     //     handler._deactivate();


//     //     //  Custom Mouseout script
//     //     // --

//     //     if (typeof handler.onMouseout === 'function')
//     //     {
//     //         handler.onMouseout(event, element); 
//     //         return;
//     //     }

        
//     //     //  Default Mouseout script
//     //     // --
        
//     //     // console.log("Default do mouseout");
//     // }
//     // _beforeMouseout(handler, event, element)
//     // {
//     //     // Always Before Mouseout script
//     //     // --


//     //     //  Custom Before Mouseout script
//     //     // --

//     //     if (typeof handler.onBeforeMouseout === 'function')
//     //     {
//     //         handler.onBeforeMouseout(event, element); 
//     //         return;
//     //     }

        
//     //     //  Default Before Mouseout script
//     //     // --
        
//     //     // console.log("Default do before mouseout");
//     // }
//     // _afterMouseout(handler, event, element)
//     // {
//     //     // Always After Mouseout script
//     //     // --


//     //     //  Custom After Mouseout script
//     //     // --

//     //     if (typeof handler.onAfterMouseout === 'function')
//     //     {
//     //         handler.onAfterMouseout(event, element); 
//     //         return;
//     //     }

        
//     //     //  Default After Mouseout script
//     //     // --
        
//     //     // console.log("Default do after mouseout");
//     // }
// }

// document.querySelectorAll(SELECTOR).forEach(node => {
//     let t = new ButtonComponent(node) 
//     console.log(t);

//     t.onClick = (handler, event) => {
//         console.log('Click!');
//         console.log(handler);
//         console.log(event);
//     }
//     t.onBeforeClickk = () => console.log('Before Click!');
//     // t.onAfterClick = () => console.log('After Click!');
    
// });