<template lang="pug">
.u-form-table__input-item(:class='{"is-error": error}')
  .u-row
    input(
    :name='item.name+"_"+n'
    :placeholder='placeholder'
    :type="item.type"
    v-model='value'
    @blur='validate(n)'
    )
  .u-row
    input(
    :placeholder='placeholderComfirm'
    :type="item.type"
    v-model='confirmValue'
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
    },
    placeholderComfirm() {
      const forConfirm = ukuleleI18n('forConfirm', this.lang)
      return `${this.placeholder} ( ${forConfirm} )`
    }
  },
  data() {
    return {
      value: '',
      confirmValue: ''
    }
  },
  watch: {
    value(value) {
      this.setData()
    },
    confirmValue(value) {
      this.setData()
    },
    doValidate(value) {
      if (!value) return
      this.validate(this.n)
    }
  },
  methods: {
    setData() {
      this.$store.commit('setData', {
        n: this.n,
        name: this.item.name,
        value: this.value,
        confirmValue: this.confirmValue
      })
    }
  },
  beforeDestroy() {
    this.$emit('item-destroyed', this.item.name)
  }
}
</script>
