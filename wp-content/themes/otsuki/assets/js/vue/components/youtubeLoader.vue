<template lang="pug">
div.o-content
  ul.list
    li.item(v-for='item in items')
      .title
        span {{ item.title }}
      img(:src='`http://img.youtube.com/vi/${item.youtubeId}/maxresdefault.jpg`')
  .loading(v-if='isLoading') Loading...
  .link(
    v-else-if='hasMore'
    @click='fetchItems') 
      a more
</template>

<script>
import axios from 'axios'
export default {
  data() {
    return {
      items: [],
      query: {
        page: 1,
        per_page: 10
      },
      isLoading: true,
      total: 0
    }
  },
  computed: {
    hasMore() {
      return this.items.length < this.total
    }
  },
  created() {
    this.fetchItems()
  },
  methods: {
    fetchItems() {
      this.isLoading = true
      axios({
        method: 'get',
        url: `/wp-json/wp/v2/videos`,
        params: this.query
      })
        .then(response => {
          this.setItems(response.data)
          this.total = response.headers['x-wp-total']
          this.query.page++
        })
        .catch(error => {
          throw error
        })
        .finally(() => {
          this.isLoading = false
        })
    },
    setItems(items) {
      items.forEach(item => {
        this.items.push({
          title: item.title.rendered,
          youtubeId: item.youtube_id
        })
      })
    }
  }
}
</script>

<style lang="scss" scoped>
@import '../../../sass/_variables.scss';
.list {
  margin: 30px 0;
}

.item {
  margin: 30px 0;
  position: relative;
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

  &:hover {
    opacity: 0.8;
    color: #fff;
  }
}

.loading {
  text-align: center;
}

.link {
  text-align: center;
  color: $color-main;
  text-decoration: underline;

  a {
    cursor: pointer;
    transition: 0.3s;
  }
}
</style>