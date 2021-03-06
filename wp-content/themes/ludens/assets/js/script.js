require('./guideBar');
require('./masonry');
let SmoothScroll = require('./smoothScroll');
let Hamburger = require('./hamburger');
let SlickSettings = require('./slickSettings');
$(function() {
  $(window).on('load', function() {
    new SmoothScroll();
    new Hamburger();
    new SlickSettings();
    $('.loading').fadeOut(300).queue(function() {
      this.remove();
    });
  });
});
