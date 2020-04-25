<template lang="pug">
.m-container
  h2.m-title {{ title }}
  .m-container__inner
    slot(:name='slotName')
  mao-menu
</template>

<script>
import maoMenu from '../components/menu/index.vue'
export default {
  components: { maoMenu },
  computed: {
    title() {
      return this.$route.meta.title
    },
    slotName() {
      return this.$route.meta.isPage
        ? this.title.toLowerCase().replace(' ', '-')
        : 'default'
    }
  }
}
</script>

<style lang="scss" scoped>
.m-title {
  position: fixed;
  padding-left: 50px;
  transform: translateY(-100%) rotate(90deg);
  transform-origin: left bottom;
  font-size: 90px;
  font-style: italic;
  font-weight: 800;
  letter-spacing: -0.02em;
  line-height: 0.65;
}
.m-container {
  &__inner {
    max-width: 800px;
    min-height: 100vh;
    margin: auto;
    padding: 100px;
    background-color: rgba(#fff, 0.25);
  }
}
</style>
