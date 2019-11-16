document.addEventListener('DOMContentLoaded', () => {
  const $header = document.getElementById('js-header')
  window.addEventListener('scroll', () => {
    if (300 < window.scrollY) {
      $header.classList.add('fix')
    } else {
      $header.classList.remove('fix')
    }
  })

  const $navTrigger = document.getElementById('js-nav-trigger')
  const $navCloseTrigger = document.getElementById('js-nav-close-trigger')
  const $nav = document.getElementById('js-nav')
  $navTrigger.addEventListener('click', () => {
    $nav.classList.add('is-open')
  })
  $navCloseTrigger.addEventListener('click', () => {
    $nav.classList.remove('is-open')
  })
})
