// ***************************** DevBrain Theme ***************************** //
// *
// *    Components: Switch
// *
// ************************************************************************** //
// *
// *    Instance
// *        new SwitchComponent( document.querySelector('.my-custom-component') );
// *
// *    Events
// *        onChange(event, element)
// *        onBeforeChange(event, element)
// *        onAfterChange(event, element)
// *
// *    Methods
// *        isActive()
// *
// ************************************************************************** //

import AbstractComponent from "./AbstractComponent";

const SELECTOR = '[rel=js-switch]';
const CLASS_NAME_ACTIVE = 'active';

export default class SwitchComponent extends AbstractComponent
{
    constructor(node)
    {
        super(node.querySelector('input[type=checkbox]'));
        this.element = node;
    }

    isActive()
    {
        return this.node.checked;
    }

    _onInit() 
    {
        this.on('change', {
            do    : this._change,
            before: this._beforeChange,
            after : this._afterChange,
        })
    }

    _toggle()
    {
        this.element.classList.toggle(CLASS_NAME_ACTIVE);
    }

    _change(handler, event, element)
    {
        // Always Change script
        // --


        //  Custom Change script
        // --

        if (typeof handler.onChange === 'function')
        {
            handler.onChange(event, element); 
            return;
        }

        
        //  Default Change script
        // --
        
        // console.log("Default do change");
    }

    _beforeChange(handler, event, element)
    {
        // Always Before Change script
        // --


        //  Custom Before Change script
        // --

        if (typeof handler.onBeforeChange === 'function')
        {
            handler.onBeforeChange(event, element); 
            return;
        }

        
        //  Default Before Change script
        // --
        
        // console.log("Default do before change");
    }

    _afterChange(handler, event, element)
    {
        // Always Before Change script
        // --

        handler._toggle();


        //  Custom Before Change script
        // --

        if (typeof handler.onAfterChange === 'function')
        {
            handler.onAfterChange(event, element); 
            return;
        }

        
        //  Default Before Change script
        // --
        
        // console.log("Default do after change");
    }
}

document.querySelectorAll(SELECTOR).forEach(node => new SwitchComponent(node));