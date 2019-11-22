<template lang="pug">
div
  .link(
    v-if='showMore'
    @click='fetchItems')
      a more
</template>

<script>
import axios from 'axios'
export default {
  props: {
    baseUrl: String,
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
    showMore() {
      return !this.isLoading && this.fetchedCount < this.total
    }
  },
  created() {
    axios.defaults.baseURL = this.baseUrl
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
      this.$emit('start-loading')
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
