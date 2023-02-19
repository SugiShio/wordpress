<template lang="pug">
.u-form-table__input-item(:class='{"is-error": error}')
  .u-row
    input.input(
    :placeholder='namePlaceholder'
    type="text"
    v-model='name'
    @blur='validate(n)'
    )
    .u-splitter /
    input.input(
    :placeholder='partPlaceholder'
    type="text"
    v-model='part'
    @blur='validate(n)'
    )
    input(
    type='hidden'
    :name='item.name+"_"+n'
    :value='value'
    )
  .u-form-table__error(v-if='error') {{ error }}

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
  data() {
    return {
      name: '',
      part: ''
    }
  },
  computed: {
    lang() {
      return this.$store.state.lang
    },
    namePlaceholder() {
      switch (this.n) {
        case 1:
          return ukuleleI18n('nameOfRepresentative', this.lang)
        case 2:
          return ukuleleI18n('nameOfSubRepresentative', this.lang)
        default:
          return ukuleleI18n('nameOfParticipant', this.lang).replace(
            '${index}',
            this.n
          )
      }
    },
    partPlaceholder() {
      return ukuleleI18n('part', this.lang)
    },
    value() {
      if (!this.name || !this.part) return ''
      return this.name + ' (' + this.part + ')'
    }
  },
  watch: {
    doValidate(value) {
      if (!value) return
      this.validate(this.n)
    },
    value(value) {
      this.$store.commit('setData', {
        n: this.n,
        name: this.item.name,
        value
      })
    }
  },
  beforeDestroy() {
    this.$emit('item-destroyed', this.item.name)
  }
}
</script>
