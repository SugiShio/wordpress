<template lang="pug">
  .u-trigger-button(
  @click='toggleIsNavigationOpen'
  :class='classList'
  )
    span
    span
    span
    .u-trigger-button__text {{ label }}
</template>

<script>
export default {
  computed: {
    isOpen() {
      return this.$store.getters.isNavigationOpen
    },
    classList() {
      return this.isOpen ? ['is-open'] : []
    },
    label() {
      return this.isOpen ? 'CLOSE' : 'MENU'
    }
  },
  methods: {
    toggleIsNavigationOpen() {
      this.$store.commit('toggleIsNavigationOpen')
    }
  },
  beforeCreate() {
    this.$store.commit('resetIsNavigation')
  }
}
</script>
