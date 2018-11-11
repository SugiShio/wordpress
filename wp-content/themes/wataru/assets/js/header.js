const HEADER_CLASS = 'js-header'
const MAIN_CLASS = 'js-main'
const FIXED_CLASS = 'is-fixed'

class Header {
  constructor() {
    this.$header = $('.'+HEADER_CLASS)
    this.headerHeight = this.$header.innerHeight()
    this.breakpoint = $('.'+MAIN_CLASS).offset().top

    $(window).on('scroll', () => {
      if($(window).scrollTop() > this.breakpoint) {
        // todo アニメーション
        this.$header.addClass(FIXED_CLASS)
      } else {
        this.$header.removeClass(FIXED_CLASS)
      }
    })
  }
}

$(function() {
  if(!$('.'+HEADER_CLASS)[0] || !$('.'+MAIN_CLASS)[0]) return
  new Header();
})
