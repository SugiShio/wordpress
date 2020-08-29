const MOUNT_POINT = 'js-menu'
const BREAK_POINT = 600

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

  const menuBody = document.getElementsByClassName(`${MOUNT_POINT}_body`)
  const setMenuShow = () => {
    const isWindowWide = BREAK_POINT < window.innerWidth
    ;[].slice.call(menuBody).forEach(item => {
      item.style.display = isWindowWide ? '' : 'none'
    })
  }
  setMenuShow()

  let timeoutId = null
  window.addEventListener('resize', () => {
    if (timeoutId) return
    timeoutId = setTimeout(() => {
      timeoutId = null
      setMenuShow()
    }, 500)
  })
})
