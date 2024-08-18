<template lang="pug">
.u-menu-item(
@mouseleave='isHover=false'
@mouseover='isHover=true'
)
  transition(
  name='slide-fade'
  mode='out-in'
  )
    span(
    v-if='isHover'
    key='showDisable'
    v-html='disabledLabel'
    )
    span(
    v-else
    key='showDefault'
    v-html='item.label'
    )
</template>

<script>
export default {
  props: ['item', 'disabledLabel'],
  data() {
    return {
      isHover: false
    }
  }
}
</script>
