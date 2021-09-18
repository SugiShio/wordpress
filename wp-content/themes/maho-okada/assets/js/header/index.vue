<template lang="pug">
  header.mo-header(:class='{ isHeaderFixed, isMenuOpen }')
    slot
</template>

<script>
export default {
  name: 'MahoHeader',
  props: {
    isHeaderFixed: { type: Boolean, required: true },
    isMenuOpen: { type: Boolean, required: true }
  }
}
</script>

<style lang="scss">
@import '../../sass/variables';
@import '../../sass/utils';

.mo-header {
  z-index: $z-index-header;
  background-color: rgba(#fff, 0.6);

  @include screen-sm {
    position: fixed;
    top: 0;
    padding-top: 50px;
    width: 100vw;
    height: 100vh;
    transform: translateY(-100%);
    transition: transform 0.5s;

    &.isMenuOpen {
      transform: translateY(0);
    }
  }

  &.isHeaderFixed {
    position: fixed;
    top: 0;
    right: 0;
    left: 0;
  }
}
</style>
