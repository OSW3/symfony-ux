// ***************************** DevBrain Theme ***************************** //
// *
// *    Components: Cookieconsent
// *
// ************************************************************************** //
// *
// *    <div rel="js-cookieconsent">
// *
// ************************************************************************** //

import AbstractComponent from "./AbstractComponent";
import ButtonComponent from "./ButtonComponent";

const SELECTOR          = '[rel=js-cookie-box]';
const ACTIONS_HANDLER   = ['accept-all','reject-all','accept-selected'];
// const CLASS_NAME_ACTIVE = 'active';

export default class CookieBoxComponent extends AbstractComponent
{
    name;
    options = [];

    constructor(node)
    {
        super(node);
        this.name    = node.dataset.cookie;
        this.options = this.node.querySelectorAll('.cookie-box-options input[type=checkbox]');
    }

    _onInit() 
    {
        // let properties = this._getCookie().split(',');
        // let options = this.node.querySelectorAll('.cookie-box-options input[type=checkbox]');

        // options.forEach(opt => {
        //     if (!opt.disabled) {
        //         opt.checked = false;
        //     }
        // })
        // options.forEach(opt => {
        //     if (!opt.disabled)
        //     {
        //         opt.checked = properties.includes(opt.name);
        //     }
        // })

        // Show Cookie Box Button
        document
            .querySelectorAll('[data-action=show][data-target=cookie-box]')
            .forEach(node => node.addEventListener('click', event => {
                event.preventDefault();
                event.stopImmediatePropagation();
                this.show(this.node)
            }))
        ;

        this.node.querySelectorAll('[data-action]').forEach(btn => {
            const action = btn.dataset.action;

            if (ACTIONS_HANDLER.includes(action))
            {
                switch (action)
                {
                    case 'accept-all': new ButtonComponent(btn).onClick = (event, element) => this.accept('all'); break;
                    case 'reject-all': new ButtonComponent(btn).onClick = (event, element) => this.reject(); break;
                    case 'accept-selected': new ButtonComponent(btn).onClick = (event, element) => this.accept('selected'); break;
                }
            }
        })
    }

    show(node)
    {
        node.classList.add('show');
    }
    hide(node)
    {
        node.classList.remove('show');
    }


    // Accept All
    accept(selection)
    {
        let value = 'all';

        if (selection == 'all')
        {
            this.options.forEach(opt => {
                if (!opt.disabled)
                {
                    opt.checked = true;
                }
            });
        }

        if (this.options.length > 0)
        {
            let selected = [];
            this.options.forEach(opt => {
                if (opt.checked)
                {
                    selected.push(opt.name);
                }
            });

            value = selected.join(',') || 'none';
        }
                
        this._update(value);
    }

    // Reject All
    reject()
    {
        this.options.forEach(opt => {
            if (!opt.disabled)
            {
                opt.checked = false;
            }
        });
        
        let selected = [];
        this.options.forEach(opt => {
            if (opt.checked)
            {
                selected.push(opt.name);
            }
        });

        let value = selected.join(',') || 'none';

        this._update(value);
    }

    _update(value)
    {
        this._setCookie(value);
        setTimeout(() => this.hide(this.node), 300);
    }

    _getCookie()
    {
        const nameEQ = `${this.node.dataset.cookie}=`;
        const ca = document.cookie.split(';');

        for(let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) === ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
        }
        return '';
    }
    _setCookie(value)
    {
        let expires = "";
        // const date = new Date();
        // date.setTime(date.getTime() + (365 * 24 * 60 * 60 * 1000));
        // expires = "; expires=" + date.toUTCString();
        document.cookie = `${this.name}=${value} ${expires}; path=/`;
    }
}

document.querySelectorAll(SELECTOR).forEach(node => new CookieBoxComponent(node));