<template lang="pug">
.background(@click='emitClose')
  .arrowButton(
    @click.stop='emitPrev'
    :class='{disable: isFirst}'
    )
    i.icon.icon-left
  .content
    transition(
      name='fade'
      mode='out-in'
      )
      img.image(
        :key='src'
        :src='src'
        :width='width'
        :height='height'
        )
    .title(v-if='title') {{ title }}
    .closeButton(@click='emitClose') close
  .arrowButton(
    @click.stop='emitNext'
    :class='{disable: isLast}'
    )
    i.icon.icon-right
</template>

<script>
const MAX_IMAGE_RATIO = 0.8
export default {
  props: {
    src: { type: String, default: '' },
    isFirst: { type: Boolean, default: false },
    isLast: { type: Boolean, default: false },
    title: { type: String, default: '' }
  },
  data() {
    return {
      width: null,
      height: null
    }
  },
  created() {
    this.updateWindowSize()
  },
  methods: {
    emitClose() {
      this.$emit('close-button-clicked')
    },
    emitPrev() {
      this.$emit('prev-button-clicked')
    },
    emitNext() {
      this.$emit('next-button-clicked')
    },
    updateWindowSize() {
      this.windowWidth = window.innerWidth
      this.windowHeight = window.innerHeight
    }
  },
  watch: {
    src(value) {
      this.width = null
      this.height = null
      if (!value) return

      const img = new Image()
      img.src = value
      img.onload = () => {
        this.updateWindowSize()
        const imageWidth = img.naturalWidth
        const imageHeight = img.naturalHeight
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
      }
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

.arrowButton {
  font-size: 24px;
  padding: 20px;
  cursor: pointer;
  transition: 0.3s;
  &:hover {
    opacity: 0.6;
  }

  &.disable {
    opacity: 0;
    visibility: hidden;
  }
}
</style>
