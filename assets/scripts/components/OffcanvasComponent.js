// ***************************** DevBrain Theme ***************************** //
// *
// *    Components: Offcanvas
// *
// ************************************************************************** //
// *
// *    Import
// *        import OffcanvasComponent from '../../vendor/devbraincode/devbrain-ui/src/Resources/scripts/OffcanvasComponent';
// *
// *
// ************************************************************************** //

import AbstractComponent from "./AbstractComponent";
import ButtonComponent from "./ButtonComponent";

const SELECTOR          = '.offcanvas';
const ACTIONS_HANDLER   = ['show','hide','toggle'];
const CLASS_NAME_ACTIVE = 'show';

export default class OffcanvasComponent extends AbstractComponent
{
    _onInit() 
    {
        document.querySelectorAll('[data-action]').forEach(btn => {
            const target = btn.dataset.target;
            const action = btn.dataset.action;

            console.log(target, action, this.node.id);

            if (target == this.node.id && ACTIONS_HANDLER.includes(action))
            {
                switch (action)
                {
                    case 'show': new ButtonComponent(btn).onClick = (event, element) => this.#show(); break;
                    case 'hide': new ButtonComponent(btn).onClick = (event, element) => this.#hide(); break;
                    case 'toggle': new ButtonComponent(btn).onClick = (event, element) => this.#toggle(); break;
                }
            }
        });
    }

    #show() {this.node.classList.add(CLASS_NAME_ACTIVE)}
    #hide() {this.node.classList.remove(CLASS_NAME_ACTIVE)}
    #toggle() {this.node.classList.toggle(CLASS_NAME_ACTIVE)}
}

document.querySelectorAll(SELECTOR).forEach(node => new OffcanvasComponent(node));