<template lang="pug">
  header.mo-header(:class='{ isFixed }')
    slot
</template>

<script>
export default {
  name: 'MahoHeader',
  data() {
    return {
      isFixed: false
    }
  },
  created() {
    window.addEventListener('scroll', () => {
      this.isFixed = 300 < window.scrollY
    })
  }
}
</script>

<style lang="scss">
@import '../../sass/variables';
.mo-header {
  z-index: $z-index-header;
  background-color: rgba(#fff, 0.6);

  &.isFixed {
    position: fixed;
    top: 0;
    right: 0;
    left: 0;
  }
}
</style>
