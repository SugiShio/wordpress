<template lang="pug">
.mo-worksLoader
  ul.mo-worksLoader__list
    li.mo-worksLoader__item(
      v-for='item in items'
      @click='setModalItem(item)'
      :class='{ "v-loading": !item.title }')
      template(v-if='item.imageSrc')
        .mo-worksLoader__title
          span {{ item.title }}
        img(:src='item.imageSrc')
      template(v-else)
        span {{ item.title }}
  fetch-component(
    :post-type='postType'
    :base-url='baseUrl'
    :per-page='12'
    @start-loading='setEmptyItem'
    @fetch-succeed='setItems'
  )

  .mo-modal
    .mo-modal__bg(
      v-show='!!modalItem.title'
      @click='onClose')
      .mo-modal__wrapper(ref='modalContainer')
        .mo-modal__container
          span.mo-modal__close(@click='onClose') close
          h3.mo-modal__title {{ modalItem.title }}
          time.mo-modal__year(:datetime='modalItem.updatedAt') {{ modalItem.year }}
          img.mo-modal__image(:src='modalItem.imageSrc')
          .mo-modal__content(v-html='modalItem.content')

</template>

<script>
import fetchComponent from './fetchComponent.vue'
import { decNumRefToString } from '../utils'
export default {
  components: { fetchComponent },
  props: { baseUrl: String, postType: String },
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
          content: decNumRefToString(item.content.rendered),
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

<style lang="scss">
@import '../../sass/variables';
@import '../../sass/markdown';

.mo-worksLoader {
  &__list {
    margin: 30px auto;

    @media screen and (min-width: 400px) {
      display: flex;
      flex-wrap: wrap;
      width: 380px;
    }

    @media screen and (min-width: 590px) {
      width: 570px;
    }
  }

  &__item {
    margin: 80px auto;
    width: 70vw;
    height: 70vw;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: 0.3s;
    cursor: pointer;

    @media screen and (min-width: 400px) {
      margin: 20px;
      width: 150px;
      height: 150px;
    }

    span {
      display: block;
      padding: 5px;
      text-align: center;
    }
  }

  &__title {
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
    background-color: rgba(#000, 0.5);

    &:hover {
      opacity: 1;
      color: #fff;
      text-shadow: 0 0 5px #000;
    }
  }
}

.mo-modal {
  &__bg {
    background-color: rgba(#000, 0.93);
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  &__close {
    align-self: flex-end;
    text-decoration: underline;
    padding: 5px;
    cursor: pointer;
    transition: 0.3s;
    color: $color-text-weak;

    &:hover {
      opacity: 0.6;
    }
  }

  &__wrapper {
    width: 90vw;
    max-height: 90vh;
    margin: auto;
    padding: 20px;
    background-color: #fff;
    overflow: scroll;
  }

  &__container {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }

  &__title {
    margin: 10px 0;
    font-size: 22px;
    text-align: center;
    color: $color-text;
  }

  &__year {
    margin: 10px 0;
    color: $color-text-weak;
  }

  &__image {
    margin: 20px auto;
    max-width: 50%;
  }

  &__content {
    @extend %mo-markdown;
    margin: 20px 0;
    color: $color-text;
  }
}
</style>
