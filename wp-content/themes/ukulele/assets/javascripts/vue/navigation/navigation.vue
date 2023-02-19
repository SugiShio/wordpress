<template lang="pug">
.u-navigation
  transition(name='fade')
    .u-navigation__background(v-if='isNavigationOpen')
  transition(name='slidein')
    .u-navigation__container(
    v-if='isShow'
    :class='classList'
    )
      slot
</template>

<script>
export default {
  computed: {
    classList() {
      return this.isWide ? ['is-wide'] : ['is-narrow']
    },
    isWide() {
      return this.$store.getters.isWide
    },
    isShow() {
      return this.isWide || this.isNavigationOpen
    },
    isNavigationOpen() {
      return this.$store.getters.isNavigationOpen
    }
  }
}
</script>
