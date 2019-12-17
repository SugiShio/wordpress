<template lang="pug">
div
  ul
    li.item
      label.input-wrapper
        span.label.v-c-main お名前
        p.confirmItem(v-show='isConfirm') {{ contact.name }}
        input.input.v-bc-weak.v-c-text.v-ff-serif(
          v-show='!isConfirm'
          type='text'
          name='name'
          v-model='contact.name'
          placeholder='山田 太郎'
        )
    li.item
      label.input-wrapper
        span.label.v-c-main メールアドレス
        p.confirmItem(v-show='isConfirm') {{ contact.email }}
        input.input.v-bc-weak.v-c-text.v-ff-serif(
          v-show='!isConfirm'
          type='email'
          name='email'
          v-model='contact.email'
          placeholder='taro@sample.com'
        )
    li.item
      label.input-wrapper
        span.label.v-c-main お問合せ内容
        p.confirmItem(v-show='isConfirm') {{ contact.body }}
        textarea.input.v-bc-weak.v-c-text.v-ff-serif(
          v-show='!isConfirm'
          name='body'
          v-model='contact.body'
          cols='10'
          rows='5'
          placeholder='演奏、楽曲制作、レッスンのご依頼等 お気軽にご連絡ください。'
        )
    li.item
      .error.v-c-red {{ errorMessage }}
      .button.v-bgc-main.v-bc-main.v-ff-serif(
        v-show='!isConfirm'
        @click='goToConfirm'
      ) 送信内容の確認
      .buttons(v-show='isConfirm')
        input.button.v-bgc-main.v-bc-main.v-ff-serif(
          type='submit'
          name='submit'
          value='送信'
        )
        .button.button--weak.v-c-main(@click='backToInput') 修正する

</template>

<script>
import axios from 'axios'
export default {
  data() {
    return {
      isConfirm: false,
      errorMessage: '',
      contact: {
        name: '',
        email: '',
        body: ''
      }
    }
  },
  methods: {
    goToConfirm() {
      this.errorMessage = ''
      if (!this.contact.name || !this.contact.email || !this.contact.body) {
        this.errorMessage = '全ての項目を入力してください。'
        return
      }
      const emailRegexp = new RegExp(
        /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/
      )
      if (!emailRegexp.test(this.contact.email)) {
        this.errorMessage = '正しいメールアドレスを入力してください。'
        return
      }

      this.isConfirm = true
    },
    backToInput() {
      this.isConfirm = false
    }
  }
}
</script>

<style lang="scss" scoped>
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
  border: none;
  border-bottom: 1px solid;
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
  color: #fff;
  text-align: center;
  cursor: pointer;
  transition: 0.3s;

  &:hover {
    opacity: 0.6;
  }

  &--weak {
    background-color: #fff;
  }
}

.error {
  text-align: center;
}
</style>
