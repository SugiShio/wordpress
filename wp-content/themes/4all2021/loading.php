<script>
window.addEventListener("load", () => {
  var MOUNT_POINT = "js-loading"
  var el = document.getElementById(MOUNT_POINT);
  if (!el) return;

  el.classList.add("fadeout")
  setTimeout(() => {
    el.remove()
  }, 300);
});
</script>

<div id="js-loading" class="u-loading">
  <div class="u-loading__container">
    <div class="u-loading__box1"></div>
    <div class="u-loading__box2"></div>
    <div class="u-loading__box3"></div>
    <div class="u-loading__box4"></div>
  </div>
  <div class="u-loading__text">LOADING...</div>
</div>