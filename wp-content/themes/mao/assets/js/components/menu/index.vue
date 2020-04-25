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
.m-menu {
  position: fixed;
  right: 10px;
  bottom: 10px;
  display: flex;
  flex-direction: column;
  align-items: flex-end;
}
</style>
