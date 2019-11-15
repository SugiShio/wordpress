<template lang="pug">
div
  ul.list
    li.item(v-for='item in items')
      template(v-if='item.imageSrc')
        .title
          span {{ item.title }}
        img(:src='item.imageSrc')
      template(v-else)
        span {{ item.title }}
  fetch-component(
    post-type='works'
    :per-page='9'
    @fetch-succeed='setItems'
  )
</template>

<script>
import fetchComponent from './fetchComponent.vue'
export default {
  components: { fetchComponent },
  data() {
    return {
      items: []
    }
  },
  methods: {
    setItems(items) {
      items.forEach(item => {
        this.items.push({
          title: item.title.rendered,
          content: item.content.rendered,
          imageSrc: item.image
        })
      })
    }
  }
}
</script>

<style lang="scss" scoped>
@import '../../../sass/_variables.scss';
.list {
  max-width: 570px;
  margin: 30px auto;
  display: flex;
  flex-wrap: wrap;
}

.item {
  margin: 20px;
  width: 150px;
  height: 150px;
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  transition: 0.3s;
  cursor: pointer;

  &:hover {
    background-color: rgba($color-main, 0.1);
  }

  span {
    display: block;
    padding: 5px;
    text-align: center;
  }
}

.title {
  display: flex;
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 10px;
  transition: 0.3s;
  justify-content: center;
  align-items: center;
  opacity: 0;
  background-color: #000;

  &:hover {
    opacity: 0.8;
    color: #fff;
  }
}

.loading {
  text-align: center;
}
</style>
