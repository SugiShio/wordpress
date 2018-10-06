module.exports = class Hamburger {
  constructor() {
    this.$triggerOpen = $('.js-hamburger_trigger-open')
    this.$triggerClose = $('.js-hamburger_trigger-close')
    this.$content = $('.js-hamburger_content')
    this.isOpen = false

    this.$triggerOpen.on('click', () => {
      if(this.isOpen) return;
      this.isOpen = true
      this.$content.slideDown()
    })
    this.$triggerClose.on('click', () => {
      if(!this.isOpen) return;
      this.isOpen = false
      this.$content.slideUp()
    })
  }
}
