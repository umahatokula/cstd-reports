require('./bootstrap');

window.Vue = require('vue');

Vue.use(require('vue-moment'));

// register the plugin on vue
import Toasted from 'vue-toasted';
Vue.use(Toasted, {
    'position': 'top-center',
    'duration': 5000
})

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('create-monthly-performance-report', require('./components/Reports/CreateMonthlyPerformanceReport.vue').default);
Vue.component('edit-monthly-performance-report', require('./components/Reports/EditMonthlyPerformanceReport.vue').default);
Vue.component('evaluate-monthly-performance-report', require('./components/Reports/EvaluateMonthlyPerformanceReport.vue').default);
Vue.component('aper-form-accept', require('./components/Aper/Evaluate/AperFormAcceptEvaluation.vue').default);
Vue.component('aper-form', require('./components/Aper/Create/AperForm.vue').default);
Vue.component('aper-form-preview', require('./components/Aper/AperFormPreview.vue').default);
Vue.component('aper-form-evaluate', require('./components/Aper/Evaluate/Evaluate.vue').default);

const app = new Vue({
    el: '#app'
});
