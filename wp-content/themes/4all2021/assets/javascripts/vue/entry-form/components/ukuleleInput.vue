<template lang="pug">
.u-form-table__input-item
  .u-row(v-for='n in count')
    component(
    :is='"ukulele-"+item.type'
    :item='item',
    :n='n'
    :do-validate='doValidate'
    :validate='validate'
    :error='errorText(n)'
    @item-destroyed='onItemChanged'
    )
  .u-row(v-if='count < max')
    .u-form-table__add-button(@click='addField') {{ addLabel }}
</template>

<script>
import { COMPONENTS } from '../constants/constants.js'
import { VALIDATORS } from '../logics/validators.js'
import ukuleleI18n from '../lang'
export default {
  components: COMPONENTS,
  props: ['item'],
  data() {
    return {
      count: 1,
      error: []
    }
  },
  computed: {
    lang() {
      return this.$store.state.lang
    },
    values() {
      return this.$store.getters.data[this.item.name] || []
    },
    max() {
      return this.item.max || 1
    },
    doValidate() {
      return this.$store.getters.doValidate
    },
    addLabel() {
      const addLabel = this.item.addLabel
        ? ukuleleI18n(this.item.addLabel, this.lang)
        : ''
      return addLabel.replace('${max}', this.max)
    }
  },
  methods: {
    addField() {
      this.count++
      this.$store.commit('setValidationResult', {
        index: this.count - 1,
        key: this.item.name,
        value: false // todo ほんとはtrueだけど時間ないので後でなおす
      })
    },
    errorText(n) {
      return ukuleleI18n(this.error[n - 1], this.lang)
    },
    onItemChanged(key) {
      this.count = 1
      this.$store.commit('deleteValidationResult', { key })
      this.$store.commit('setValidationResult', {
        key: this.item.name,
        value: new Array(this.count).fill(true)
      })
    },
    validate(n = 1) {
      const index = n - 1
      const value = this.$store.getters.data(this.item.name, index)
      const confirmValue = this.$store.getters.confirmData(
        this.item.name,
        index
      )
      let result = false
      Object.keys(this.item.validate).forEach(key => {
        if (result) return
        result =
          VALIDATORS[key]({
            value,
            config: this.item.validate[key],
            n,
            confirmValue
          }) || result
      })
      this.$set(this.error, n - 1, result)
      this.$store.commit('setValidationResult', {
        index,
        key: this.item.name,
        value: result
      })
    }
  },
  created() {
    this.$store.commit('setValidationResult', {
      key: this.item.name,
      value: new Array(this.count).fill(true)
    })
  }
}
</script>
