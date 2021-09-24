import Vue from 'vue'
import MahoHamburgerTrigger from './hamburgerTrigger/index.vue'
import MahoHeader from './header/index.vue'
import MahoWorksLoader from './worksLoader/index.vue'
const MOUNT_POINT = 'js-maho'

document.addEventListener('DOMContentLoaded', () => {
  const el = document.getElementById(MOUNT_POINT)
  if (!el) return

  new Vue({
    el,
    components: { MahoHamburgerTrigger, MahoHeader, MahoWorksLoader },
    data() {
      return {
        isHeaderFixed: false,
        isMenuOpen: false
      }
    },
    created() {
      window.addEventListener('scroll', () => {
        this.isHeaderFixed = 300 < window.scrollY
      })
    },
    methods: {
      toggleIsMenuOpen() {
        this.isMenuOpen = !this.isMenuOpen
      }
    }
  })
})
