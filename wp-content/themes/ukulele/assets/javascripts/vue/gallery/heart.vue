<template lang="pug">
.u-heart
  i(
  :class='classes'
  @click='sendHeart'
  )
  .u-heart__count {{ localCount }}
</template>

<script>
export default {
  props: {
    heart: { type: Object, required: true },
    catId: { type: Number, required: true },
    postId: { type: Number, required: true }
  },
  data() {
    return {
      localCount: this.heart.count ? Number(this.heart.count) : 0,
      localClicked: this.heart.is_clicked
    }
  },
  computed: {
    isHeartClosed() {
      return this.$store.state.isHeartClosed
    },
    isHeartActive() {
      return this.$store.getters.isHeartActive
    },
    isPosting() {
      return this.$store.getters.isPosting
    },
    classes() {
      let classes = ['u-heart__icon']

      if (this.heart.is_clicked || this.localClicked) {
        classes.push('icon-heart-fill')
        classes.push('u-heart__icon--clicked')
      } else {
        classes.push('icon-heart')
      }
      if (this.heart.is_active && this.isHeartActive && !this.isHeartClosed) {
        classes.push('u-heart__icon--active')
      }
      return classes
    }
  },
  methods: {
    sendHeart() {
      if (
        !this.isHeartActive ||
        !this.heart.is_active ||
        this.isPosting ||
        this.isHeartClosed
      )
        return

      const data = {
        postId: this.postId,
        catId: this.catId
      }
      this.$store.dispatch('sendHeart', data).then(count => {
        this.localCount = count
        this.localClicked = true
      })
    }
  }
}
</script>
