<template lang="pug">
div
  ul.list
    li.item(
      v-for='item in items'
      @click='setModalItem(item)'
      :class='{ "v-loading": !item.title }')
      youtube-item(
        v-if='item.youtubeId'
        :item='item'
        )
  fetch-component(
    post-type='videos'
    :base-url='baseUrl'
    @start-loading='setEmptyItem'
    @fetch-succeed='setItems'
    :per-page='12'
  )
  .modal-bg.v-zi-modal(
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
import youtubeItem from './youtubeItem.vue'
import { decNumRefToString } from '../../utils'
export default {
  components: { fetchComponent, youtubeItem },
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
          youtubeId: item.youtube_id,
          showThumbnail: item.show_thumbnail,
          thumbnail: item.thumbnail
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
.list {
  margin: 80px auto;

  @media screen and (min-width: 500px) {
    display: flex;
    flex-wrap: wrap;
    width: 480px;
  }

  @media screen and (min-width: 740px) {
    width: 720px;
  }
}

.item {
  position: relative;
  margin: 0 auto 25vw;
  width: 80vw;
  height: 45vw;

  @media screen and (min-width: 500px) {
    margin: 30px 20px;
    width: 200px;
    height: 112.5px;
  }
}
å .modal-bg {
  background-color: rgba(#000, 0.93);
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
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
