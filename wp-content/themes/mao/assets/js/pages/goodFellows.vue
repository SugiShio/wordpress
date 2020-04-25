<template lang="pug">
ul.m-goodFellows
  li.m-goodFellows__item(v-for='fellow in fellows')
    .m-goodFellows__head
      h3.m-goodFellows__name {{ fellow.name }}
      span {{ fellow.title }}
    .m-goodFellows__content(
      v-if='fellow.content'
      v-html='fellow.content'
      )
    ul.m-goodFellows__sns(v-if='fellow.sns.length')
      li(v-for='item in fellow.sns')
        | {{ item }}
</template>

<script>
import axios from 'axios'
import Fellow from '../models/fellow.js'
export default {
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
    margin-bottom: 50px;
  }

  &__content,
  &__sns {
    margin: 10px 0;
  }

  &__name {
    display: inline-block;
    font-size: 24px;
    font-weight: bold;
    margin-right: 10px;
  }
}
</style>
