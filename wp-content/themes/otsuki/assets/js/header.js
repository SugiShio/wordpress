document.addEventListener("DOMContentLoaded", () => {
  const $header = document.getElementById('js-header')
  window.addEventListener('scroll', () => {
    if (300 < window.scrollY) {
      $header.classList.add("fix")
    } else {
      $header.classList.remove("fix")
    }
  })
})
