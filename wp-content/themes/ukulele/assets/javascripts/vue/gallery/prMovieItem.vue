<template lang="pug">
div
  .u-gallery-list__thumbnail.u-gallery-list__thumbnail--movie(@click='openMovieWindow(item.id)')
    img(:src='thumbnailUrl')
    i.icon-play
  a(
  :href='item.url'
  target="_blank"
  )
    slot
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
      return 'http://i.ytimg.com/vi/' + this.item.id + '/hqdefault.jpg'
    }
  }
}
</script>
