import Vue from 'vue'
const MOUNT_POINT = 'js-maho'
import MahoHeader from './header/index.vue'

document.addEventListener('DOMContentLoaded', () => {
  const el = document.getElementById(MOUNT_POINT)
  if (!el) return

  new Vue({
    el,
    components: { MahoHeader }
  })
})
