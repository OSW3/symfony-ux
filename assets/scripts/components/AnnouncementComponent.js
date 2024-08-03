// ***************************** DevBrain Theme ***************************** //
// *
// *    Components: Announcement
// *
// ************************************************************************** //
// *
// *    <div rel="js-announcement">
// *
// ************************************************************************** //

import AbstractComponent from "./AbstractComponent";

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

// // scripts.js
// document.addEventListener('DOMContentLoaded', function () {
//     const announcements = [
//       'Announcement 1',
//       'Announcement 2',
//       'Announcement 3',
//       'Announcement 4'
//     ];
  
//     const announcementText = document.getElementById('announcement-text');
//     let currentIndex = 0;
  
//     function showNextAnnouncement() {
//       // Hide current announcement
//       announcementText.style.opacity = 0;
  
//       setTimeout(() => {
//         // Update text and show next announcement
//         announcementText.textContent = announcements[currentIndex];
//         announcementText.style.opacity = 1;
  
//         // Update index for next announcement
//         currentIndex = (currentIndex + 1) % announcements.length;
//       }, 1000); // Wait for 1 second to complete the fade-out transition
//     }
  
//     // Show the first announcement initially
//     showNextAnnouncement();
  
//     // Change announcement every 5 seconds
//     setInterval(showNextAnnouncement, 5000);
//   });
  