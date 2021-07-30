import Vue from 'vue'
import contactForm from './contactForm.vue'

const MOUNT_POINT = 'js-contactForm'
const CONTACT_CONFIG = [
  {
    label: 'お名前',
    name: 'name',
    placeholder: '例）佐藤 ゆり',
    rules: { required: true }
  },
  {
    label: 'メールアドレス',
    name: 'email',
    placeholder: '例）yuri@lacigras2008.com',
    rules: { required: true, format: 'email' }
  },
  {
    label: '電話番号',
    name: 'phone',
    placeholder: '例）08012345678',
    rules: { format: 'phone' }
  },
  { label: '件名', name: 'subject', placeholder: '' },
  {
    label: '本文',
    name: 'body',
    placeholder:
      'レッスンのお申し込みの場合、ご希望のクラス・日程をご記入ください。',
    type: 'textarea',
    rules: { required: true }
  }
]

document.addEventListener('DOMContentLoaded', () => {
  const element = document.getElementById(MOUNT_POINT)
  if (!element) return
  new Vue({
    name: 'contactForm',
    el: element,
    components: { contactForm },
    data() {
      return {
        contactConfig: CONTACT_CONFIG
      }
    }
  })
})
