const CONTENT_ID = 'js-hamburger_content'
const TRIGGER_ID = 'js-hamburger_trigger'
const BG_ID = 'js-hamburger_bg'
const SHOW_CLASS = 'is-shown'

class Hamburger {
  constructor() {
    this.$content = $('#'+CONTENT_ID)
    this.$trigger = $('#'+TRIGGER_ID)
    this.$bg = $('#'+BG_ID)
    this.isShown = false

    this.$trigger.on('click', () => {
      if(this.isShown) {
        this.isShown = false
        this.$content.removeClass(SHOW_CLASS)
        this.$trigger.removeClass(SHOW_CLASS)
        this.$bg.removeClass(SHOW_CLASS)
      } else {
        this.isShown = true
        this.$content.addClass(SHOW_CLASS)
        this.$trigger.addClass(SHOW_CLASS)
        this.$bg.addClass(SHOW_CLASS)
      }
    })
  }
}

$(function() {
  if(!$('#'+CONTENT_ID)[0] || !$('#'+TRIGGER_ID)[0]) return
  new Hamburger();
})
