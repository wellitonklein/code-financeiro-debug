import LocalStorage from './services/localStorage';

require('materialize-css');
window.Vue = require('vue');
require('vue-resource');
Vue.http.options.root = "http://0.0.0.0:9000/api";

require('./router');

// LocalStorage.set('nome','Fokushima');
// LocalStorage.remove('nome');
