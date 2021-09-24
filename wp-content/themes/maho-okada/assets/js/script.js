import Vue from 'vue'
import MahoContactForm from './contactForm/index.vue'
import MahoHamburgerTrigger from './hamburgerTrigger/index.vue'
import MahoHeader from './header/index.vue'
import MahoParallaxItem from './parallaxItem/index.vue'
import MahoWorksLoader from './worksLoader/index.vue'
const MOUNT_POINT = 'js-maho'

document.addEventListener('DOMContentLoaded', () => {
  const el = document.getElementById(MOUNT_POINT)
  if (!el) return

  new Vue({
    el,
    components: {
      MahoContactForm,
      MahoHamburgerTrigger,
      MahoHeader,
      MahoParallaxItem,
      MahoWorksLoader
    },
    data() {
      return {
        isHeaderFixed: false,
        isMenuOpen: false
      }
    },
    methods: {
      setIsHeaderFixed({ isHeaderFixed }) {
        this.isHeaderFixed = isHeaderFixed
      },
      toggleIsMenuOpen() {
        this.isMenuOpen = !this.isMenuOpen
      }
    }
  })
})
