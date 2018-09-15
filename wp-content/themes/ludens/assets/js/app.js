let SmoothScroll = require('./smoothScroll');
let SlickSettings = require('./slickSettings');
$(function() {
  $(window).on('load', function() {
    new SmoothScroll();
    new SlickSettings();
  });
});
