import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import layoutDefault from './layouts/default.vue'
import layoutTop from './layouts/top.vue'

import index from './pages/index.vue'
import works from './pages/works.vue'
import goodFellows from './pages/goodFellows.vue'

const routes = [
  { path: '/', component: index },
  {
    path: '/about-mao',
    meta: { title: 'About Mao', isPage: true }
  },
  { path: '/works', component: works, meta: { title: 'Works' } },
  {
    path: '/schedule',
    meta: { title: 'Schedule', isPage: true }
  },
  {
    path: '/good-fellows',
    component: goodFellows,
    meta: { title: 'Good Fellows' }
  },
  {
    path: '/contact',
    meta: { title: 'Contact', isPage: true }
  }
]

const router = new VueRouter({
  mode: 'history',
  routes
})

document.addEventListener('DOMContentLoaded', () => {
  new Vue({
    router,
    components: { layoutDefault, layoutTop },
    data() {
      return {
        layout: 'layoutDefault'
      }
    },
    watch: {
      $route() {
        this.setLayout()
      }
    },
    created() {
      this.setLayout()
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
      setLayout() {
        switch (this.$route.path) {
          case '/':
            this.layout = 'layoutTop'
            return
          default:
            this.layout = 'layoutDefault'
        }
      },
      setWindowSize() {
        const width = window.innerWidth
        const height = window.innerHeight
        this.$root.$el.style.width = `${width}px`
        this.$root.$el.style.height = `${height}px`
      }
    }
  }).$mount('#app')
})
