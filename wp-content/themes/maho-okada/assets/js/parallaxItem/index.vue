<template lang="pug">
  .mo-parallaxItem(:class='{isShow}')
    slot

</template>

<script>
export default {
  props: {
    parallaxRate: { type: Number, default: 0.05 }
  },
  data() {
    return {
      isShow: false
    }
  },
  mounted() {
    this.elHeight = this.$el.scrollHeight
    this.basePosition = window.innerHeight * 0.5
    this.setWindowHeight()
    this.setTranslateY()
    this.setIsShow()

    window.addEventListener('resize', () => {
      this.setWindowHeight()
    })
    window.addEventListener('scroll', () => {
      this.setTranslateY()
      this.setIsShow()
    })
  },
  methods: {
    setIsShow() {
      const shouldShow =
        this.windowHeight * 0.7 > this.$el.getBoundingClientRect().top
      if (shouldShow) this.isShow = true
    },
    setTranslateY() {
      const elPosition =
        this.$el.getBoundingClientRect().top + this.elHeight * 0.5
      const translateY = (elPosition - this.basePosition) * this.parallaxRate
      this.$el.style.transform = `translateY(${translateY}%)`
    },
    setWindowHeight() {
      this.windowHeight =
        window.innerHeight || document.documentElement.clientHeight
    }
  }
}
</script>
