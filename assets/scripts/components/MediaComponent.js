// ************************************************************************** //
// *
// *    Components: Media
// *
// ************************************************************************** //
"use strict";

// /** @var string Component selector */
// const SELECTOR = `[data-media]`;


// export default class MediaComponent {
// }

// document.querySelectorAll(SELECTOR).forEach(node => new MediaComponent(node));


// Volume
document.querySelectorAll('audio[data-volume],video[data-volume]').forEach(node => node.volume = node.dataset.volume);