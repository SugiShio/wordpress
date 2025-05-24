<template lang="pug">
div
  h2.u-entry__title {{ pageTitle }}
  ul.u-form-table
    li.u-form-table__row
      .u-form-table__head {{ i18n.department}}
      .u-form-table__input
        .u-form-table__input-item
          i(:class='classes')
          | {{ department.label }} {{ i18n.department}}
        input(
        name='department'
        :value='department.label'
        type='hidden'
        )
    li.u-form-table__row(v-for='item in items')
      .u-form-table__head {{ i18n[item.key] }}
      .u-form-table__input
        confirm(:item='item')
  template(v-if='fee > 0')
    h2.u-entry__title {{ paymentTitle }}
    ul.u-form-tablecardFormItems
      li.u-form-table__row
        .u-form-table__head {{ i18n.paymentMethod }}
        .u-form-table__input {{ paymentMethodSlected }}

      template(v-if='isPaymentMethodBankTransfer')
        li.u-form-table__row
          .u-form-table__head {{ i18n.paymentAmount }}
          .u-form-table__input
            | {{ fee.toLocaleString() }}円

      template(v-else)
        li.u-form-table__row(v-for='item in cardFormItems')
          .u-form-table__head {{ item.label }}
          .u-form-table__input
            confirm(:item='item')
            input(
              name='fee'
              :value='fee'
              type='hidden'
              )
  ul.u-form-buttons
    li.u-form-buttons__item(@click='goBack')
      a {{ i18n.backToInput }}
    li.u-form-buttons__item.u-form-buttons__item--primary(:class='{"is-active": !isSending }')
      input(
      @click.prevent='onSubmit'
      type='submit'
      name='mwform_bsubmit-156'
      :value='buttonLabel'
      )
</template>

<script>
import { CARD_FORM_ITEMS, FORM_CONFIG } from '../constants/constants.js'
import Confirm from '../components/confirm.vue'
import ukuleleI18n from '../lang'
export default {
  components: { Confirm },
  data() {
    return {
      isSending: false
    }
  },
  computed: {
    buttonLabel() {
      return this.isSending ? this.i18n.posting : this.i18n.submitEntry
    },
    cardFormItems() {
      return CARD_FORM_ITEMS.map(item => {
        return {
          name: item,
          label: ukuleleI18n(item, this.lang)
        }
      })
    },
    classes() {
      return ['icon-' + this.department.value, 'color-' + this.department.value]
    },
    department() {
      return this.$store.getters.department
    },
    fee() {
      return this.formConfig.fee
    },
    formConfig() {
      return this.department.value ? FORM_CONFIG[this.department.value] : {}
    },
    i18n() {
      const result = {}
      this.items.forEach(item => {
        result[item.key] = ukuleleI18n(item.key || item.name, this.lang)
      })
      const keys = [
        'backToInput',
        'department',
        'posting',
        'submitEntry',
        'paymentAmount',
        'paymentMethod',
        'bankTransfer',
        'creditCard'
      ]
      keys.forEach(key => {
        result[key] = ukuleleI18n(key, this.lang)
      })

      return result
    },
    items() {
      return this.formConfig.items || []
    },
    isPaymentMethodBankTransfer() {
      return this.$store.getters.isPaymentMethodBankTransfer
    },
    lang() {
      return this.$store.state.lang
    },
    pageTitle() {
      return ukuleleI18n('confirm', this.lang)
    },
    paymentTitle() {
      return ukuleleI18n('paymentInfo', this.lang)
    },
    paymentMethodSlected() {
      return this.isPaymentMethodBankTransfer
        ? this.i18n.bankTransfer
        : this.i18n.creditCard
    }
  },
  methods: {
    goBack() {
      this.$store.dispatch('goBack')
      this.$nextTick(() => {
        this.$store.dispatch('scroll')
      })
      window.history.go(-1)
    },
    onSubmit() {
      if (this.isSending) return
      this.isSending = true
      this.$store.dispatch('submitData')
    }
  }
}
</script>
