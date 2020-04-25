<template lang="pug">
li.m-menuItem
  component(v-bind='bindingData')
    i.m-menuItem__icon(
      v-if='item.iconName'
      :class='iconClassName')
    span(v-else) {{ item.label[0] }}
    span.m-menuItem__remain {{ remain }}
</template>

<script>
export default {
  props: {
    item: {
      type: Object,
      default: () => {
        return {}
      }
    }
  },
  computed: {
    bindingData() {
      return this.item.to
        ? { is: 'routerLink', to: this.item.to }
        : { is: 'a', href: this.item.href, target: '_blank' }
    },
    iconClassName() {
      return `icon-${this.item.iconName}`
    },
    remain() {
      return this.item.iconName ? this.item.label : this.item.label.slice(1)
    }
  }
}
</script>

<style lang="scss" scoped>
.m-menuItem {
  margin: 5px 10px;
  a {
    display: inline-block;
    width: 40px;
    line-height: 40px;
    text-align: center;
    font-size: 16px;
    font-weight: 600;
    font-style: italic;
    color: #fff;

    &:hover {
      width: auto;
      padding: 0 10px;

      .m-menuItem__remain {
        display: inline;
      }
    }
  }

  &__icon {
    font-size: 26px;
    margin-right: 3px;
    &::before {
      vertical-align: middle;
    }
  }

  &__remain {
    display: none;
  }
}
</style>
