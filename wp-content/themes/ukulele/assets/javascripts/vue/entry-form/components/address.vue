<template lang="pug">
.u-form-table__input-item(:class='{"is-error": error}')
  .u-row(v-if='isJa')
    input.u-form-table__zipcode(
    placeholder='123-1234'
    type="text"
    v-model='zipcode'
    @blur='validate(n)'
    )
    .u-form-table__loading(v-if='loading') 住所検索中...
  .u-row
    input(
    :placeholder='placeholder'
    type="text"
    v-model='address'
    @blur='validate(n)'
    )
  input#zipcode(
  type='hidden'
  v-model='normalizedZipcode'
  )
  input(
  type='hidden'
  :name='item.name+"_"+n'
  :value='value'
  )
  p.u-form-table__error(v-if='error') {{ error }}
</template>

<script>
import axios from 'axios'
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
      zipcode: '',
      address: '',
      loading: false
    }
  },
  computed: {
    isJa() {
      return this.lang === 'ja'
    },
    lang() {
      return this.$store.state.lang
    },
    placeholder() {
      return ukuleleI18n(this.item.placeholder, this.lang)
    },
    normalizedZipcode() {
      const zipcode = this.zipcode.replace(/[ --－﹣−‐⁃‑‒–—﹘―⎯⏤ー]/g, '')
      if (!/\d{7}/.test(zipcode)) return false
      return zipcode
    },
    value() {
      if (!this.isJa) return this.address
      if (!this.zipcode || !this.address) return ''
      return '〒' + this.zipcode + ' ' + this.address
    }
  },
  watch: {
    normalizedZipcode(value) {
      if (!value) return
      this.loading = true
      axios({
        method: 'GET',
        url: 'https://apis.postcode-jp.com/api/v2/postcodes',
        params: {
          postcode: value,
          apiKey: '#{apiKey}'
        }
      })
        .then(res => {
          if (res.status != 200) throw new Error()
          if (res.data.size) {
            this.address = res.data.data[0].allAddress
          }
          this.loading = false
        })
        .catch(e => {
          this.loading = false
        })
    },
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
