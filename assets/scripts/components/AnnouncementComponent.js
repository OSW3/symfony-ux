// ************************************************************************** //
// *
// *    Components: Announcement
// *
// ************************************************************************** //
// *
// *    <div rel="js-announcement">
// *
// ************************************************************************** //

import AbstractComponent from "../abstracts/AbstractComponent";

const SELECTOR          = '[rel=js-announcement]';
const CLASS_NAME_ACTIVE = 'active';

export default class AnnouncementComponent extends AbstractComponent
{
    constructor(node)
    {
        super(node);
        this.element = node;
    }

    _onInit() 
    {
    }

}

document.querySelectorAll(SELECTOR).forEach(node => new AnnouncementComponent(node));