<template lang="pug">
div(:style='containerStyle')
  img(
    :src='image'
    :style='imageStyle'
    )
</template>

<script>
export default {
  props: {
    image: {
      type: String,
      required: true
    },
    rate: {
      type: Number,
      default: 2.618
    }
  },
  data() {
    return {
      windowWidth: 0,
      windowHeight: 0,
      position: 0
    }
  },
  computed: {
    containerHeight() {
      return this.windowWidth / this.rate
    },
    isInView() {
      return (
        this.position < this.windowHeight &&
        this.position * -1 < this.containerHeight
      )
    },
    containerStyle() {
      return {
        overflow: 'hidden',
        height: `${this.containerHeight}px`
      }
    },
    imageStyle() {
      const rate =
        (2 * this.position - this.windowHeight + this.containerHeight) /
        (this.windowHeight + this.containerHeight)
      return {
        width: '100%',
        transform: `scale(1.2, 1.2) translateY(${rate * 10}%)`
      }
    }
  },
  mounted() {
    const el = this.$el
    this.setWindowSize()
    this.position = el.getBoundingClientRect().top
    window.addEventListener('scroll', () => {
      this.position = el.getBoundingClientRect().top
    })
    window.addEventListener('resize', () => {
      this.setWindowSize()
    })
  },
  methods: {
    setWindowSize() {
      this.windowWidth =
        window.innerWidth || document.documentElement.clientWidth
      this.windowHeight =
        window.innerHeight || document.documentElement.clientHeight
    }
  }
}
</script>