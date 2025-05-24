<template lang="pug">
div
  h2.u-entry__title {{ entryTitle }}
  ul.u-form-table
    li.u-form-table__row
      .u-form-table__head {{ i18n.department }}
      .u-form-table__input
        .u-form-table__input-item
          i(:class='classes')
          | {{ department.label }} {{ i18n.department }}
          input(
          type='hidden'
          name='department'
          :value='department.label'
          )
    li.u-form-table__row(v-for='item in items')
      .u-form-table__head {{ i18n.items[item.key].name }}
        .u-form-table__description(v-if='item.description') {{ i18n.items[item.key].description }}
      .u-form-table__input
        ukulele-input(
        :item='item'
        )
  template(v-if='fee > 0')
    h2.u-entry__title {{ paymentTitle }}
    ul.u-form-table
      li.u-form-table__row
        .u-form-table__head {{ i18n.paymentAmount }}
        .u-form-table__input
          | {{ fee.toLocaleString() }}円

      li.u-form-table__row
        .u-form-table__head {{ i18n.paymentMethod }}
        .u-form-table__input
          .u-form-table__input-item
            span.horizontal-item
              label
                input(type='radio' :value='paymentMethods[0]' v-model='paymentMethodLocal')
                span.u-form-table__radio {{ i18n.bankTransfer }}
            span.horizontal-item
              label
                input(type='radio' :value='paymentMethods[1]' v-model='paymentMethodLocal')
                span.u-form-table__radio {{ i18n.creditCard }}
      li.u-form-table__row(v-if='isPaymentMethodBankTransfer')
        .u-form-table__input
          | {{ i18n.bankTransferAnnouncement }}
      template(v-else)
        li.u-form-table__row
          .u-form-table__head {{ i18n.cardNumber }}
          .u-form-table__input
            payment-form(
            :get-stripe-token='getStripeToken'
            :fee='fee'
            @got-token-succeeded='goNext'
            @got-token-failed='getStripeToken=false'
            )
  .u-form-checkbox
    label.u-form-checkbox__body
      input(type='checkbox' v-model='agreed')
      span.u-form-checkbox__box
      span.u-form-checkbox__text {{ i18n.agreeToTerm }}
    ul.u-form-buttons
      li.u-form-buttons__item(@click='goBack')
        a {{ i18n.returnToDepartmentSelection }}
      li.u-form-buttons__item.u-form-buttons__item--primary(
      @click='preGoNext'
      :class='{"is-active": isButtonActive }'
      )
        a {{ buttonLabel }}
</template>

<script>
import UkuleleInput from '../components/ukuleleInput.vue'
import {
  COMPONENTS,
  FORM_CONFIG,
  PAYMENT_METHODS
} from '../constants/constants.js'

import ukuleleI18n from '../lang'
export default {
  components: { ...COMPONENTS, UkuleleInput },
  data() {
    return {
      agreed: false,
      getStripeToken: false,
      isSending: false,
      paymentMethodLocal: PAYMENT_METHODS[0] // default payment method
    }
  },
  computed: {
    buttonLabel() {
      return this.isSending ? this.i18n.loading : this.i18n.toConfirm
    },
    classes() {
      return ['icon-' + this.department.value, 'color-' + this.department.value]
    },
    department() {
      return this.$store.getters.department
    },
    entryTitle() {
      return ukuleleI18n('entryInfo', this.lang)
    },
    fee() {
      if (!this.department.value) return
      return FORM_CONFIG[this.department.value].fee
    },
    i18n() {
      const items = {}
      this.items.forEach(item => {
        items[item.key] = {
          name: ukuleleI18n(item.key || item.name, this.lang),
          description: ukuleleI18n(item.description, this.lang)
        }
      })
      const keys = [
        'agreeToTerm',
        'paymentMethod',
        'paymentAmount',
        'creditCard',
        'bankTransfer',
        'bankTransferAnnouncement',
        'cardNumber',
        'department',
        'loading',
        'returnToDepartmentSelection',
        'toConfirm'
      ]
      const result = {}
      keys.forEach(key => {
        result[key] = ukuleleI18n(key, this.lang)
      })
      return { ...result, items }
    },
    isButtonActive() {
      return this.agreed && this.isAbleToGoNext && !this.isSending
    },
    isPaymentMethodBankTransfer() {
      return this.$store.getters.isPaymentMethodBankTransfer
    },
    items() {
      if (!this.department.value) return []
      return FORM_CONFIG[this.department.value].items
    },
    lang() {
      return this.$store.state.lang
    },
    paymentTitle() {
      return ukuleleI18n('paymentInfo', this.lang)
    },
    paymentMethods() {
      return PAYMENT_METHODS
    },
    isAbleToGoNext() {
      return this.$store.getters.isAbleToGoNext
    }
  },
  watch: {
    paymentMethodLocal(paymentMethod) {
      this.$store.commit('setPaymentMethod', { paymentMethod })
    }
  },
  methods: {
    goNext() {
      this.isSending = false
      if (this.isButtonActive) {
        this.$store.dispatch('goNext')
        this.$nextTick(() => {
          this.$store.dispatch('scroll')
        })

        window.history.pushState(null, null, './entry-confirm')
      }
    },
    goBack() {
      this.$store.dispatch('goBack')
      this.$nextTick(() => {
        this.$store.dispatch('scroll')
      })

      window.history.go(-1)
    },
    preGoNext() {
      if (!this.isButtonActive) return
      this.isSending = true
      this.$store
        .dispatch('validate')
        .then(() => {
          this.$store.commit('setDoValidate', false)
          this.getStripeToken = true
          if (this.isAbleToGoNext) {
            if (!this.fee || this.$store.getters.isPaymentMethodBankTransfer)
              this.goNext()
          }
        })
        .then(() => {
          this.getStripeToken = false
          if ($('.is-error')[0])
            $('.is-error')[0].scrollIntoView({ behavior: 'smooth' })
        })
    }
  }
}
</script>
