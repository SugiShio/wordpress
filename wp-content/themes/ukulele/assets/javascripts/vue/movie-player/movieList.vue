<template lang="pug">
section
  player(v-if='isWindowOpen')
  ul.u-movie-list
    li.u-movie-list__item(v-for='item in items')
      movie-item(
      :item='item'
      )
</template>

<script>
import movieItem from './movieItem.vue'
import player from './player.vue'
export default {
  components: { movieItem, player },
  props: ['items'],
  computed: {
    isWindowOpen() {
      return this.$store.getters.isWindowOpen
    }
  }
}
</script>
