module.exports = class slickSettings {
  constructor() {
    $(function(){
      $('.js-slick').slick({
        autoplay: true,
        autoplaySpeed: 5000,
        arrows: false,
        dots: true,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear'
      });
    });
  }
}
