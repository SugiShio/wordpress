<template lang="pug">
.mo-contactForm
  ul
    li.mo-contactForm__item
      label
        .mo-contactForm__label お名前
        p.mo-contactForm__confirmItem(v-show='isConfirm') {{ contact.name }}
        input.mo-contactForm__input(
          v-show='!isConfirm'
          type='text'
          name='name'
          v-model='contact.name'
          :placeholder='placeholderName'
        )
    li.mo-contactForm__item
      label
        .mo-contactForm__label メールアドレス
        p.mo-contactForm__confirmItem(v-show='isConfirm') {{ contact.email }}
        input.mo-contactForm__input(
          v-show='!isConfirm'
          type='email'
          name='email'
          v-model='contact.email'
          :placeholder='placeholderEmail'
        )
    li.mo-contactForm__item
      label
        .mo-contactForm__label お問合せ内容
        p.mo-contactForm__confirmItem(v-show='isConfirm') {{ contact.body }}
        textarea.mo-contactForm__input(
          v-show='!isConfirm'
          name='body'
          v-model='contact.body'
          cols='10'
          rows='5'
          :placeholder='placeholderBody'
        )
    li.mo-contactForm__item
      .mo-contactForm__error {{ errorMessage }}
      .mo-contactForm__button(
        v-show='!isConfirm'
        @click='goToConfirm'
      ) 送信内容の確認
      .mo-contactForm__buttons(v-show='isConfirm')
        input.mo-contactForm__button(
          type='submit'
          name='submit'
          value='送信'
        )
        .mo-contactForm__button.mo-contactForm__button--second(@click='backToInput') 修正する

</template>

<script>
export default {
  props: {
    placeholderName: String,
    placeholderEmail: String,
    placeholderBody: String
  },
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

<style lang="scss">
@import '../../sass/variables';
@import '../../sass/utils';

.mo-contactForm {
  &__item {
    margin: 50px 0;
  }

  &__label {
    margin: 15px 0;
    display: block;
    padding-left: 10px;
    border-left: 5px solid $color-accent;
    line-height: 1;
  }

  &__input {
    width: 100%;
    padding: 10px 15px;
    border-radius: 3px;
    border: 1px solid $color-text-weak;
    outline: none;
    appearance: none;
    font-family: $font-default;
    color: $color-text;
  }

  &__confirmItem {
    padding: 0 5px;
    word-break: break-word;
  }

  &__button {
    @extend %hover-style;
    display: block;
    width: 100%;
    max-width: 200px;
    margin: 10px auto;
    padding: 8px 10px;
    border: 1px solid $color-accent-weak;
    background-color: $color-accent-weak;
    border-radius: 3px;
    color: #fff;
    text-align: center;
    font-weight: bold;
    font-family: $font-default;

    &--second {
      background-color: #fff;
      color: $color-accent-weak;
    }
  }

  &__error {
    margin: 20px 0;
    text-align: center;
    color: $color-accent;
  }
}
</style>
