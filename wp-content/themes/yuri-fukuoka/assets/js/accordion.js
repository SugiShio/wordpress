const MOUNT_POINT = 'js-accordion'
import $ from 'jquery'

document.addEventListener('DOMContentLoaded', () => {
  const elements = document.getElementsByClassName(MOUNT_POINT)
  if (!elements.length) return
  ;[].slice.call(elements).forEach(item => {
    const $item = $(item)
    const trigger = $item.children(`.${MOUNT_POINT}_trigger`)
    const body = $item.children(`.${MOUNT_POINT}_body`)
    trigger.on('click', () => {
      body.animate({ height: 'toggle' }, 300)
    })
  })
})
