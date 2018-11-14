const Vue = require('vue');
$(function() {
  if(document.getElementById('vue-schedule')) {
    var Component = Vue.extend(require('./vue/schedule.vue').default)
    new Component().$mount('#vue-schedule')
  }
})
