<template lang="pug">
.background(@click='emitClose')
  .content
    img.image(
      :src='src'
      :width='width'
      :height='height'
      )
    .title(v-if='title') {{ title }}
    .closeButton(@click='emitClose') close
</template>

<script>
const MAX_IMAGE_RATIO = 0.8
export default {
  props: {
    src: { type: String, default: '' },
    title: { type: String, default: '' }
  },
  data() {
    return {
      width: null,
      height: null
    }
  },
  created() {
    this.setWindowSize()
  },
  methods: {
    emitClose() {
      this.$emit('close-button-clicked')
    },
    setWindowSize() {
      this.windowWidth = window.innerWidth
      this.windowHeight = window.innerHeight
    }
  },
  watch: {
    src(value) {
      this.width = null
      this.height = null
      if (!value) return

      this.$nextTick(() => {
        this.setWindowSize()
        const imageElement = this.$el.getElementsByClassName('image')[0]
        const imageWidth = imageElement.width
        const imageHeight = imageElement.height
        if (
          this.windowWidth * MAX_IMAGE_RATIO < imageWidth ||
          this.windowHeight * MAX_IMAGE_RATIO < imageHeight
        ) {
          const ratio = Math.min(
            (this.windowWidth * MAX_IMAGE_RATIO) / imageWidth,
            (this.windowHeight * MAX_IMAGE_RATIO) / imageHeight
          )
          this.width = imageWidth * ratio
          this.height = imageHeight * ratio
        }
      })
    }
  }
}
</script>

<style lang="scss" scoped>
.background {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: rgba(#fff, 0.9);
}

.content {
  height: 90vh;
  width: 90vw;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.image,
.title,
.closeButton {
  margin: 10px 0;
}

.title {
  font-weight: bold;
}

.closeButton {
  text-decoration: underline;
  cursor: pointer;
  transition: opacity 0.3s;

  &:hover {
    opacity: 0.6;
  }
}
</style>
