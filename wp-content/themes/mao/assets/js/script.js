import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import layoutDefault from './layouts/default.vue'
import contactForm from './components/contactForm.vue'

const routes = [
  { path: '/' },
  {
    path: '/about/',
    meta: { title: 'About Mao' }
  },
  { path: '/works/', meta: { title: 'Works' } },
  {
    path: '/schedule/',
    meta: { title: 'Schedule' }
  },
  {
    path: '/goodfellows/',
    meta: { title: 'Good Fellows' }
  },
  {
    path: '/contact/',
    meta: { title: 'Contact' }
  }
]

const router = new VueRouter({
  mode: 'history',
  routes
})

document.addEventListener('DOMContentLoaded', () => {
  new Vue({
    router,
    components: { layoutDefault, contactForm },
    computed: {
      isTop() {
        return this.$route.path === '/'
      }
    },
    mounted() {
      this.setWindowSize()
      window.addEventListener('resize', () => {
        clearTimeout()
        setTimeout(() => {
          this.setWindowSize()
        }, 300)
      })
    },
    methods: {
      setWindowSize() {
        const width = window.innerWidth
        const height = window.innerHeight
        this.$root.$el.style.width = `${width}px`
        this.$root.$el.style.height = `${height}px`
      }
    }
  }).$mount('#app')
})
