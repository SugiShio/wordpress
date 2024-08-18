const Vue = require('vue')
const BREAK_POINT = 1000
import Vuex from 'vuex'
Vue.use(Vuex)

const store = new Vuex.Store({
  state: {
    isWindowOpen: false,
    windowMovieId: ''
  },
  getters: {
    isWindowOpen: state => {
      return state.isWindowOpen
    },
    windowMovieId: state => {
      return state.windowMovieId
    }
  },
  mutations: {
    openWindow(state) {
      state.isWindowOpen = true
    },
    closeWindow(state) {
      state.isWindowOpen = false
    },
    setWindowMovieId(state, payload) {
      state.windowMovieId = payload.id
    }
  }
})

import movieList from './movieList.vue'
export const setMoviePlayer = () => {
  new Vue({
    el: '#movie-player',
    components: { movieList },
    store
  })
}
