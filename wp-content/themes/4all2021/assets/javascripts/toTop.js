const bottomOffset = 20
class ToTop {
  constructor() {
    this.$el = $('#js-to_top')
    this.height = this.$el.outerHeight()
    this.setFixedPos()
    let timer = null

    this.$el.on('click', () => {
      $('body,html').animate({ scrollTop: 0 }, 400, 'swing')
      return false
    })
    $(window)
      .on('scroll', () => {
        this.setStyle()
      })
      .on('resize', () => {
        clearTimeout(timer)
        timer = setTimeout(() => {
          this.setFixedPos()
        }, 300)
      })
  }

  setStyle() {
    const scrollPos = $(window).scrollTop()

    if (100 < scrollPos) this.$el.addClass('is-show')
    else this.$el.removeClass('is-show')

    if (this.fixedPos < scrollPos) this.$el.addClass('is-fixed')
    else this.$el.removeClass('is-fixed')
  }

  setFixedPos() {
    this.fixedPos =
      $('html').outerHeight() -
      window.innerHeight -
      $('.u-footer').outerHeight()
    this.setStyle()
  }
}
export default ToTop
