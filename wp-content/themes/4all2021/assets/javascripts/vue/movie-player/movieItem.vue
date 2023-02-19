<template lang="pug">
div
  .u-movie-list__thumbnail(@click='openMovieWindow(item.id)')
    img(:src='thumbnailUrl')
    i.icon-play
  h3.u-movie-list__title {{ item.title }}
</template>

<script>
export default {
  props: ['item'],
  methods: {
    openMovieWindow(id) {
      this.$store.commit('setWindowMovieId', { id: id })
      this.$store.commit('openWindow')
    }
  },
  computed: {
    thumbnailUrl() {
      return 'http://i.ytimg.com/vi/' + this.item.id + '/mqdefault.jpg'
    }
  }
}
</script>
