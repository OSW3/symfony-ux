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
const TNS_CONTAINER          = ".carousel-slides";
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
    tns_container;

    constructor(node)
    {
        super(node);

        this.tns_container = this.node.querySelector(TNS_CONTAINER);
        // console.log(this.tns_container);

        this.tns_options = this.node.querySelector('script');
        this.tns_options = JSON.parse(this.tns_options.textContent);
        
        
        const tns_options = Object.assign({
            container: this.tns_container,
            gutter                   : 0,                           // Space between slides (in “px”).
            edgePadding              : 0,                           // Space on the outside (in “px”).
            fixedWidth               : false,                       // width attribute of the slides.
            autoWidth                : false,                       // width of each slide will be its natural width as a inline-block box.
            viewportMax              : false,                       // viewport width for fixedWidth/autoWidth.
            controls                 : false,                       // Show native controls
            controlsPosition         : 'top',                       // Controls position
            controlsText             : [],                          // Controls label
            controlsContainer        : false,                       // The container element/selector around the prev/next buttons
            prevButton               : false,
            nextButton               : false,
            nav                      : false,                       // display the nav indicators
            navPosition              : 'top',                       // Controls nav position
            navContainer             : false,
            navAsThumbnails          : false,                       // Indicate if the dots are thumbnails
            autoplayPosition         : 'top',                       // autoplay position
            autoplayText             : ['start', 'stop'],           // autoplay labels
            autoplayButton           : false,
            autoplayButtonOutput     : false,
            autoHeight               : false,                       // Height of slider container changes according to each slide’s height.
            swipeAngle               : 15,                          // Swipe or drag will not be triggered if the angle is not inside the range when set
            preventActionWhenRunning : true,                        // Prevent next transition while slider is transforming.
            preventScrollOnTouch     : false,                       // Prevent page from scrolling on touchmove
            nested                   : false,
            freezable                : true,
            disable                  : false,
            useLocalStorage          : false,
            nonce                    : false,
            animateDelay             : false
        }, this.tns_options);

        // console.log(tns_options);

        const slider = tns(tns_options);
    }
}

document.querySelectorAll(SELECTOR).forEach(node => new CarouselComponent(node));



// mode: 'carousel',
// axis: 'horizontal',

// gutter: 0,


// items: 1,
// edgePadding: 0,
// fixedWidth: false,
// autoWidth: false,
// viewportMax: false,
// slideBy: 1,
// center: false,
// controls: true,
// controlsPosition: 'top',
// controlsText: ['prev', 'next'],
// controlsContainer: false,
// prevButton: false,
// nextButton: false,
// nav: true,
// navPosition: 'top',
// navContainer: false,
// navAsThumbnails: false,
// arrowKeys: false,
// speed: 300,
// autoplay: false,
// autoplayPosition: 'top',
// autoplayTimeout: 5000,
// autoplayDirection: 'forward',
// autoplayText: ['start', 'stop'],
// autoplayHoverPause: false,
// autoplayButton: false,
// autoplayButtonOutput: true,
// autoplayResetOnVisibility: true,
// animateIn: 'tns-fadeIn',
// animateOut: 'tns-fadeOut',
// animateNormal: 'tns-normal',
// animateDelay: false,
// loop: true,
// rewind: false,
// autoHeight: false,
// responsive: false,
// lazyload: false,
// lazyloadSelector: '.tns-lazy-img',
// touch: true,
// mouseDrag: false,
// swipeAngle: 15,
// nested: false,
// preventActionWhenRunning: false,
// preventScrollOnTouch: false,
// freezable: true,
// onInit: false,
// useLocalStorage: true,
// nonce: false