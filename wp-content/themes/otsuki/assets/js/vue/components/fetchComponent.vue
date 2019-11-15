<template lang="pug">
div
  .loading(v-if='isLoading') Loading...
  .link(
    v-else-if='hasMore'
    @click='fetchItems') 
      a more
</template>

<script>
import axios from 'axios'
export default {
  props: {
    postType: {
      type: String,
      required: true
    },
    perPage: {
      type: Number,
      default: 10
    }
  },
  data() {
    return {
      isLoading: true,
      total: 0,
      page: 1,
      fetchedCount: 0
    }
  },
  computed: {
    hasMore() {
      return this.fetchedCount < this.total
    }
  },
  created() {
    this.fetchItems()
  },
  methods: {
    fetchItems() {
      const url = `/wp-json/wp/v2/${this.postType}`
      const params = {
        page: this.page,
        per_page: this.perPage
      }
      this.isLoading = true
      axios({
        method: 'get',
        url,
        params
      })
        .then(response => {
          this.$emit('fetch-succeed', response.data)
          this.total = Number(response.headers['x-wp-total'])
          this.page++
          this.fetchedCount += response.data.length
        })
        .catch(error => {
          throw error
        })
        .finally(() => {
          this.isLoading = false
        })
    }
  }
}
</script>

<style lang="scss" scoped>
@import '../../../sass/_variables.scss';
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