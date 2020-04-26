<template lang="pug">
ul.m-goodFellows
  li.m-goodFellows__item(v-for='fellow in fellows')
    .m-goodFellows__head
      h3.m-goodFellows__name {{ fellow.name }}
      span.m-goodFellows__title(v-if='fellow.title') {{ fellow.title }}
    .m-goodFellows__content(
      v-if='fellow.content'
      v-html='fellow.content'
      )
    ul.m-goodFellows__sns(v-if='fellow.sns.length')
      li.m-goodFellows__snsItem(v-for='item in fellow.sns')
        sns-item(:item='item')
</template>

<script>
import axios from 'axios'
import snsItem from '../components/snsItem.vue'
import Fellow from '../models/fellow.js'
export default {
  components: { snsItem },
  data() {
    return {
      fellows: []
    }
  },
  created() {
    const url = '/wp-json/wp/v2/good-fellows'
    axios({
      method: 'get',
      url
    })
      .then(response => {
        response.data.forEach(fellow => {
          this.fellows.push(new Fellow(fellow))
        })
      })
      .catch(error => {
        throw error
      })
  }
}
</script>

<style lang="scss" scoped>
.m-goodFellows {
  &__item {
    margin-bottom: 80px;
  }

  &__content,
  &__sns {
    margin: 15px 0;
  }

  &__snsItem {
    margin: 5px 0;
  }

  &__name {
    display: inline-block;
    font-size: 24px;
    font-weight: 800;
    margin-right: 10px;
    line-height: 1.4;
  }

  &__title {
    font-style: italic;
  }
}
</style>
