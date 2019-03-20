
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import { library } from '@fortawesome/fontawesome-svg-core'
import { faCoffee } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'


library.add(faCoffee)

Vue.component('font-awesome-icon', FontAwesomeIcon)

Vue.config.productionTip = false

import VueNestable from 'vue-nestable'

Vue.use(VueNestable)
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('moviegame-component', require('./components/MoviegameComponent.vue'));
Vue.component('leaderboard-component', require('./components/LeaderboardComponent.vue'));
Vue.component('main-component', require('./components/MainComponent.vue'));
Vue.component('home-component', require('./components/HomeComponent.vue'));
Vue.component('schedule-component', require('./components/ScheduleComponent.vue'));
Vue.component('movies-component', require('./components/MoviesComponent.vue'));
Vue.component('stations-component', require('./components/StationsComponent.vue'));


const app = new Vue({
    el: '#app'
});


// Bulma NavBar Burger Script




document.addEventListener('DOMContentLoaded', function () {
    // Get all "navbar-burger" elements
    
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
   
    
    // Check if there are any navbar burgers
    if ($navbarBurgers.length > 0) {
        
        // Add a click event on each of them
        $navbarBurgers.forEach(function ($el) {
            $el.addEventListener('click', function () {
                
                // Get the target from the "data-target" attribute
                let target = $el.dataset.target;
                let $target = document.getElementById(target);
                
                // Toggle the class on both the "navbar-burger" and the "navbar-menu"
                $el.classList.toggle('is-active');
                $target.classList.toggle('is-active');
                
            });
        });
    }
    
});



require('./bulma-extensions');
