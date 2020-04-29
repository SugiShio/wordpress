<template lang="pug">
div.m-contact
  ul.m-contact__form
    li.m-contact__item
      .m-contact__wrapper
        label.m-contact__label Name
        p.m-contact__confirm(v-show='isConfirm') {{ contact.name }}
        input.m-contact__input.m-contact__input--text(
          v-show='!isConfirm'
          type='text'
          name='name'
          v-model='contact.name'
          :placeholder='placeholderName'
        )
    li.m-contact__item
      .m-contact__wrapper
        label.m-contact__label Email
        p.m-contact__confirm(v-show='isConfirm') {{ contact.email }}
        input.m-contact__input.m-contact__input--text(
          v-show='!isConfirm'
          type='email'
          name='email'
          v-model='contact.email'
          :placeholder='placeholderEmail'
        )
    li.m-contact__item
      .m-contact__wrapper
        label.m-contact__label Content
        p.m-contact__confirm(v-show='isConfirm') {{ contact.body }}
        textarea.m-contact__input(
          v-show='!isConfirm'
          name='body'
          v-model='contact.body'
          cols='10'
          rows='5'
          :placeholder='placeholderBody'
        )
  .m-contact__error(v-show='!isConfirm') {{ errorMessage }}
  .m-contact__buttons
    .m-contact__button(
      v-show='!isConfirm'
      @click='goToConfirm'
    ) Confirm
  .m-contact__buttons(v-show='isConfirm')
    input.m-contact__button(
      type='submit'
      name='submit'
      value='送信'
    )
    .m-contact__button.m-contact__button--outline(@click='backToInput') Back

</template>

<script>
import axios from 'axios'
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

<style lang="scss" scoped>
.m-contact {
  &__form {
    margin: 10px 0;
  }
  &__item {
    margin: 20px 0;
  }

  &__label {
    display: block;
    padding: 0 5px;
    font-style: italic;
    @media screen and (min-width: 400px) {
      width: 100px;
      flex-shrink: 0;
      margin-right: 20px;
      padding: 7px 0;
    }
  }

  &__wrapper {
    @media screen and (min-width: 400px) {
      display: flex;
    }
  }

  &__input {
    width: 100%;
    padding: 5px 15px;
    border: none;
    background-color: rgba(#fff, 0.15);
    outline: none;
    appearance: none;
    color: #fff;
    line-height: 1.8;

    &--text {
      max-width: 300px;
    }

    &::-webkit-input-placeholder {
      color: rgba(#fff, 0.5);
    }

    &::-moz-placeholder {
      color: rgba(#fff, 0.5);
    }

    &:-ms-input-placeholder {
      color: rgba(#fff, 0.5);
    }
  }

  &__confirm {
    padding: 0 5px;
    word-break: break-word;

    @media screen and (min-width: 400px) {
      padding: 7px 5px;
    }
  }

  &__buttons {
    margin: 20px 0;

    @media screen and (min-width: 400px) {
      display: flex;
      justify-content: center;
      flex-direction: row-reverse;
    }
  }

  &__button {
    display: block;
    width: 100%;
    max-width: 200px;
    margin: 10px auto;
    padding: 5px 10px;
    background-color: rgba(#fff, 0.7);
    border: none;
    color: #4e6458;
    font-style: italic;
    text-align: center;
    line-height: 2;
    cursor: pointer;
    transition: background-color 0.3s;

    &--outline {
      border: 1px solid #fff;
      color: #fff;
      background-color: transparent;

      &:hover {
        color: #4e6458;
      }
    }

    &:hover {
      background-color: #fff;
    }

    @media screen and (min-width: 400px) {
      margin: 0 10px;
    }
  }

  &__error {
    margin: 10px 0;
    height: 20px;
    line-height: 20px;
    text-align: center;
  }
}
</style>
