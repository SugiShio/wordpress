import Vue from 'vue'
import viewWindow from './viewWindow.vue'

const MOUNT_POINTS = 'js-gallery'

document.addEventListener('DOMContentLoaded', () => {
  const elements = document.getElementsByClassName(MOUNT_POINTS)
  if (!elements) return

  Array.from(elements).forEach(element => {
    new Vue({
      name: 'imageViewer',
      el: element,
      components: { viewWindow },
      data() {
        return {
          items: [],
          showingIndex: null,
          isShow: false
        }
      },
      computed: {
        isFirst() {
          return this.showingIndex === 0
        },
        isLast() {
          return this.showingIndex === this.items.length - 1
        },
        imageUrl() {
          if (!Number.isInteger(this.showingIndex)) return ''
          return (
            this.items[this.showingIndex].dataset.fullUrl ||
            this.items[this.showingIndex].getAttribute('src')
          )
        }
      },
      mounted() {
        this.items = this.$el.querySelectorAll('img[class^="wp-image-"]')
        Array.from(this.items).forEach((item, index) => {
          item.addEventListener('click', () => {
            this.showingIndex = index
            this.showViewer()
          })
        })
      },
      methods: {
        showNext() {
          if (!this.isShow || this.items.length - 2 < this.showingIndex) return
          this.showingIndex++
        },
        showPrev() {
          if (!this.isShow || this.showingIndex < 1) return
          this.showingIndex--
        },
        showViewer() {
          this.isShow = true
        },
        closeViewer() {
          this.showingIndex = null
          this.isShow = false
        }
      }
    })
  })
})
