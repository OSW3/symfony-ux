// ***************************** DevBrain Theme ***************************** //
// *
// *    Components: Carousel
// *
// ************************************************************************** //
// *
// *    <div rel="js-carousel">
// *
// ************************************************************************** //

import AbstractComponent from "./AbstractComponent";

const SELECTOR               = '[rel=js-carousel]';
const SELECTOR_SLIDES        = ".carousel-slide";
const SELECTOR_INDICATORS    = ".carousel-indicator";

const STATE_ACTIVE           = 'active';
const STATE_PREV             = 'prev';
const STATE_NEXT             = 'next';

const CLASS_SLIDE_ACTIVE     = 'active';
const CLASS_SLIDE_NEXT       = 'slide-next';
const CLASS_SLIDE_PREV       = 'slide-prev';
const CLASS_SLIDE_START      = 'slide-start';
const CLASS_SLIDE_END        = 'slide-end';
const CLASS_INDICATOR_ACTIVE = 'active';

export default class CarouselComponent extends AbstractComponent
{
    // loop;
    slides;
    controls;
    // indicators;

    constructor(node)
    {
        super(node);


        this.slides = this.node.querySelectorAll(SELECTOR_SLIDES);
        console.log(this.slides);

        this.controls = document.querySelectorAll(`[data-controls][data-target=${this.id}]`);
        console.log( this.controls );
        this.controls.forEach(control => control.addEventListener('click', event => {
            event.preventDefault();
            event.stopImmediatePropagation();

            // let targetCarousel = event.target.dataset.target;
            // let direction = event.target.dataset.controls;

            console.log( this.slides );
            // console.log( event.target );
            // console.log( direction + ' -- ' + targetCarousel );
            // console.log( `Current ${this.current}` );

        }));


        this._generateIndicators();
        this.indicators = this.node.querySelectorAll(SELECTOR_INDICATORS);
        this.indicators.forEach(indicator => indicator.addEventListener('click', event => {
            event.preventDefault();
            event.stopImmediatePropagation();

        }));
    }

    gotTo(index)
    {
        console.log(`Go To ${index}`);
    }


    // get current()
    // {
    //     let current;

    //     this.slides.forEach((slide, index) => {
    //         console.log(slide);
    //         if (slide.classList.contains(CLASS_SLIDE_ACTIVE))
    //         {
    //             current = index;
    //         }
    //     })

    //     return current;
    // }

    /**
     * Generate Indicator elements
     * 
     * @return void
     */
    _generateIndicators()
    {
        const container = this.node.querySelector('.carousel-indicators');

        this.slides.forEach((slide, index) => {
            let indicator = document.createElement('div');
                indicator.classList.add('carousel-indicator');
                indicator.textContent = index;
            
            container.append(indicator);
        })
    }
}

document.querySelectorAll(SELECTOR).forEach(node => new CarouselComponent(node));