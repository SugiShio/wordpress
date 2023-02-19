<template lang="pug">
section.u-player(@click='closeMovieWindow')
  .u-player__container
    .u-player__head
      i.icon-close(@click='closeMovieWindow')
    iframe(
    id='ytplayer'
    type='text/html'
    v-bind='size'
    :src='"https://www.youtube.com/embed/" + windowMovieId + "?&rel=0&showinfo=0&autoplay=1"'
    frameborder='0'
    allow='autoplay'
    allowfullscreen
    )
</template>

<script>
export default {
  computed: {
    windowMovieId() {
      return this.$store.getters.windowMovieId
    },
    size() {
      let width = window.innerWidth * 0.8
      let height = width * 0.5625 // 9/16
      if (window.innerHeight * 0.9 < height) {
        height = window.innerHeight * 0.8
        width = (height * 16) / 9
      }
      return { width, height }
    }
  },
  methods: {
    closeMovieWindow() {
      this.$store.commit('closeWindow')
    }
  }
}
</script>
