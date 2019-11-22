<template lang="pug">
div
  ul.list
    li.item(
      v-for='item in items'
      @click='setModalItem(item)'
      :class='{ loading: !item.title }')
      template(v-if='item.youtubeId')
        .title
          span {{ item.title }}
        img(:src='`http://img.youtube.com/vi/${item.youtubeId}/maxresdefault.jpg`')
  fetch-component(
    post-type='videos'
    :base-url='baseUrl'
    @start-loading='setEmptyItem'
    @fetch-succeed='setItems'
  )
  .modal-bg(
    v-show='!!modalItem.title'
    @click='onClose')
    .modal-container(ref='modalContainer')
      span.modal-close(@click='onClose') close
      iframe.modal-video(
        :src='`https://www.youtube.com/embed/${modalItem.youtubeId}?controls=0`'
        frameborder='0'
        allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'
        allowfullscreen
        )
      h3.modal-title {{ modalItem.title }}
</template>

<script>
import fetchComponent from './fetchComponent.vue'
import { decNumRefToString } from '../../utils'
export default {
  components: { fetchComponent },
  props: { baseUrl: String },
  data() {
    return {
      items: [],
      modalItem: {}
    }
  },
  methods: {
    setEmptyItem() {
      this.items.push({})
    },
    setItems(items) {
      this.items.pop()
      items.forEach(item => {
        this.items.push({
          title: decNumRefToString(item.title.rendered),
          youtubeId: item.youtube_id
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
  margin: 80px 0;
}

.item {
  margin-bottom: 150px;
  position: relative;
  margin: 0 auto 25vw;
  width: 80vw;
  height: 45vw;

  @media screen and (min-width: 620px) {
    margin: 0 auto 150px;
    width: 600px;
    height: 337.5px;
  }
  &.loading {
    animation: 1s loading infinite alternate;
  }
}

@keyframes loading {
  0% {
    background-color: lighten($color-text, 70%);
  }
  100% {
    background-color: lighten($color-text, 67%);
  }
}

.title {
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
  opacity: 0;
  background-color: #000;
  text-align: center;

  &:hover {
    opacity: 0.8;
    color: #fff;
  }
}

.modal-bg {
  background-color: rgba(#000, 0.93);
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: $z-index-modal;
}

.modal-close {
  align-self: flex-end;
  color: #fff;
  text-decoration: underline;
  padding: 10px 5px;
  cursor: pointer;
  transition: 0.3s;

  &:hover {
    opacity: 0.6;
  }
}

.modal-container {
  width: 90vw;
  height: 100vh;
  margin: auto;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.modal-video {
  width: 90vw;
  height: 50.625vw;
}

.modal-title {
  margin-top: 10px;
  color: #fff;
  font-size: 16px;
  text-align: center;
}
</style>
