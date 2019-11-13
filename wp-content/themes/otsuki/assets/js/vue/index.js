import Vue from 'vue'
import ParallaxBox from './components/parallaxBox.vue'
import YoutubeLoader from './components/youtubeLoader.vue'
Vue.component('parallax-box', ParallaxBox)
Vue.component('youtube-loader', YoutubeLoader)
window.addEventListener('load', () => {
  if (!document.getElementById('app')) return
  new Vue({
    el: '#app'
  })
})
