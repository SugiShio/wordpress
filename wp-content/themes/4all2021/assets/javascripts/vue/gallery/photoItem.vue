<template lang="pug">
div
  a.u-gallery-list__thumbnail(
  :href='item.url'
  target='_blank'
  )
    img(:src='item.image')
  slot
</template>

<script>
export default {
  props: ['item']
}
</script>
