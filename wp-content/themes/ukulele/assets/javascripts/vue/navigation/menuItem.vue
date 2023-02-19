<template lang="pug">
a.u-menu-item(
:href='item.url'
:target='item.target'
v-html='item.label'
)

</template>

<script>
export default {
  props: ['item'],
  computed: {
    target() {
      return this.item.newTab ? '_blank' : '_self'
    }
  }
}
</script>
