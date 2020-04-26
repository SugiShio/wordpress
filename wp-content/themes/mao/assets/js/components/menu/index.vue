<template lang="pug">
ul.m-menu
  menu-item(
    v-for='item in menuItems'
    :item='item'
    :key='item.to')

</template>

<script>
import menuItem from './menuItem.vue'
const MENU_ITEMS = [
  { label: 'Top', to: '/' },
  { label: 'About Mao', to: '/about-mao' },
  { label: 'Works', to: '/works' },
  { label: 'Schedule', to: '/schedule' },
  { label: 'Good Fellows', to: '/good-fellows' },
  { label: 'Contact', to: '/contact' },
  {
    label: 'Spotify',
    href: 'https://www.spotify.com/jp/',
    iconName: 'spotify'
  },
  {
    label: 'Apple Music',
    href: 'https://www.apple.com/jp/apple-music/',
    iconName: 'applemusic'
  },
  {
    label: 'Instagram',
    href: 'https://www.instagram.com/',
    iconName: 'instagram'
  }
]
export default {
  components: { menuItem },
  data() {
    return {
      menuItems: MENU_ITEMS
    }
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
