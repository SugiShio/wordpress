<template lang="pug">
.u-form-table__input-item(:class='{"is-error": error}')
  .u-form-table__input-stripe
    #card-element
    input(
    type='hidden'
    name='stripeToken'
    :value='tokenId'
    )
  p.u-form-table__error(v-if='error') {{ error }}

</template>

<script>
import { STRIPE_STYLE } from '../constants/constants.js'
let stripe, elements, card

export default {
  props: ['getStripeToken'],
  data() {
    return {
      tokenId: '',
      error: ''
    }
  },
  mounted() {
    this.$store.commit('setValidationResult', {
      key: 'payment-form',
      value: [true]
    })
    const pk = document.getElementById('stripe-pk').dataset.pk || ''
    stripe = Stripe(pk)
    elements = stripe.elements()
    card = elements.create('card', { style: STRIPE_STYLE })
    card.mount('#card-element')
    card.addEventListener('change', event => {
      this.storeValidationResult(event.error ? event.error.message : false)
    })
  },
  watch: {
    getStripeToken(value) {
      if (!value) return
      stripe.createToken(card).then(result => {
        this.storeValidationResult(result.error ? result.error.message : false)
        if (result.error) {
          this.$emit('got-token-failed')
        } else {
          this.tokenId = result.token.id
          const card = result.token.card
          this.$store.commit('setData', {
            n: 1,
            name: 'cardNumber',
            value: '**** **** **** ' + card.last4
          })
          this.$store.commit('setData', {
            n: 1,
            name: 'cardExp',
            value: card.exp_year + '/' + card.exp_month
          })
          this.$store.commit('setData', {
            n: 1,
            name: 'cvc',
            value: '****'
          })
          this.$store.commit('setData', {
            n: 1,
            name: 'amount',
            value: '2,000円'
          })
          this.$emit('got-token-succeeded')
        }
      })
    }
  },
  methods: {
    storeValidationResult(error) {
      this.error = error
      this.$store.commit('setValidationResult', {
        index: 0,
        key: 'payment-form',
        value: this.error
      })
    }
  }
}
</script>
