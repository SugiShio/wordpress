<template lang="pug">
div
  .u-gallery-list__thumbnail(
  target='_blank'
  )
    img(:src='item.image')
  a(
  :href='item.url'
  target="_blank"
  )
    slot
</template>

<script>
export default {
  props: ['item']
}
</script>
