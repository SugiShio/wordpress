const MOUNT_POINT = 'js-menu'
import Vue from 'vue'

document.addEventListener('DOMContentLoaded', () => {
  const element = document.getElementById(MOUNT_POINT)
  if (!element) return

  // 表示中のページのリンクにマークを追加
  const items = element.getElementsByTagName('a')
  const currentUrl = window.location.href
  ;[].slice.call(items).forEach(item => {
    if (item.getAttribute('href') === currentUrl) {
      item.classList.add('is-current')
    }
  })

  const accordionItems = element.getElementsByClassName(
    `${MOUNT_POINT}_accordion`
  )
  ;[].slice.call(accordionItems).forEach(item => {
    new Vue({
      name: 'accordion',
      el: item,
      data: {
        isOpen: false
      },
      methods: {
        toggleIsOpen() {
          this.isOpen = !this.isOpen
        }
      }
    })
  })
})
