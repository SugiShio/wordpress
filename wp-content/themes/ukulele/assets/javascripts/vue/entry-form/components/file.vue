<template lang="pug">
.u-form-table__input-item(:class='{"is-error": error}')
  label.u-form-table__image
    span.u-form-table__image-name(v-if='value') {{ value }}
    .u-form-table__image-button
      | {{ buttonText }}
    input(
    :name='item.name+"_"+n'
    :placeholder='placeholder'
    :type="item.type"
    accept='image/*'
    @change='setValue'
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
  data() {
    return {
      value: ''
    }
  },
  computed: {
    buttonText() {
      return this.value
        ? ukuleleI18n('changePhoto', this.lang)
        : ukuleleI18n('uploadPhoto', this.lang)
    },
    lang() {
      return this.$store.state.lang
    },
    placeholder() {
      return ukuleleI18n(this.item.placeholder, this.lang)
    }
  },
  watch: {
    doValidate(value) {
      if (!value) return
      this.validate(this.n)
    }
  },
  methods: {
    setValue(event) {
      const value = event.target.files[0].name
      this.value = value
      this.$store.commit('setData', {
        n: this.n,
        name: this.item.name,
        value
      })
      this.validate(this.n)
    }
  },
  beforeDestroy() {
    this.$emit('item-destroyed', this.item.name)
  }
}
</script>
