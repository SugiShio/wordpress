<template lang="pug">
div
  ul
    inputItem(
      v-for='config in contactConfig'
      :config='config'
      :key='config.name'
      :isConfirm='isConfirm'
      v-model='values[config.name]'
      )

  ul.error(v-if='errorMessages.length')
    li(v-for='message in errorMessages')
      |{{ message }}

  .bottons(v-show='!isConfirm')
    .button(
      @click='goToConfirm'
    ) 入力内容の確認

  .buttons(v-show='isConfirm')
    input.button(
      type='submit'
      name='submit'
      value='送信'
    )
    .button(@click='backToInput') 修正する

</template>

<script>
import inputItem from './inputItem.vue'

export default {
  props: {
    contactConfig: {
      type: Array,
      required: true
    }
  },
  components: { inputItem },
  data() {
    const values = {}
    this.contactConfig.forEach(item => {
      values[item.name] = ''
    })
    return {
      values,
      isConfirm: false,
      errorMessages: []
    }
  },
  methods: {
    goToConfirm() {
      this.isConfirm = true
    },
    backToInput() {
      this.isConfirm = false
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
  @media screen and (min-width: 400px) {
    width: 120px;
    flex-shrink: 0;
    margin-right: 20px;
    padding: 10px 5px;
    text-align: right;
  }
}

.input-wrapper {
  @media screen and (min-width: 400px) {
    display: flex;
  }
}

.input {
  width: 100%;
  padding: 10px 5px;
  border: 1px solid;
  background-color: #fff;
  outline: none;
  appearance: none;
}

.confirmItem {
  padding: 0 5px;
  word-break: break-word;

  @media screen and (min-width: 400px) {
    padding: 10px 5px;
  }
}

.button {
  display: block;
  width: 100%;
  max-width: 200px;
  margin: 10px auto;
  padding: 8px 10px;
  border: 1px solid;
  background-color: $color-main;
  color: #fff;
  text-align: center;
  cursor: pointer;
  transition: 0.3s;

  &:hover {
    opacity: 0.6;
  }
}

.error {
  text-align: center;
}
</style>
