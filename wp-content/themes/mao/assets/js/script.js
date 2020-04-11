import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import index from './pages/index.vue'
import aboutMao from './pages/aboutMao.vue'
import works from './pages/works.vue'
import schedule from './pages/schedule.vue'
import goodFellows from './pages/goodFellows.vue'
import contact from './pages/contact.vue'

const routes = [
  { path: '/', component: index },
  { path: '/about_mao', component: aboutMao },
  { path: '/works', component: works },
  { path: '/schedule', component: schedule },
  { path: '/good_fellows', component: goodFellows },
  { path: '/contact', component: contact }
]

const router = new VueRouter({
  mode: 'history',
  routes
})

document.addEventListener('DOMContentLoaded', () => {
  new Vue({
    router
  }).$mount('#app')
})
