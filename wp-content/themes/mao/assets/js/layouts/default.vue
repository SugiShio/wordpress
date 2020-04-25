<template lang="pug">
div
  .m-container
    |default layout
    slot
  mao-menu
</template>

<script>
import maoMenu from '../components/menu/index.vue'
export default {
  components: { maoMenu }
}
</script>

<style>
</style>

<style lang="scss" scoped>
.m-container {
  background-color: rgba(#fff, 0.25);
  max-width: 800px;
  margin: auto;
  height: 100%;
}
</style>
