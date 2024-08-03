// ***************************** DevBrain Theme ***************************** //
// *
// *    Components: Accordion
// *
// ************************************************************************** //

const SELECTOR          = '.accordion';
const CLASS_NAME_ACTIVE = 'show';

export default class AccordionComponent
{
    #node;
    #panels;
    
    constructor(node)
    {
        this.#node = node;
        this.#panels = this.#node.querySelectorAll('.accordion-panel');
        
        for(let i=0; i < this.#panels.length; i++) {

            const panel = this.#panels[i];
            const button = this.#panels[i].querySelector('.accordion-button');

            if (panel.classList.contains(CLASS_NAME_ACTIVE))
                this.#show(panel);

            button?.addEventListener('click', x => {
                x.preventDefault();
                x.stopImmediatePropagation();

                if (this.#node.dataset.rule == 'collection')
                {
                    this.#reset();
                }

                this.#toggle(panel);
            });
        }
    }

    #reset()
    {
        for(let i=0; i < this.#panels.length; i++) {
            this.#hide(this.#panels[i]);
        }
    }

    #toggle(panel)
    {
        panel.classList.contains(CLASS_NAME_ACTIVE)
            ? this.#hide(panel)
            : this.#show(panel)
        ;
    }

    #show(panel)
    {
        const content = panel.querySelector('.accordion-content');
        content.style.maxHeight = `${content.scrollHeight}px`;
        panel.classList.add(CLASS_NAME_ACTIVE);
    }

    #hide(panel)
    {
        const content = panel.querySelector('.accordion-content');
        content.style.maxHeight = null;
        panel.classList.remove(CLASS_NAME_ACTIVE);
    }
}

document.querySelectorAll(SELECTOR).forEach(node => new AccordionComponent(node));