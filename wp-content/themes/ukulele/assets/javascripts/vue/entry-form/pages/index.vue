<template lang="pug">
div#formTop
  template(
  v-for='n in 3'
  )
    component(
    v-show='n === page'
    :is='"page"+n'
    )
</template>

<script>
import page1 from './page1.vue'
import page2 from './page2.vue'
import page3 from './page3.vue'
export default {
  components: { page1, page2, page3 },
  computed: {
    data() {
      return this.$store.getters.data()
    },
    page() {
      return this.$store.getters.page
    }
  }
}
</script>
