const Vue = require('vue')
import Vuex from 'vuex'
Vue.use(Vuex)

const store = new Vuex.Store({
  state: {
    page: 1,
    data: {},
    confirmData: {},
    department: {},
    doValidate: false,
    validationResult: {},
    lang: 'ja'
  },
  mutations: {
    deleteValidationResult(state, payload) {
      delete state.validationResult[payload.key]
    },
    setLang(state, { lang }) {
      state.lang = lang
    },
    setPage(state, { page }) {
      state.page = page
    },
    setData(state, payload) {
      if (!state.data[payload.name]) Vue.set(state.data, payload.name, [])
      Vue.set(state.data[payload.name], payload.n - 1, payload.value)

      if (payload.confirmValue) {
        if (!state.confirmData[payload.name])
          Vue.set(state.confirmData, payload.name, [])
        Vue.set(
          state.confirmData[payload.name],
          payload.n - 1,
          payload.confirmValue
        )
      }
    },
    setDepartment(state, { department }) {
      state.department = department
    },
    setSubmit(state) {
      state.submit = true
    },
    setDoValidate(state, doValidate) {
      state.doValidate = doValidate
    },
    setValidationResult(state, payload) {
      if (payload.index !== undefined) {
        Vue.set(
          state.validationResult[payload.key],
          payload.index,
          payload.value
        )
      } else {
        Vue.set(state.validationResult, payload.key, payload.value)
      }
    }
  },
  actions: {
    goNext({ commit, state }) {
      $('#formTop')[0].scrollIntoView({ behavior: 'smooth' })
      commit('setPage', { page: ++state.page })
    },
    goBack({ commit, state }) {
      if (state.page <= 1) return
      $('#formTop')[0].scrollIntoView({ behavior: 'smooth' })
      commit('setPage', { page: --state.page })
    },
    submitData({ commit, state }) {
      document.ukuleleform.submit()
    },
    validate({ commit }) {
      commit('setDoValidate', true)
    }
  },
  getters: {
    page: state => {
      return state.page
    },
    confirmData: state => (name, index = 0) => {
      if (!name) return state.confirmData
      return state.confirmData[name]
        ? state.confirmData[name][index]
        : undefined
    },
    data: state => (name, index = 0) => {
      if (!name) return state.data
      return state.data[name] ? state.data[name][index] : undefined
    },
    department: state => {
      return state.department
    },
    doValidate: state => {
      return state.doValidate
    },
    isAbleToGoNext: state => {
      const keys = Object.keys(state.validationResult)
      if (!keys.length) return
      let values = []
      keys.forEach(key => {
        values = [...values, ...state.validationResult[key]]
      })
      return !values.reduce((a, b) => a || b)
    }
  }
})

import entryForm from './pages/index.vue'
export const setEntryForm = el => {
  const form = $(el).find('form')[0]
  if (!form) return
  form.setAttribute('name', 'ukuleleform')
  const lang = document.getElementById('lang').dataset.lang || 'ja'

  new Vue({
    el: el,
    store,
    components: { entryForm },
    created() {
      store.commit('setLang', { lang })
    }
  })
}
