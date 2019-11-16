import Vue from 'vue'
import ParallaxBox from './components/parallaxBox.vue'
import YoutubeLoader from './components/youtubeLoader.vue'
import WorksLoader from './components/worksLoader.vue'
import ContactForm from './components/contactForm.vue'
Vue.component('parallax-box', ParallaxBox)
Vue.component('youtube-loader', YoutubeLoader)
Vue.component('works-loader', WorksLoader)
Vue.component('contact-form', ContactForm)
window.addEventListener('load', () => {
  if (!document.getElementById('app')) return
  new Vue({
    el: '#app'
  })
})
