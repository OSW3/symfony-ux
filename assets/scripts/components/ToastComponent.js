// ************************************************************************** //
// *
// *    Components: Toast
// *
// ************************************************************************** //
// *
// *    <div rel="js-toast">
// *
// ************************************************************************** //
"use strict";

import { getCssClass } from "../utils/CssClassMap";
import { getPrefix, getConst } from "../utils/generated";
import { isEmoji, isCSSVariable, isVarFunction, isBase64Image, isBase64ImageURL, isImageURL, isImageURLWithURLFunction } from "../utils/String";


/** @var string Component classname */
const NAME = 'toast';

/** @var string Components prefix */
const PREFIX = getPrefix();


export default class ToastComponent {
    #options;
    #message;
    #container;
    #item;

    constructor(options = {}) {
        this.#options = Object.assign({
            type       : null,
            duration   : getConst('TOAST_DURATION'),
            delay      : getConst('TOAST_DELAY'),
            title      : null,
            icon       : getConst('TOAST_ICON'),
            message    : null,
            template   : null,
            palette    : null,
            dismissible: true,
            hover      : false,
        }, options);
        
        this.#onInit();
    }

    #onInit() {
        // this.#message = this.#options.template ?? this.#options.message;

        if (this.#options.message == null || this.#options.message.length <= 0) {
            return;
        }

        // Create container
        this.selectOrCreateContainer();

        // Create toast
        this.#item = this.#create();
        
        // Show toast
        setTimeout(() => this.#show(), 100);
    }

    selectOrCreateContainer() {
        this.#container = document.querySelector(`[rel=js-${getPrefix()}toast]`);

        if (!this.#container) {
            const container = document.createElement('div');
                  container.classList.add(getCssClass(`${PREFIX}${NAME}-container`));
                  container.setAttribute('rel', `js-${getPrefix()}toast`);
            document.body.append(container);
            this.#container = container;
        }

        // console.log( this.#container.offsetTop );
        
    }

    #create() {
        if (this.#container) {

            let styles = [];
            if (this.#options.duration > 0) styles.push(`--${getPrefix()}toast-duration: ${this.#options.duration}ms`);
            if (this.#options.delay > 0) styles.push(`--${getPrefix()}toast-delay: ${this.#options.delay}ms`);

            let palette = this.#options.palette ?? this.#options.type;

            let toast = document.createElement('div');
                toast.setAttribute('role', 'alert');
                toast.classList.add(getCssClass(`${PREFIX}${NAME}-item`));
                if (this.#options.hover) toast.classList.add(getCssClass(`${PREFIX}${NAME}-item-effect`));
                if (palette) toast.classList.add(getCssClass(`${PREFIX}${NAME}-${palette}`));
                if (styles.length) toast.style = styles.join(';');
            
            // Icon
            if (this.#options.icon?.length) {
                let icon = document.createElement('div');
                    icon.classList.add(getCssClass(`${PREFIX}${NAME}-icon`));
                
                if (isCSSVariable(this.#options.icon)) {
                    icon.style = `background-image: var(${this.#options.icon})`;
                }
                else if (isVarFunction(this.#options.icon) || isBase64ImageURL(this.#options.icon) || isImageURLWithURLFunction(this.#options.icon)) {
                    icon.style = `background-image: ${this.#options.icon}`;
                }
                else if (isBase64Image(this.#options.icon) || isImageURL(this.#options.icon)) {
                    icon.style = `background-image: url(${this.#options.icon})`;
                }
                else if (isEmoji(this.#options.icon)) {
                    icon.innerHTML = this.#options.icon;
                }
                    
                toast.append(icon);
            }

            // Content
            let content = document.createElement('div');
                content.classList.add(getCssClass(`${PREFIX}${NAME}-content`));
            toast.append(content);

            if (this.#options.title) {
                let title = document.createElement('div');
                    title.classList.add(getCssClass(`${PREFIX}${NAME}-title`));
                    title.textContent = this.#options.title;
                    content.append(title);
            }

            let message = document.createElement('div');
                message.classList.add(getCssClass(`${PREFIX}${NAME}-message`));
                message.innerHTML = this.#options.message;
                content.append(message);

            // Close button
            if (this.#options.dismissible) {
                let dismissible = document.createElement('button');
                dismissible.classList.add(getCssClass(`${PREFIX}${NAME}-button-close`));
                dismissible.type = "button";
                dismissible.innerHTML = "&times;";
                dismissible.onclick = event => this.#hide(event.target.parentNode);
                toast.append(dismissible);
            }

            // Progress
            if (this.#options.duration > 0) {
                let progress = document.createElement('div');
                    progress.classList.add(getCssClass(`${PREFIX}${NAME}-progress`));
                toast.append(progress);
            }
                 
            if (this.#container.offsetTop > 0) {
                this.#container.prepend(toast);
            } else {
                this.#container.append(toast);
            }
            
            return toast;
        }
    }

    #show() {
        this.#item.classList.add(getCssClass('show'));

        // Hide toast
        if (this.#options.duration > 0) {
            const timeout = this.#options.duration + this.#options.delay;
            setTimeout(() => this.#hide(this.#item), timeout);
        }
    }

    #hide(target) {
        target.classList.remove(getCssClass('show'));
        setTimeout(() => this.#destroy(target), this.#options.delay);
    }

    #destroy(target) {
        target.classList.add(getCssClass('destroy'));
        setTimeout(() => target.remove(), this.#options.delay);
    }

    get node() {
        return this.#item;
    }

    close() {
        this.#hide(this.#item);
    }
}
