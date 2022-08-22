import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'

import 'bootstrap';
import './assets/css/app.css';
import 'bootstrap/dist/css/bootstrap.min.css';

import VueSweetalert2 from 'vue-sweetalert2';

Vue.config.productionTip = false
Vue.use(VueSweetalert2);
import 'sweetalert2/dist/sweetalert2.min.css';

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
