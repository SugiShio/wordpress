<template lang="pug">
.youtubeItem(:style='backgroundStyle')
  .youtubeItem__title(:class='{ "showThumbnail": item.showThumbnail }')
    span {{ item.title }}

</template>

<script>
export default {
  props: { item: Object },
  computed: {
    backgroundStyle() {
      if (!this.item.showThumbnail) return
      const imageUrl =
        this.item.thumbnail ||
        `http://img.youtube.com/vi/${this.item.youtubeId}/maxresdefault.jpg`
      return {
        backgroundImage: `url("${imageUrl}")`
      }
    }
  }
}
</script>

<style lang="scss" scoped>
.youtubeItem {
  height: 100%;
  background-size: cover;
  background-position: center;

  &__title {
    display: flex;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    transition: 0.3s;
    cursor: pointer;
    justify-content: center;
    align-items: center;
    background-color: rgba(#000, 0.5);
    text-align: center;
    color: #fff;
    &.showThumbnail {
      opacity: 0;
    }

    &:hover {
      opacity: 1;
      text-shadow: 0 0 5px #000;
    }
  }
}
</style>
