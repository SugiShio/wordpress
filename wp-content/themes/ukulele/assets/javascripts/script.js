global.$ = require('jquery')
import SmoothScroll from './smoothScroll'
import ToTop from './toTop'
require('./vue')
$(function() {
  $(window).on('load', function() {
    new SmoothScroll()
    new ToTop()
  })
})
