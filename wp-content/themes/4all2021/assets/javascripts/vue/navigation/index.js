const Vue = require('vue')
const BREAK_POINT = 1000
import Vuex from 'vuex'
Vue.use(Vuex)

const store = new Vuex.Store({
  state: {
    isWide: window.innerWidth > BREAK_POINT,
    isNavigationOpen: false
  },
  getters: {
    isNavigationOpen: state => {
      return state.isNavigationOpen
    },
    isWide: state => {
      return state.isWide
    }
  },
  mutations: {
    setIsWide(state, payload) {
      state.isWide = payload.isWide
    },
    toggleIsNavigationOpen(state) {
      state.isNavigationOpen = !state.isNavigationOpen
    },
    resetIsNavigation(state) {
      state.isNavigationOpen = false
    }
  }
})

import navigation from './navigation.vue'
import entryButton from './entryButton.vue'
import triggerButton from './triggerButton.vue'
import ukuleleMenu from './menu.vue'
import languageSelector from './languageSelector.vue'
export const setNavigation = () => {
  new Vue({
    el: '#navigation',
    components: {
      navigation,
      entryButton,
      triggerButton,
      ukuleleMenu,
      languageSelector
    },
    store,
    created() {
      let timer = null
      window.addEventListener(
        'resize',
        () => {
          clearTimeout(timer)
          timer = setTimeout(() => {
            this.$store.commit('setIsWide', {
              isWide: window.innerWidth > BREAK_POINT
            })
          }, 300)
        },
        false
      )
    },
    computed: {
      isWide() {
        return this.$store.getters.isWide
      }
    }
  })
}
