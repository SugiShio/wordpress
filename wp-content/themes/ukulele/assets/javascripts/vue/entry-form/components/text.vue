<template lang="pug">
.u-form-table__input-item(:class='{"is-error": error}')
  input(
  :name='item.name+"_"+n'
  :placeholder='placeholder'
  :type="item.type"
  v-model='value'
  @blur='validate(n)'
  )
  p.u-form-table__error(v-if='error') {{ error }}
</template>

<script>
import ukuleleI18n from '../lang'
export default {
  props: {
    item: Object,
    doValidate: Boolean,
    error: [String, Boolean],
    n: Number,
    validate: Function
  },
  computed: {
    lang() {
      return this.$store.state.lang
    },
    placeholder() {
      return ukuleleI18n(this.item.placeholder, this.lang)
    }
  },
  data() {
    return {
      value: ''
    }
  },
  watch: {
    value(value) {
      this.$store.commit('setData', {
        n: this.n,
        name: this.item.name,
        value
      })
    },
    doValidate(value) {
      if (!value) return
      this.validate(this.n)
    }
  },
  beforeDestroy() {
    this.$emit('item-destroyed', this.item.name)
  }
}
</script>
