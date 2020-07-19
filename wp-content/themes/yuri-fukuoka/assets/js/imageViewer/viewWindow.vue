<template lang="pug">
.background(@click='emitClose')
  .content
    img.image(:src='src')
    .title(v-if='title') {{ title }}
    .closeButton(@click='emitClose') close
</template>

<script>
export default {
  props: {
    src: { type: String, default: '' },
    title: { type: String, default: '' }
  },
  methods: {
    emitClose() {
      this.$emit('close-button-clicked')
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
