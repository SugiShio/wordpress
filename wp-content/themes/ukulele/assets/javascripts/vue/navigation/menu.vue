<template lang="pug">
  ul.u-menu
    li.u-menu__item(
    v-for='item in items'
    )
      component(
      :is='type(item)'
      :item='item'
      :disabled-label='disabledLabel'
      )

</template>

<script>
export default {
  components: {
    menuItem: require('./menuItem.vue').default,
    menuItemAccordion: require('./menuItemAccordion.vue').default,
    menuItemDisabled: require('./menuItemDisabled.vue').default
  },
  props: ['items', 'disabledLabel'],
  methods: {
    type(item) {
      if (item.disabled) return 'menuItemDisabled'
      if (item.type === 'accordion') return 'menuItemAccordion'
      return 'menuItem'
    }
  }
}
</script>
