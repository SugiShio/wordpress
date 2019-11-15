import Vue from 'vue'
import ParallaxBox from './components/parallaxBox.vue'
import YoutubeLoader from './components/youtubeLoader.vue'
import WorksLoader from './components/worksLoader.vue'
Vue.component('parallax-box', ParallaxBox)
Vue.component('youtube-loader', YoutubeLoader)
Vue.component('works-loader', WorksLoader)
window.addEventListener('load', () => {
  if (!document.getElementById('app')) return
  new Vue({
    el: '#app'
  })
})
