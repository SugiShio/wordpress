module.exports = class SmoothScroll {
  constructor() {
    $(function(){
       $('a[href^=#]').click(function() {
          const speed = 400;
          const href= $(this).attr("href");
          const target = $(href == "#" || href == "" ? 'html' : href);
          let position = target.offset().top;
          if($(window).width() < 768)
            position -= $('.js-header').outerHeight();

          $('body, html').animate({ scrollTop: position }, speed, 'swing');
          return false;
       });
    });
  }
}
