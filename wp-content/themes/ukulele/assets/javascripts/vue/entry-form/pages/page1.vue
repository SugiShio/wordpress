<template lang="pug">
div
  h2.u-entry__title {{ pageTitle }}
  ul.u-form-deps
    li.u-form-deps__item(
    v-for='department in departments'
    @click='goNext(department)'
    )
      span
        i.u-form-deps__icon(:class='classes(department.value)')
        span {{ department.label }} {{ i18n.department }}

</template>

<script>
import { DEPARTMENTS } from '../constants/constants.js'
import ukuleleI18n from '../lang'

export default {
  computed: {
    departments() {
      return DEPARTMENTS.map(department => {
        return { value: department, label: ukuleleI18n(department, this.lang) }
      })
    },
    i18n() {
      return { department: ukuleleI18n('department', this.lang) }
    },
    lang() {
      return this.$store.state.lang
    },
    pageTitle() {
      const lang = this.$store.state.lang
      return ukuleleI18n('selectDepartment', lang)
    }
  },
  methods: {
    goNext(department) {
      this.$store.commit('setDepartment', { department })
      this.$store.dispatch('goNext')
      this.$nextTick(() => {
        this.$store.dispatch('scroll')
      })

      window.history.pushState(null, null, '../entry-input')
    },
    classes(department) {
      return ['icon-' + department, 'color-' + department]
    }
  }
}
</script>
