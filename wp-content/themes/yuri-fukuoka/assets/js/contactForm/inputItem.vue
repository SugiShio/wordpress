<template lang="pug">
li.item
  label.input-wrapper
    span.label
      span.required(v-if='required') *
      |{{ config.label }}

    .confirmItem(v-show='isConfirm') {{ value }}

    div(v-show='!isConfirm')
      textarea.input(
        v-if='isTextarea'
        :name='config.name'
        :rows='5'
        @input='$emit("input", $event.target.value)'
        ) {{ value }}
      input.input(
        v-else
        :name='config.name'
        :type='config.type'
        :placeholder='config.placeholder'
        :value='value'
        @input='$emit("input", $event.target.value)'
        )
</template>

<script>
export default {
  props: {
    config: {
      type: Object,
      required: true
    },
    isConfirm: {
      type: Boolean,
      required: true
    },
    value: {
      required: true
    }
  },
  computed: {
    isTextarea() {
      return this.config.type == 'textarea'
    },
    required() {
      return this.config.rules && this.config.rules.required
    }
  }
}
</script>

<style lang="scss" scoped>
@import '../../sass/_variables.scss';
.item {
  margin: 20px 0;
}

.label {
  display: block;
  padding: 0 5px;
  letter-spacing: 0;
  @media screen and (min-width: 420px) {
    width: 120px;
    flex-shrink: 0;
    margin-right: 20px;
    padding: 10px 5px;
    text-align: right;
  }
}

.input-wrapper {
  > div {
    width: 100%;
  }
  @media screen and (min-width: 420px) {
    display: flex;
  }
}

.input {
  width: 100%;
  padding: 10px 15px;
  border: 1px solid $color-gray;
  background-color: #fff;
  outline: none;
  appearance: none;
  font-family: $font-default;
}

.confirmItem {
  padding: 0 5px;
  word-break: break-word;

  @media screen and (min-width: 420px) {
    padding: 10px 5px;
  }
}

.required {
  color: $color-main;
  font-weight: bold;
}
</style>
