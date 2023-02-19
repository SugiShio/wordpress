const Vue = require('vue')
import Vuex from 'vuex'
Vue.use(Vuex)
const store = new Vuex.Store({
  state: {
    ajaxUrl: '',
    isHeartActive: true,
    isHeartClosed: false,
    isPosting: false,
    isWindowOpen: false,
    windowMovieId: ''
  },
  actions: {
    sendHeart: ({ commit, state }, data) => {
      commit('startPosting')
      return $.ajax({
        url: state.ajaxUrl,
        type: 'POST',
        xhrFields: { withCredentials: true },
        dataType: 'json',
        cache: false,
        data: {
          action: 'ghe_give_heart',
          postId: data.postId,
          cat: data.catId
        }
      })
        .then(data => {
          commit('setHeartInactive')
          commit('endPosting')
          return data.count
        })
        .catch(() => {
          this.commit('endPosting')
        })
    }
  },
  getters: {
    isWindowOpen: state => {
      return state.isWindowOpen
    },
    windowMovieId: state => {
      return state.windowMovieId
    },
    isHeartActive: state => {
      return state.isHeartActive
    },
    isPosting: state => {
      return state.isPosting
    }
  },
  mutations: {
    openWindow(state) {
      state.isWindowOpen = true
    },
    closeWindow(state) {
      state.isWindowOpen = false
    },
    setAjaxUrl(state, ajaxUrl) {
      state.ajaxUrl = ajaxUrl
    },
    setWindowMovieId(state, payload) {
      state.windowMovieId = payload.id
    },
    setHeartInactive(state) {
      state.isHeartActive = false
    },
    setHeartClosed(state) {
      state.isHeartClosed = true
    },
    startPosting(state) {
      state.isPosting = true
    },
    endPosting(state) {
      state.isPosting = false
    }
  }
})

import gallery from './gallery.vue'
document.addEventListener('DOMContentLoaded', () => {
  const el = document.getElementById('gallery')
  if (!el) return
  new Vue({
    el,
    components: { gallery },
    store
  })
})
