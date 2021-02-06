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
    .y-button.button(
      @click='goToConfirm'
    ) 入力内容の確認

  .buttons(v-show='isConfirm')
    input.y-button.button(
      type='submit'
      name='submit'
      value='送信'
    )
    .y-button.button(@click='backToInput') 修正する

</template>

<script>
import inputItem from './inputItem.vue'
import Validate from './validate'

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
      return
      this.errorMessages = []
      const errors = Validate.validate(this.values, this.contactConfig)
      if (errors.length) {
        this.errorMessages = errors.map(error => {
          return Validate.getErrorMessage(error.type)
        })
      } else {
        this.isConfirm = true
      }
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
  max-width: 200px;
  margin: 10px auto;
}

.error {
  text-align: center;
}
</style>
