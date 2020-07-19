<template lang="pug">
div
  img(:src='src')
</template>

<script>
export default {
  props: {
    src: { type: String, default: '' }
  }
}
</script>

<style lang="scss" scoped>
</style>
