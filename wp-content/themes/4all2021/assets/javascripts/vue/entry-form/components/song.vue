<template lang="pug">
.u-form-table__input-item(:class='{"is-error": error}')
  .u-row
    input.input(
    :placeholder='songName'
    type="text"
    v-model='title'
    @blur='validate(n)'
    )
    .u-splitter /
    input.input(
    :placeholder='placeholderComposer'
    type="text"
    v-model='composer'
    @blur='validate(n)'
    )
  .u-row.u-row--wrap
    span.mwform-radio-field.horizontal-item(v-for='option in options')
      label
        input(type='radio' :value='option' v-model='type')
        span.u-form-table__radio {{ option }}
  input(
  type='hidden'
  :name='item.name+"_"+n'
  :value='value'
  )
  p.u-form-table__error(v-if='error') {{ error }}
</template>

<script>
import { SONG_TYPES } from '../constants/constants.js'
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
      title: '',
      composer: '',
      type: ''
    }
  },
  computed: {
    lang() {
      return this.$store.state.lang
    },
    value() {
      if (!this.title || !this.composer || !this.type) return ''
      return this.title + ' / ' + this.composer + ' (' + this.type + ')'
    },
    options() {
      return SONG_TYPES.map(type => ukuleleI18n(type, this.lang))
    },
    placeholderComposer() {
      return ukuleleI18n('composer', this.lang)
    },
    songName() {
      return ukuleleI18n('songName', this.lang)
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
    },
    type() {
      this.validate(this.n)
    }
  },
  beforeDestroy() {
    this.$emit('item-destroyed', this.item.name)
  }
}
</script>
