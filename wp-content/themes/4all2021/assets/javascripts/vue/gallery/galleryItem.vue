<template lang="pug">
div
  component(
  :is='type'
  :item='item'
  )
    .u-gallery-list__box
      .u-gallery-list__info
        h3.u-gallery-list__item-title
          span.u-gallery-list__tag(
          v-if='!department || !item.department'
          :class='"u-gallery-list__tag--"+item.department'
          ) {{ tagLabel }}
          | {{ item.title }}
        p.u-gallery-list__name(v-if='item.name') by {{ item.name }}
      .u-gallery-list__heart(v-if='department && item.department')
        heart(
          v-if='item.heart'
          :heart='item.heart'
          :cat-id='item.cat_id'
          :post-id='item.post_id'
        )
</template>

<script>
import movieItem from './movieItem.vue'
import photoItem from './photoItem.vue'
import prMovieItem from './prMovieItem.vue'
import prImageItem from './prImageItem.vue'
import heart from './heart.vue'
export default {
  components: { movieItem, photoItem, prMovieItem, prImageItem, heart },
  props: ['item', 'department'],
  computed: {
    type() {
      return this.item.type + 'Item'
    },
    tagLabel() {
      const department = this.item.department
      switch (department) {
        case undefined:
          return 'PR'
        case 'instrument':
          return 'Inst'
        case '4all':
          return '4ALL'
        default:
          return department.slice(0, 1).toUpperCase() + department.slice(1)
      }
    }
  }
}
</script>
