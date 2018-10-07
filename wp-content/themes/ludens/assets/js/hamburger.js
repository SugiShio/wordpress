module.exports = class Hamburger {
  constructor() {
    this.$triggerOpen = $('.js-hamburger_trigger-open')
    this.$triggerClose = $('.js-hamburger_trigger-close')
    this.$content = $('.js-hamburger_content')
    this.isOpen = false

    this.$triggerOpen.on('click', () => {
      this.isOpen = true
      this.$content.slideDown()
    })
    this.$triggerClose.on('click', () => {
      this.isOpen = false
      this.$content.slideUp()
    })
  }
}
