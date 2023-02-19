<template lang="pug">
.u-button.u-button--entry
  a(
  v-if='isOpen'
  :href='url'
  v-html='text'
  )
  span(
  v-else
  v-html='text'
  )
</template>

<script>
export default {
  props: ['url', 'text', 'state'],
  computed: {
    isOpen() {
      switch (this.state) {
        case 'open':
          return true
        default:
          return false
      }
    }
  }
}
</script>
