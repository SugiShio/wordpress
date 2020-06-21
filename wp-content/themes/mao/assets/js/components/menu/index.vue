<template lang="pug">
ul.m-menu
  menu-item(
    v-for='item in menuItems'
    :item='item'
    :key='item.to')

</template>

<script>
import menuItem from './menuItem.vue'
export default {
  components: { menuItem },
  props: {
    menuItems: { type: Array, required: true }
  }
}
</script>

<style lang="scss" scoped>
@import '../../../sass/variables.scss';
@import '../../../sass/utils.scss';
.m-menu {
  position: fixed;
  display: flex;
  flex-direction: column;
  @include screen-sm {
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    justify-content: center;
    background-color: rgba(#000, 0.8);
  }
  @include screen-lg {
    right: 10px;
    bottom: 10px;
    align-items: flex-end;
  }
}
</style>
