<template lang="pug">
.u-form-table__input-item
  div(v-for='value in values')
    | {{ value }}

</template>

<script>
export default {
  props: ['item'],
  computed: {
    values() {
      return this.$store.getters.data()[this.item.name]
    }
  }
}
</script>
