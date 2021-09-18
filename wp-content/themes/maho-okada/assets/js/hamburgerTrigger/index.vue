<template lang="pug">
  .mo-hamburger-trigger(@click='$emit("menu-trigger-clicked")')
    .mo-hamburger-trigger__line(:class='{ isMenuOpen }')
    .mo-hamburger-trigger__line(:class='{ isMenuOpen }')
    .mo-hamburger-trigger__line(:class='{ isMenuOpen }')
</template>

<script>
export default {
  name: 'MahoHamburgerTrigger',
  props: {
    isMenuOpen: { type: Boolean, required: true }
  }
}
</script>

<style lang="scss">
@import '../../sass/variables';
@import '../../sass/utils';

.mo-hamburger-trigger {
  position: fixed;
  top: 0;
  left: 0;
  background-color: rgba(#fff, 0.8);
  width: 50px;
  height: 50px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  z-index: $z-index-hamburger-trigger;

  @include screen-lg {
    display: none;
  }

  &__line {
    width: 25px;
    height: 1px;
    background-color: $color-text;
    &:nth-child(1).isMenuOpen {
      transition: transform 0.3s;
      transform: rotate(45deg);
      transform-origin: 0 0;
    }

    &:nth-child(2) {
      margin: 8px 0;
      transition: opacity 0.3s;

      &.isMenuOpen {
        opacity: 0;
      }
    }
    &:nth-child(3).isMenuOpen {
      transition: transform 0.3s;
      transform: rotate(-45deg);
      transform-origin: 0 0;
    }
  }
}
</style>
