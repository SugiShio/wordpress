let SmoothScroll = require('./smoothScroll');
let Hamburger = require('./hamburger');
let SlickSettings = require('./slickSettings');
$(function() {
  $(window).on('load', function() {
    new SmoothScroll();
    new Hamburger();
    new SlickSettings();
  });
});
