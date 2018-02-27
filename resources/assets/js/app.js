
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./custom/smoothScroll/smoothScroll');


window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});



//Protected images 
$(document).ready(function() {
    $("img").on("contextmenu",function(e){
        $('#protected_alert').css({
            left : e.pageX+10,
         top : e.pageY+10,
        });
    $(document).bind('mousemove', function(e){
     $('#protected_alert').css({
       	left : e.pageX+10,
        top : e.pageY+10,
       });
       
    });
    $('#protected_alert').fadeIn('fast').delay(500).fadeOut('slow');
       return false;
    }); 
}); 

//Footer Top Nav btn
$("#footer_top_btn").click(function () {
    TweenLite.to(window, 1, { scrollTo: 0 });
});


