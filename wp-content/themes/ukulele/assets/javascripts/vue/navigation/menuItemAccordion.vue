<template lang="pug">
div
  .u-menu-item(@click='toggleOpen' hover)
    span(
    v-html='item.label'
    )
    i.icon-down(:class='{ "is-open": isOpen }')
  .u-menu-item__container(v-if='isOpen')
    a.u-menu-item(
    v-for='(url, index) in item.urls'
    :href='url'
    ) {{ item.labels[index] }}

</template>

<script>
export default {
  props: ['item'],
  data() {
    return {
      isOpen: false
    }
  },
  methods: {
    toggleOpen() {
      this.isOpen = !this.isOpen
    }
  }
}
</script>
