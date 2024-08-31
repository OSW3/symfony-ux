// ************************************************************************** //
// *
// *    Components: Searchbar
// *
// ************************************************************************** //
"use strict";

import ModalComponent from "./ModalComponent";
import { parseBoolean } from "../utils/parseBoolean";
import { getPrefix } from "../utils/prefix";
import { 
    SEARCH_BOX_TYPES, 
    SEARCH_BOX_SHORTCUT 
} from "../generated";



/** @var string Component classname */
const NAME = 'search-box';

/** @var string Components prefix */
const PREFIX = getPrefix();

/** @var string Component selector */
const SELECTOR = `[rel=js-${PREFIX}${NAME}]`;

/** @var array All Search Box instances */
const all = [];



const DEFAULT_SEARCH_BOX_TYPE = 'basic';

// const MODAL_ENABLED = true;
// const AUTOCOMPLETE_ENABLED = true;

// const STORAGE_ID = 'searchHistory';


export default class SearchBoxComponent
{
    #component;
    #id;
    #type;
    #form;
    #input;

    #modal;

    constructor(component)
    {
        this.#component = component;
        this.#id = this.#component.id;
        this.#type = this.#component.dataset.type;
        this.#form = this.#component.querySelector('[name=main-search-box]');
        this.#input = this.#form.querySelector('input[type=search]');
        
        if (!SEARCH_BOX_TYPES.includes(this.#type)) {
            this.#type = DEFAULT_SEARCH_BOX_TYPE;
        }



        // const subComponent = this.#component.querySelector(`[rel=js-${PREFIX}${NAME}-${this.#type}]`);
        // console.log( subComponent );
        

        // if (this.#type == 'modal') {
        //     // this.#component.querySelector(`[rel=js-${PREFIX}${NAME}-${this.#type}]`);
        // }


        // console.log( this.#component );
        // console.log( this.#id );
        // console.log( this.#type );
        // console.log( this.#form );
        // console.log( this.#input );
        console.log( '-----' );
        


        this.#form.onclick = event => {
            event.stopImmediatePropagation();
            this.#input.focus();
        }

        this.#input.onfocus = event => {
            event.stopImmediatePropagation();

            // switch (this.#type) {
            //     case 'modal':
            //     case 'full-page':
            //     default:  
            // }



            // const subComponent = this.#component.querySelector(`[rel=js-${PREFIX}${NAME}-${this.#type}]`);

            // switch (this.#type) 
            // {
            //     // If search-box type is "modal"
            //     case 'modal':
            //         selector = this.#component.querySelector(`[rel=js-${PREFIX}${NAME}-modal]`);
    
            //         if (selector) {
            //             this.#modal = new ModalComponent(selector);
            //             this.#modal.open(this.#onModalOpen.bind(this));
            //         }
            //         console.log(this.#type);
            //     break;
    
            //     // If search-box type is "full-page"
            //     case 'full-page':
            //         selector = this.#component.querySelector(`[rel=js-${PREFIX}${NAME}-page]`);
    
            //     break;
            
            //     // If search-box type is "basic"
            //     default:  
            //         this.#component.classList.add('focus');
            //     break;
            // }
        }

        this.#input.onblur = event => {
            event.stopImmediatePropagation();
            this.#component.classList.remove('focus');
        }

        


        // if (!this.#form) {
        //     return;
        // }





        // Shortcut Event

        const shortcut = this.#component.dataset.shortcut ?? SEARCH_BOX_SHORTCUT;

        if (shortcut.length) document.addEventListener('keydown', (event) => {
            if ((event.ctrlKey || event.metaKey) && event.key === shortcut) {
                event.preventDefault();
                this.#input.focus();
            }
        });


        // Main Input focus/blur

        // this.#component.addEventListener('click', event => {
        //     event.stopImmediatePropagation();
        //     this.#input.focus();
        // })

        // Main input focus
        // this.#input.addEventListener('focus', this.#focus.bind(this))

        // Main input blur
        // this.#input.addEventListener('blur', this.#blur.bind(this));
    }

    // #doOnFocus(event)
    // {
    //     event.stopImmediatePropagation();
    // }






    

    #submission()
    {
        this.#modal?.close();


        // const query = this.#input.value;
        
        // this.history = query;
        // // console.log(this.#input);
        // console.log(query);

        // this.#form.submit();
    }

    
    // /**
    //  * On main input focus
    //  * 
    //  * @param {*} event 
    //  */
    // #focus(event) {
    //     event.stopImmediatePropagation();

    //     let selector;

    //     switch (this.#type) 
    //     {
    //         // If search-box type is "modal"
    //         case 'modal':
    //             selector = this.#component.querySelector(`[rel=js-${PREFIX}${NAME}-modal]`);

    //             if (selector) {
    //                 this.#modal = new ModalComponent(selector);
    //                 this.#modal.open(this.#onModalOpen.bind(this));
    //             }
    //             console.log(this.#type);
    //         break;

    //         // If search-box type is "full-page"
    //         case 'full-page':
    //             selector = this.#component.querySelector(`[rel=js-${PREFIX}${NAME}-page]`);

    //         break;
        
    //         // If search-box type is "basic"
    //         default:  
    //             this.#component.classList.add('focus');
    //         break;
    //     }
    // }

    /**
     * On main input blur
     * 
     * @param {*} event 
     */
    // #blur(event) {
    //     event.stopImmediatePropagation();
    //     this.#component.classList.remove('focus');
    // }

    /**
     * 
     * @param {*} modal 
     */
    #onModalOpen(modal)
    {
        const form = modal.querySelector('form');
        const input = form.querySelector('input[type=search]');

        // Copy parent value to modal value
        input.value = this.#input.value;
        input.focus();

        form.addEventListener('submit', event => {
            event.stopImmediatePropagation();
            event.preventDefault();
            this.#submission();
        });
        input.addEventListener('input', event => {
            event.stopImmediatePropagation();
            this.#input.value = input.value;
            // this.#refreshSuggestions(event.target.value);
        });
    }


    get id() {return this.#id}

    onFocus(fn) {if (typeof fn == 'function') (fn)(this)}
    onBlur(fn) {if (typeof fn == 'function') (fn)(this)}
    onSubmit(fn) {if (typeof fn == 'function') (fn)(this)}
    onReset(fn) {if (typeof fn == 'function') (fn)(this)}
}

export function searchBoxList()
{
    return all;
}

document.querySelectorAll(SELECTOR).forEach(node => all.push(new SearchBoxComponent(node)));



// searchBoxList().forEach(sb => {
//     console.group('Search Box');
//     console.log(`ID : ${sb.id}`);
//     console.groupEnd();
// });