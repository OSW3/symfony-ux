// ***************************** DevBrain Theme ***************************** //
// *
// *    Components: Offcanvas
// *
// ************************************************************************** //
// *
// *    <div rel="js-offcanvas">
// *
// ************************************************************************** //

import AbstractComponent from "./AbstractComponent";
import ButtonComponent from "./ButtonComponent";

const SELECTOR          = '.navigation';
const ACTIONS_HANDLER   = ['show','hide','toggle'];
const CLASS_NAME_ACTIVE = 'show';

export default class NavigationComponent extends AbstractComponent
{
    constructor(node)
    {
        super(node);
        this.element = node; //.querySelector('.navigation-inner');
    }

    show() 
    {
        this.element.classList.add(CLASS_NAME_ACTIVE)
    }

    hide() 
    {
        this.element.classList.remove(CLASS_NAME_ACTIVE)
    }

    toggle() 
    {
        this.element.classList.toggle(CLASS_NAME_ACTIVE)
    }

    
    _onInit() 
    {
        // Retrouve les actions liées au composant
        document.querySelectorAll('[data-action]').forEach(btn => {
            const target = btn.dataset.target;
            const action = btn.dataset.action;

            if (target == this.node.id && ACTIONS_HANDLER.includes(action))
            {
                console.log(btn);
                switch (action)
                {
                    case 'show': new ButtonComponent(btn).onClick = (event, element) => this.show(); break;
                    case 'hide': new ButtonComponent(btn).onClick = (event, element) => this.hide(); break;
                    case 'toggle': new ButtonComponent(btn).onClick = (event, element) => this.toggle(); break;
                }
            }
        });
    }
}

document.querySelectorAll(SELECTOR).forEach(node => new NavigationComponent(node));