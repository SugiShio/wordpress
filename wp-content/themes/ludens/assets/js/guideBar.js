class GuideBar {
  constructor($el, offsetTop = 100, offsetBottom = 50) {
    this.$el = $el;
    window.onscroll = () => {
      const offset = window.pageYOffset
      const _offsetBottom = $('body').outerHeight() - $(window).height() - offsetBottom
      if(offset > offsetTop && offset < _offsetBottom) {
        this.$el.addClass('is-show')
      } else {
        this.$el.removeClass('is-show')
      }
    }
  }
}

$(function() {
  new GuideBar($('#js-guidebar'))
})
