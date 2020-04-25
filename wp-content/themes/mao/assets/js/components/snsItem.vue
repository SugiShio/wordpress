<template lang="pug">
a.m-sns(
  :href='url'
  target='_blank')
  i.m-sns__icon(:class='iconClassName')
  span.m-sns__label {{ label }}
</template>

<script>
const PLACEHOLDER = '##ID##'
const URL_BASE = {
  instagram: `https://www.instagram.com/${PLACEHOLDER}`,
  twitter: `https://twitter.com/${PLACEHOLDER}`,
  facebook: `https://www.facebook.com/${PLACEHOLDER}`,
  youtube: `https://www.youtube.com/channel/${PLACEHOLDER}`
}
export default {
  props: {
    item: { type: Object, required: true }
  },
  computed: {
    iconClassName() {
      return `icon-${this.item.media}`
    },
    label() {
      return this.item.media === 'web' ? 'Web site' : this.item.body
    },
    url() {
      return this.item.media === 'web'
        ? this.item.body
        : URL_BASE[this.item.media].replace(PLACEHOLDER, this.item.body)
    }
  }
}
</script>

<style lang="scss" scoped>
.m-sns {
  display: flex;
  align-items: center;
  &__icon {
    margin-right: 5px;
    font-size: 22px;
  }

  &__label {
    font-size: 12px;
    letter-spacing: 0;
  }
}
</style>
