import Vue from 'vue'
import ParallaxBox from './components/parallaxBox.vue'
Vue.component('parallax-box', ParallaxBox)
window.addEventListener('load', () => {
  if (!document.getElementById('app')) return
  new Vue({
    el: '#app'
  })
})
