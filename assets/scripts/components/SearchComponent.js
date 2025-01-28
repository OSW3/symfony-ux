// ************************************************************************** //
// *
// *    Components: Searchbar
// *
// ************************************************************************** //
"use strict";

import { parseBoolean } from "../utils/parseBoolean";
import { getPrefix } from "../utils/generated";
import ModalComponent from "./ModalComponent";
// import ButtonComponent from "./ButtonComponent";


/** @var string Component classname */
const NAME = 'search';

/** @var string Components prefix */
const PREFIX = getPrefix();

/** @var string Component selector */
const SELECTOR = `[rel=js-${PREFIX}${NAME}]`;


const SHORTCUT_ENABLED = true;
const SHORTCUT_KEY = 'K';
// const MODAL_ENABLED = true;
// const AUTOCOMPLETE_ENABLED = true;

const STORAGE_ID = 'searchHistory';


export default class SearchComponent 
{
    #node; // This Search Component
    #id; // This Search Component ID
    #form; // This Search Component -> form tag
    #input; // This Search Component -> input tag
    #modal; // Modal Component
    #suggestions = [];
    
    constructor(node)
    {
        this.#node = node;
        this.#id = this.#node.id;

        this.#form = this.#node.querySelector('form');
        // this.#form = document.querySelector(`#${id} > form`);
        
        if (!this.#form) {
            return;
        }

        this.#input = this.#form.querySelector('input[type=search]');
        // const withAutocomplete = parseBoolean(this.#input.dataset.autocomplete, AUTOCOMPLETE_ENABLED)
        



        // Shortcut

        const shortcutKey = this.#node.dataset.shortcutKey ?? SHORTCUT_KEY;

        if (parseBoolean(this.#node.dataset.shortcut, SHORTCUT_ENABLED)) {
            document.addEventListener('keydown', (event) => {
                if ((event.ctrlKey || event.metaKey) && event.key === shortcutKey) {
                    event.preventDefault();
                    this.#input.focus();
                }
            });
        }


        //  Suggestion

        this.#input.addEventListener('input', event => {
            event.stopImmediatePropagation();
            this.#refreshSuggestions(event.target.value);
            // this.#refreshSuggestions.bind(this);
        });


        // Submission

        this.#node.addEventListener('submit', event => {
            event.stopImmediatePropagation();
            event.preventDefault();
            this.#submission();
        });


        // With Modal

        const modalSelector = this.#node.querySelector(`[rel=js-${PREFIX}${NAME}-modal]`);
        const listSelector = this.#node.querySelector(`[rel=js-${PREFIX}${NAME}-suggest]`);

        if (this.#node.dataset.type == 'modal' && modalSelector) {
            this.#input.addEventListener('focus', (event) => {
                event.stopImmediatePropagation();
                // event.preventDefault();
                this.#modal = new ModalComponent(modalSelector);
                this.#modal.open(this.#onModalOpen.bind(this));
            })

            // console.log(listSelector);
            
        } 
        else if (this.#node.dataset.type == 'list' && listSelector) {
            this.#input.addEventListener('focus', (event) => {
                event.stopImmediatePropagation();
                this.#focus();
                listSelector.style.display = 'block';
            })
            // this.#node.addEventListener('mouseout', (event) => {
            //     listSelector.style.display = 'none';
            // })
            // console.log(listSelector);
        }
        else {
            this.#input.addEventListener('focus', (event) => {
                event.stopImmediatePropagation();
                this.#focus();
            })
        }

        this.#input.addEventListener('blur', (event) => {
            event.stopImmediatePropagation();
            this.#blur();
        })
    }

    #focus()
    {
        this.#node.classList.add('focus');

        console.log( 'focus parent' );
    }
    #blur()
    {
        this.#node.classList.remove('focus');
    }

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
            this.#refreshSuggestions(event.target.value);
        });
    }

    #refreshSuggestions(expression)
    {
        const listSelector = this.#node.querySelector(`[rel=js-${PREFIX}${NAME}-suggest]`);

        // if (listSelector)
        // {
        //     listSelector.innerHTML = '';
            
        //     this.#suggestions.push(expression);
        //     this.#suggestions.forEach(suggestion => {
        //         let item = document.createElement('li');
        //             item.textContent = suggestion;
                
        //         listSelector.prepend(item);
        //     })
        // }
    }

    #submission()
    {
        const query = this.#input.value;

        this.#modal?.close();
        
        this.history = query;
        // console.log(this.#input);
        console.log(query);

        // this.#form.submit();
    }

    #history() 
    {
    }

    set history(query)
    {
        let history = JSON.parse(localStorage.getItem(STORAGE_ID)) || [];

        if (!history.includes(query)) 
        {
            history.push(query);
            localStorage.setItem(STORAGE_ID, JSON.stringify(history));
        }
    }

    get history()
    {
        return JSON.parse(localStorage.getItem(STORAGE_ID)) || [];
    }

    get id() {
        return this.#id;
    }

    onFocus(fn)
    {
        if (typeof fn == 'function') (fn)(this);
    }
}

const searchBoxes = [];
document.querySelectorAll(SELECTOR).forEach(node => searchBoxes.push(new SearchComponent(node)));


// searchBoxes.forEach(box => {
//     if (box.id === 'my-custom-search') {

//         console.log(box.id);
//         box.onFocus(() => console.log(box.history));

//     }
// });








    // // script.js
    // document.addEventListener('DOMContentLoaded', () => {
    //     const searchBar = document.querySelector('[rel=js-ux-search] > input');
    //     const autocompleteList = document.getElementById('autocomplete-list');
    //     const suggestions = ['Apple', 'Banana', 'Orange', 'Strawberry', 'Mango', 'Grapes', 'Pineapple'];
    
    
        // Autocomplétion
    //     searchBar.addEventListener('input', function () {
    //         const query = this.value.toLowerCase();
    //         autocompleteList.innerHTML = '';
    
    //         if (query) {
    //             const filteredSuggestions = suggestions.filter(item => item.toLowerCase().startsWith(query));
    //             if (filteredSuggestions.length > 0) {
    //                 autocompleteList.style.display = 'block';
    //                 filteredSuggestions.forEach(item => {
    //                     const li = document.createElement('li');
    //                     li.textContent = item;
    //                     li.addEventListener('click', function () {
    //                         searchBar.value = this.textContent;
    //                         autocompleteList.style.display = 'none';
    //                     });
    //                     autocompleteList.appendChild(li);
    //                 });
    //             } else {
    //                 autocompleteList.style.display = 'none';
    //             }
    //         } else {
    //             autocompleteList.style.display = 'none';
    //         }
    //     });
    
    //     // Cacher la liste d'autocomplétion quand on clique ailleurs
    //     document.addEventListener('click', function (e) {
    //         if (e.target !== searchBar) {
    //             autocompleteList.style.display = 'none';
    //         }
    //     });
    // });