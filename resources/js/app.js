/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import MorningDashboard from "./components/dashboards/MorningDashboard";

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
import WeatherComponent from "./components/weather/WeatherComponent";

import ToggleOn from 'vue-material-design-icons/ToggleSwitch.vue';
import ToggleOff from 'vue-material-design-icons/ToggleSwitchOff';
import CogIcon from 'vue-material-design-icons/Cog';
import CheckMarkIcon from 'vue-material-design-icons/CheckboxBlankOutline';
import CheckMarkIconChecked from 'vue-material-design-icons/CheckBoxOutline';
import SunRiseIcon from 'vue-material-design-icons/WeatherSunset';
import SunIcon from 'vue-material-design-icons/WeatherSunny';
import MoonIcon from 'vue-material-design-icons/WeatherNight';
import HomeIcon from 'vue-material-design-icons/Home';
import WorkIcon from 'vue-material-design-icons/OfficeBuilding';
import MediaIcon from 'vue-material-design-icons/RemoteTv';
import DashboardIcon from 'vue-material-design-icons/ViewDashboard';
import WrenchIcon from 'vue-material-design-icons/Wrench';

import PlayIcon from 'vue-material-design-icons/Play';
import PauseIcon from 'vue-material-design-icons/Pause';
import VolumeUpIcon from 'vue-material-design-icons/VolumePlus';
import VolumeDownIcon from 'vue-material-design-icons/VolumeMinus';

import RadioIcon from 'vue-material-design-icons/Radio';
import OpenDoorIcon from 'vue-material-design-icons/DoorOpen';
import HighTempIcon from 'vue-material-design-icons/ThermometerHigh';
import LowTempIcon from 'vue-material-design-icons/ThermometerLow';
import PowerOffIcon from 'vue-material-design-icons/PowerStandby';
import PowerOnIcon from 'vue-material-design-icons/PowerOn';
import SleepIcon from 'vue-material-design-icons/Sleep';

import SofaIcon from 'vue-material-design-icons/Sofa';
import BedIcon from 'vue-material-design-icons/Bed';
import BarIcon from 'vue-material-design-icons/FoodForkDrink';
import DeskLightIcon from 'vue-material-design-icons/DeskLamp';

Vue.component('general-dashboard', GeneralDashboard);
Vue.component('morning-dashboard', MorningDashboard);
Vue.component('day-dashboard', DayDashboard);
Vue.component('night-dashboard', NightDashboard);

Vue.component('entity-switch', EntitySwitch);
Vue.component('entity-light', EntityLight);
Vue.component('entity-script', EntityScript);

Vue.component('media-progress-bar', MediaProgressBar);
Vue.component('media-play-button', MediaPlayButton);
Vue.component('media-pause-button', MediaPauseButton);
Vue.component('media-volume-up-button', MediaVolumeUpButton);
Vue.component('media-volume-down-button', MediaVolumeDownButton);
Vue.component('media-preview', MediaPreview);

Vue.component('digital-clock', DigitalClock);
Vue.component('weather-view', WeatherComponent);
Vue.component('weather-small', WeatherSmall);

Vue.component('news-ticker', NewsTicker);

Vue.component('on-icon', ToggleOn);
Vue.component('off-icon', ToggleOff);
Vue.component('cog-icon', CogIcon);
Vue.component('sunrise-icon', SunRiseIcon);
Vue.component('sun-icon', SunIcon);
Vue.component('moon-icon', MoonIcon);
Vue.component('home-icon', HomeIcon);
Vue.component('work-icon', WorkIcon)
Vue.component('media-icon', MediaIcon);
Vue.component('dashboard-icon', DashboardIcon);
Vue.component('wrench-icon', WrenchIcon);
Vue.component('play-icon', PlayIcon);
Vue.component('pause-icon', PauseIcon);
Vue.component('volume-up-icon', VolumeUpIcon);
Vue.component('volume-down-icon', VolumeDownIcon);
Vue.component('radio-icon', RadioIcon);
Vue.component('door-open-icon', OpenDoorIcon);
Vue.component('high-temp-icon', HighTempIcon);
Vue.component('low-temp-icon', LowTempIcon);
Vue.component('power-off-icon', PowerOffIcon);
Vue.component('power-on-icon', PowerOnIcon);
Vue.component('sleep-icon', SleepIcon);

Vue.component('sofa-icon', SofaIcon);
Vue.component('bed-icon', BedIcon);
Vue.component('bar-icon', BarIcon);
Vue.component('desk-light-icon', DeskLightIcon);

Vue.component('check-blank-icon', CheckMarkIcon);
Vue.component('check-checked-icon', CheckMarkIconChecked);

import Snotify, { SnotifyPosition } from 'vue-snotify'
import NightDashboard from "./components/dashboards/NightDashboard";
import EntitySwitch from "./components/buttons/EntitySwitch";
import EntityLight from "./components/buttons/EntityLight";
import DayDashboard from "./components/dashboards/DayDashboard";
import GeneralDashboard from "./components/dashboards/GeneralDashboard";
import EntityScript from "./components/buttons/EntityScript";
import MediaProgressBar from "./components/media-player/MediaProgressBar";
import MediaPlayButton from "./components/media-player/MediaPlayButton";
import MediaPauseButton from "./components/media-player/MediaPauseButton";
import MediaVolumeUpButton from "./components/media-player/MediaVolumeUpButton";
import MediaVolumeDownButton from "./components/media-player/MediaVolumeDownButton";
import MediaPreview from "./components/media-player/MediaPreview";
import WeatherSmall from "./components/weather/WeatherSmall";
import NewsTicker from "./components/info/NewsTicker";

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
