<template lang="pug">
div
  ul.list
    li.item(
      v-for='item in items'
      @click='setModalItem(item)')
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

  .modal-bg(
    v-show='!!modalItem.title'
    @click='onClose')
    .modal-wrapper(ref='modalContainer')
      .modal-container
        span.modal-close(@click='onClose') close
        h3.modal-title {{ modalItem.title }}
        time.modal-year(:datetime='modalItem.updatedAt') {{ modalItem.year }}
        img.modal-image(:src='modalItem.imageSrc')
        .modal-content(v-html='modalItem.content')

</template>

<script>
import fetchComponent from './fetchComponent.vue'
export default {
  components: { fetchComponent },
  data() {
    return {
      items: [],
      modalItem: {}
    }
  },
  methods: {
    setItems(items) {
      items.forEach(item => {
        this.items.push({
          title: item.title.rendered,
          content: item.content.rendered,
          imageSrc: item.image,
          year: item.year,
          updatedAt: item.date
        })
      })
    },
    setModalItem(item) {
      this.modalItem = item
    },
    onClose() {
      this.modalItem = {}
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

.modal-bg {
  background-color: rgba(#000, 0.93);
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: $z-index-modal;
}

.modal-close {
  align-self: flex-end;
  text-decoration: underline;
  padding: 5px;
  cursor: pointer;
  transition: 0.3s;

  &:hover {
    opacity: 0.6;
  }
}

.modal-wrapper {
  width: 90vw;
  max-height: 90vh;
  margin: auto;
  padding: 20px;
  background-color: #fff;
  overflow: scroll;
}

.modal-container {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.modal-title {
  margin: 10px 0;
  font-size: 22px;
  text-align: center;
}

.modal-year {
  margin: 10px 0;
  color: $color-weak;
}

.modal-image {
  margin: 20px auto;
  max-width: 50%;
}

.modal-content {
  margin: 20px 0;
}
</style>
