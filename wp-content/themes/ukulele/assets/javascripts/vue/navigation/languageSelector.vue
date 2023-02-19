<template lang="pug">
div.u-language-selector
  h3.u-language-selector__title Language
  div.u-language-selector__body
    template(
    v-for='(language, index) in languages'
    )
      span.u-language-selector__lang(
      v-if='language.value===currentLanguage'
      )
        | {{ language.label }}
      a.u-language-selector__lang(
      v-else
      :href='url(language)'
      )
        | {{ language.label }}
      template(v-if='!isLast(index)') /

</template>

<script>
export default {
  props: ['languages', 'currentLanguage'],
  methods: {
    url(language) {
      if (language.value !== 'ja') {
        return '/' + language.value + location.pathname
      }
      let path = location.pathname.split('/')
      return '/' + path.slice(2).join('/')
    },
    isLast(index) {
      return this.languages.length === index + 1
    }
  }
}
</script>
