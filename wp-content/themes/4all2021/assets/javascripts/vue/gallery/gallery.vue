<template lang="pug">
section
  movie-window(v-if='isWindowOpen')
  ul.u-gallery-list
    li.u-gallery-list__item(
    v-for='item in items'
    :class='{ "u-gallery-list__item--pr" : isPr(item) }'
    )
      gallery-item(
      :item='item'
      :department='department'
      )

</template>

<script>
import movieWindow from '../movie-player/player.vue'
import galleryItem from './galleryItem.vue'
export default {
  components: { movieWindow, galleryItem },
  props: ['ajaxUrl', 'items', 'isHeartActive', 'isHeartClosed', 'department'],
  computed: {
    isWindowOpen() {
      return this.$store.getters.isWindowOpen
    }
  },
  methods: {
    isPr(item) {
      return item.type === 'prMovie' || item.type === 'prImage'
    }
  },
  created() {
    if (!this.isHeartActive) this.$store.commit('setHeartInactive')
    if (this.isHeartClosed) this.$store.commit('setHeartClosed')
    this.$store.commit('setAjaxUrl', this.ajaxUrl)
  }
}
</script>
