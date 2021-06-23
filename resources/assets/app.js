// require('bootstrap');
// window.$ = require('jquery');
// require('vue');
// window.jQuery = require('jquery');
// window.Vue = require('vue');

// // Bootstrap
import 'bootstrap';  //  引入 Bootstrap
import 'bootstrap/dist/css/bootstrap.min.css';  //  引入 Bootstrap 的 css
// // jQuery
import $ from 'jquery';  //  引入 jQuery
window.$ = $;  //  挂载 jQuery
window.jQuery = $;  //  挂载 jQuery
// Vue
//Css
require('./sass/app.scss');