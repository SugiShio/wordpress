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
.button {
  display: block;
  max-width: 200px;
  margin: 10px auto;
}

.error {
  text-align: center;
}
</style>
