/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

require('./progressbar');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import { routes } from './routes';
// import 'vue-material-design-icons/styles.css';

const router = new VueRouter({
    routes,
    mode: 'hash',
})

import DigitalClock from "vue-digital-clock";
import WeatherComponent from "./components/WeatherComponent";

import ToggleOn from 'vue-material-design-icons/ToggleSwitch.vue';
import ToggleOff from 'vue-material-design-icons/ToggleSwitchOff';
import CogIcon from 'vue-material-design-icons/Cog';
import CheckMarkIcon from 'vue-material-design-icons/CheckboxBlankOutline';
import CheckMarkIconChecked from 'vue-material-design-icons/CheckBoxOutline';
import SunRiseIcon from 'vue-material-design-icons/WeatherSunset';
import SunIcon from 'vue-material-design-icons/WeatherSunny';
import MoonIcon from 'vue-material-design-icons/WeatherNight';
import HomeIcon from 'vue-material-design-icons/HomeAutomation';
import DashboardIcon from 'vue-material-design-icons/ViewDashboard';
import WrenchIcon from 'vue-material-design-icons/Wrench';
import PlayIcon from 'vue-material-design-icons/Play';
import RadioIcon from 'vue-material-design-icons/Radio';
import OpenDoorIcon from 'vue-material-design-icons/DoorOpen';
import HighTempIcon from 'vue-material-design-icons/ThermometerHigh';
import LowTempIcon from 'vue-material-design-icons/ThermometerLow';
import PowerOffIcon from 'vue-material-design-icons/PowerStandby';

Vue.component('digital-clock', DigitalClock);
Vue.component('weather-view', WeatherComponent);

Vue.component('on-icon', ToggleOn);
Vue.component('off-icon', ToggleOff);
Vue.component('cog-icon', CogIcon);
Vue.component('sunrise-icon', SunRiseIcon);
Vue.component('sun-icon', SunIcon);
Vue.component('moon-icon', MoonIcon);
Vue.component('home-icon', HomeIcon);
Vue.component('dashboard-icon', DashboardIcon);
Vue.component('wrench-icon', WrenchIcon);
Vue.component('play-icon', PlayIcon);
Vue.component('radio-icon', RadioIcon);
Vue.component('door-open-icon', OpenDoorIcon);
Vue.component('high-temp-icon', HighTempIcon);
Vue.component('low-temp-icon', LowTempIcon);
Vue.component('power-off-icon', PowerOffIcon);

Vue.component('check-blank-icon', CheckMarkIcon);
Vue.component('check-checked-icon', CheckMarkIconChecked);

import Snotify, { SnotifyPosition } from 'vue-snotify'

const options = {
    toast: {
        position: SnotifyPosition.rightTop,
        timeout: 2000
    }
}

Vue.use(Snotify, options)

const app = new Vue({
    el: '#app',
    router,
});
