<template>
    <div>
        <a href="#" id="menu_toggle" class="btn view-button float-right">
            <cog-icon/>
        </a>
        <button onclick="showMorningDashboard()" id="dashboard_morning_button" class="btn view-button float-right">
            <sunrise-icon/>
        </button>
        <button onclick="showDayDashboard()" id="dashboard_day_button" class="btn view-button float-right">
            <sun-icon/>
        </button>
        <button onclick="showNightDashboard()" id="dashboard_night_button" class="btn view-button float-right">
            <moon-icon/>
        </button>
        <button onclick="showGeneralDashboard()" id="dashboard_general_button" class="btn view-button float-right">
            <media-icon/>
        </button>
        <div class="content">
            <div class="container-fluid">
                <div id="dashboards">
                    <div class="dashboard">
                        <div class="scene">
                            <div class="cube">
                                <div id="general" class="cube__face cube__face--front pt-2">
                                    <div class="container">
                                        <div class="row align-items-start">
                                            <div class="col-3"></div>
                                            <div class="col-6">
                                                <div v-if="mediaInfo !== null" class="media-progress">
                                                    <div class="media-progress-fill" style="width: 43.5%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="morning" class="cube__face cube__face--back pt-2">
                                    <div class="container">
                                        <div class="row align-items-start">
                                            <div class="col-3">
                                                <a href="#" @click.prevent="scriptOn('script.radio')"
                                                   class="button d-flex align-items-center justify-content-center">
                                                    <radio-icon :size="36"></radio-icon>
                                                </a>
                                            </div>
                                            <div
                                                class="col-6 text-center d-flex align-items-center justify-content-center">
                                                <digital-clock :displaySeconds="false"
                                                               class="clock"></digital-clock>
                                            </div>
                                            <div class="col-3">
                                                <div v-if="weather !== null" class="weather-view button text-center">
                                                    <img class="float-left" :src="weather.weather[0].icons.small">
                                                    <p class="pt-3">{{ weather.main.temp.toFixed(1) }}&deg;C ({{
                                                        weather.main.feels_like.toFixed(1) }}&deg;C)</p>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <a href="#" @click.prevent="scriptOn('script.1587942336983')"
                                                   class="button d-flex align-items-center justify-content-center">
                                                    <door-open-icon :size="36"></door-open-icon>
                                                </a>
                                            </div>
                                            <div class="col-3">
                                                <a href="#" @click.prevent="scriptOn('script.1587935371473')"
                                                   class="button d-flex align-items-center justify-content-center">
                                                    <power-off-icon :size="36"></power-off-icon>
                                                </a>
                                            </div>
                                            <div class="col-12">
                                                <div class="marquee">
                                                    <p><span v-for="headline in this.headlines" v-bind="headline.index">{{ headline }} | </span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="cube__face cube__face--right"></div>
                                <div class="cube__face cube__face--left"></div>
                                <div id="day" class="cube__face cube__face--top pt-2">
                                    <div class="container">
                                        <div class="row align-items-start">
                                            <div class="col-6">
                                                <div class="row align-items-start">
                                                    <div
                                                        class="col-12 text-center d-flex align-items-center justify-content-center">
                                                        <digital-clock :displaySeconds="false"
                                                                       class="clock"></digital-clock>
                                                    </div>
                                                    <div class="col-6">
                                                        <a href="#" @click.prevent="scriptOn('script.radio')"
                                                           class="button d-flex align-items-center justify-content-center">
                                                            <radio-icon :size="36"></radio-icon>
                                                        </a>
                                                    </div>
                                                    <div class="col-6">
                                                        <div
                                                            class="button d-flex align-items-center justify-content-center">
                                                            <power-off-icon :size="36"></power-off-icon>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <a href="#" @click.prevent="scriptOn('script.1587942336983')"
                                                           class="button d-flex align-items-center justify-content-center">
                                                            <door-open-icon :size="36"></door-open-icon>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div v-if="weather !== null" class="weather-view button text-center">
                                                    <img class="" :src="weather.weather[0].icons.large">
                                                    <p class="pt-3">{{ weather.main.temp.toFixed(1) }}&deg;C ({{
                                                        weather.main.feels_like.toFixed(1) }}&deg;C)</p>
                                                    <p class="text-capitalize">{{ weather.weather[0].description }}</p>
                                                    <p class="float-left">
                                                        <low-temp-icon></low-temp-icon>
                                                        {{ weather.main.temp_min.toFixed(1) }}
                                                    </p>
                                                    <p class="float-right">
                                                        {{ weather.main.temp_max.toFixed(1) }}
                                                        <high-temp-icon></high-temp-icon>
                                                    </p>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="night" class="cube__face cube__face--bottom pt-2">
                                    <div class="container">
                                        <div class="row align-items-start">
                                            <div class="col-3">
                                                <a href="#" @click.prevent="scriptOn('script.radio')"
                                                   class="button d-flex align-items-center justify-content-center">
                                                    <radio-icon :size="36"></radio-icon>
                                                </a>
                                            </div>
                                            <div
                                                class="col-6 text-center d-flex align-items-center justify-content-center">
                                                <div class="clock-container-full-width">
                                                    <digital-clock :displaySeconds="false"
                                                                   class="clock"></digital-clock>
                                                    <div v-if="mediaInfo !== null">
                                                        <small class="float-left media-counter">0:00</small>
                                                        <small class="float-right media-counter">{{ new
                                                            Date((mediaInfo.attributes.media_duration) *
                                                            1000).toISOString().substr(11, 8) }}</small>
                                                        <div class="media-progress">
                                                            <div class="media-progress-fill"
                                                                 v-bind:style="{ width: (mediaInfo.attributes.media_position / mediaInfo.attributes.media_duration) * 100 + '%' }"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div v-if="weather !== null" class="weather-view button text-center">
                                                    <img class="float-left" :src="weather.weather[0].icons.small">
                                                    <p class="pt-3">{{ weather.main.temp.toFixed(1) }}&deg;C ({{
                                                        weather.main.feels_like.toFixed(1) }}&deg;C)</p>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <a href="#" @click.prevent="scriptOn('script.1587942336983')"
                                                   class="button d-flex align-items-center justify-content-center">
                                                    <sleep-icon :size="36"></sleep-icon>
                                                </a>
                                            </div>
                                            <div class="col-3">
                                                <a href="#"
                                                   v-bind:class="mediaInfo !== null && mediaInfo.state === 'playing' ? 'active' : ''"
                                                   @click.prevent="play('media_player.living_room_tv')"
                                                   class="button d-flex align-items-center justify-content-center"
                                                   id="play_button">
                                                    <play-icon :size="36"></play-icon>
                                                </a>
                                            </div>
                                            <div class="col-3">
                                                <a href="#"
                                                   v-bind:class="mediaInfo !== null && mediaInfo.state === 'paused' ? 'active' : ''"
                                                   @click.prevent="pause('media_player.living_room_tv')"
                                                   class="button d-flex align-items-center justify-content-center"
                                                   id="pause_button">
                                                    <pause-icon :size="36"></pause-icon>
                                                </a>
                                            </div>
                                            <div class="col-3">
                                                <a href="#"
                                                   @click.prevent="changeSwitch('switch.sitting_area_standing', $event)"
                                                   :class="entityStates !== null && entityStates.switch['switch.sitting_area_standing'].state === 'on' ? 'active ' : ''"
                                                   class="button small-button d-flex align-items-center justify-content-center">
                                                    <sofa-icon :size="30"></sofa-icon>
                                                </a>
                                                <a href="#" @click.prevent="changeSwitch('switch.bar', $event)"
                                                   :class="entityStates !== null && entityStates.switch['switch.bar'].state === 'on' ? 'active ' : ''"
                                                   class="button small-button d-flex align-items-center justify-content-center">
                                                    <bar-icon :size="30"></bar-icon>
                                                </a>
                                                <a href="#" @click.prevent="changeLight('light.bedroom', $event)"
                                                   :class="entityStates !== null && entityStates.light['light.bedroom'].state === 'on' ? 'active ' : ''"
                                                   class="button small-button d-flex align-items-center justify-content-center">
                                                    <bed-icon :size="30"></bed-icon>
                                                </a>
                                                <a href="#"
                                                   @click.prevent="changeSwitch('switch.reading_light', $event)"
                                                   :class="entityStates !== null && entityStates.switch['switch.reading_light'].state === 'on' ? 'active ' : ''"
                                                   class="button small-button d-flex align-items-center justify-content-center">
                                                    <desk-light-icon :size="30"></desk-light-icon>
                                                </a>
                                            </div>
                                            <div class="col-3">
                                                <div class="button" v-if="mediaInfo !== null">
                                                    <div
                                                        v-if="mediaInfo !== null && mediaInfo.attributes.entity_picture !== null"
                                                        class="media-image">
                                                        <img :src="mediaInfo.attributes.entity_picture"/>
                                                    </div>
                                                    <p class="media-app">{{ mediaInfo.attributes.app_name }}</p>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <a href="#" @click.prevent="volumeDown('media_player.living_room_tv')"
                                                   class="button d-flex align-items-center justify-content-center">
                                                    <volume-down-icon :size="36"></volume-down-icon>
                                                </a>
                                            </div>
                                            <div class="col-3">
                                                <a href="#" @click.prevent="volumeUp('media_player.living_room_tv')"
                                                   class="button d-flex align-items-center justify-content-center">
                                                    <volume-up-icon :size="36"></volume-up-icon>
                                                </a>
                                            </div>
                                            <div class="col-3">
                                                <!--                                                <a href="#" class="button small-button d-flex align-items-center justify-content-center">-->
                                                <!--                                                    <pause-icon :size="30"></pause-icon>-->
                                                <!--                                                </a>-->
                                                <!--                                                <a href="#" class="button small-button d-flex align-items-center justify-content-center">-->
                                                <!--                                                    <pause-icon :size="30"></pause-icon>-->
                                                <!--                                                </a>-->
                                                <!--                                                <a href="#" class="button small-button d-flex align-items-center justify-content-center">-->
                                                <!--                                                    <pause-icon :size="30"></pause-icon>-->
                                                <!--                                                </a>-->
                                                <!--                                                <a href="#" class="button small-button d-flex align-items-center justify-content-center">-->
                                                <!--                                                    <pause-icon :size="30"></pause-icon>-->
                                                <!--                                                </a>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                interval: null,
                mediaInterval: null,
                activeDashboard: 0,
                headlines: [],
                weather: null,
                mediaInfo: null,
                entityStates: null,
            }
        },
        name: "DashboardComponent.vue",
        mounted() {
            this.interval = setInterval(() => {
                this.refreshDashboard();
                this.getMediaInfo();
            }, 60000);

            this.changeDashboard();
            this.getHeadlines();
            this.getWeather();
            this.getMediaInfo();
            this.getEntityStates();
        },
        methods: {
            refreshDashboard() {
                this.changeDashboard();
                this.getHeadlines();
                this.getWeather();
            },
            showMorningDashboard() {
                let cube = document.getElementsByClassName('cube')[0];
                cube.classList.remove('show-top', 'show-bottom', 'show-front', 'show-back');
                cube.classList.add('show-back');
            },
            showDayDashboard() {
                let cube = document.getElementsByClassName('cube')[0];
                cube.classList.remove('show-top', 'show-bottom', 'show-front', 'show-back');
                cube.classList.add('show-top');
            },
            showNightDashboard() {
                let cube = document.getElementsByClassName('cube')[0];
                cube.classList.remove('show-top', 'show-bottom', 'show-front', 'show-back');
                cube.classList.add('show-bottom');
            },
            showGeneralDashboard() {
                let cube = document.getElementsByClassName('cube')[0];
                cube.classList.remove('show-top', 'show-bottom', 'show-front', 'show-back');
                cube.classList.add('show-front');
            },
            changeDashboard() {
                let now = new Date();
                let hour = now.getHours();

                clearInterval(this.interval);

                if (hour > 6 && hour < 12) {
                    this.showMorningDashboard();
                } else if (hour > 11 && hour < 18) {
                    this.showDayDashboard();
                } else if ((hour > 17 && hour <= 24) || (hour >= 0 && hour <= 7)) {
                    this.showNightDashboard();
                } else {
                    this.showGeneralDashboard();
                }

                this.interval = setInterval(this.refreshDashboard, 60000);
            },
            getHeadlines() {
                let _this = this;
                axios.get('api/news/nos').then(function (result) {
                    _this.headlines = result.data;
                }).catch(function (error) {
                    console.log(error);
                    _this.$snotify.error('Something went wrong...');
                });
            },
            getWeather() {
                let _this = this;
                axios.get('api/weather/neerpelt').then(function (result) {
                    _this.weather = result.data;
                }).catch(function (error) {
                    console.log(error);
                    _this.$snotify.error('Something went wrong...');
                });
            },
            getMediaInfo() {
                let _this = this;
                axios.get('api/media/info').then(function (result) {
                    _this.mediaInfo = result.data;
                    console.log(result.data);
                }).catch(function (error) {
                    console.log(error);
                    _this.$snotify.error('Something went wrong...');
                });
            },
            getEntityStates() {
                let _this = this;
                axios.get('api/entities').then(function (result) {
                    _this.entityStates = result.data;
                    console.log(result.data);
                }).catch(function (error) {
                    console.log(error);
                    _this.$snotify.error('Something went wrong...');
                });
            },
            changeSwitch(entityId, event) {
                let _this = this;
                let button = event.target;
                axios.get('api/switches/' + entityId + '/change').then((result) => {
                    console.log('Changed state for ' + entityId);
                    if (result.data === 'on') {
                        button.classList.add('active');
                    } else {
                        button.classList.remove('active');
                    }
                }).catch(function (error) {
                    console.log(error);
                    _this.$snotify.error('Something went wrong...');
                });
            },
            changeLight(entityId, event) {
                let _this = this;
                let button = event.target;
                axios.get('api/lights/' + entityId + '/change').then((result) => {
                    console.log('Changed state for ' + entityId);
                    console.log(button);
                    console.log(result.data);
                    if (result.data === 'on') {
                        button.classList.add('active');
                    } else {
                        button.classList.remove('active');
                    }
                }).catch(function (error) {
                    console.log(error);
                    _this.$snotify.error('Something went wrong...');
                });
            },
            switchOn(entityId) {
                let _this = this;
                axios.get('api/switches/' + entityId + '/on').then(() => {
                    console.log('Switched ' + entityId + ' on');
                }).catch(function (error) {
                    console.log(error);
                    _this.$snotify.error('Something went wrong...');
                });
            },
            switchOff(entityId) {
                let _this = this;
                axios.get('api/switches/' + entityId + '/off').then(() => {
                    console.log('Switched ' + entityId + ' off');
                }).catch(function (error) {
                    console.log(error);
                    _this.$snotify.error('Something went wrong...');
                });
            },
            scriptOn(entityId) {
                let _this = this;
                axios.get('api/scripts/' + entityId + '/on').then(() => {
                    console.log('Switched ' + entityId + ' on');
                }).catch(function (error) {
                    console.log(error);
                    _this.$snotify.error('Something went wrong...');
                });
            },
            play(entityId) {
                let _this = this;
                let playButton = document.getElementById('play_button');
                let pauseButton = document.getElementById('pause_button');
                pauseButton.classList.remove('active');
                playButton.classList.add('active');
                axios.get('api/media/' + entityId + '/play').then(() => {
                    console.log('Playing on ' + entityId);
                }).catch(function (error) {
                    console.log(error);
                    _this.$snotify.error('Something went wrong...');
                });
            },
            pause(entityId) {
                let _this = this;
                let playButton = document.getElementById('play_button');
                let pauseButton = document.getElementById('pause_button');
                pauseButton.classList.add('active');
                playButton.classList.remove('active');
                axios.get('api/media/' + entityId + '/pause').then(() => {
                    console.log('Paused ' + entityId);
                }).catch(function (error) {
                    console.log(error);
                    _this.$snotify.error('Something went wrong...');
                });
            },
            volumeUp(entityId) {
                let _this = this;
                axios.get('api/media/' + entityId + '/volume-up').then(() => {
                    console.log('Volume increased on ' + entityId);
                }).catch(function (error) {
                    console.log(error);
                    _this.$snotify.error('Something went wrong...');
                });
            },
            volumeDown(entityId) {
                let _this = this;
                axios.get('api/media/' + entityId + '/volume-down').then(() => {
                    console.log('Volume decreased on ' + entityId);
                }).catch(function (error) {
                    console.log(error);
                    _this.$snotify.error('Something went wrong...');
                });
            },
        }
    }
</script>

<style scoped>

    #dashboards {
        margin: 0 auto;
    }

    .scene {
        width: 600px;
        height: 400px;
        margin: 65px 80px auto 100px;
        perspective: 400px;
        float: left;
    }

    .cube {
        width: 600px;
        height: 350px;
        position: relative;
        transform-style: preserve-3d;
        transform: translateZ(-110px);
        transition: transform 1s;
    }

    .cube.show-front {
        transform: translateZ(-110px) rotateY(0deg);
    }

    .cube.show-right {
        transform: translateZ(-110px) rotateY(-90deg);
    }

    .cube.show-back {
        transform: translateZ(-110px) rotateX(-180deg);
    }

    .cube.show-left {
        transform: translateZ(-110px) rotateY(90deg);
    }

    .cube.show-top {
        transform: translateZ(-110px) rotateX(-90deg);
    }

    .cube.show-bottom {
        transform: translateZ(-110px) rotateX(90deg);
    }

    .cube__face {
        position: absolute;
    }

    .button {
        position: relative;
        margin-bottom: 1em;
        overflow: hidden;
        height: 20vh;
        border: 1px solid rgba(255, 255, 255, 0.15);
        color: rgba(255, 255, 255, 0.75);
    }

    .button.active {
        background: rgba(255, 255, 255, 0.15);
    }

    .small-button {
        height: 10vh;
        float: left;
        width: 50%;
        margin-bottom: 0;
    }

    .button .material-design-icon {
        z-index: -9;
    }

    .clock-container-full-width {
        width: 100%;
    }

    .clock {
        height: 20vh;
        font-size: 40px;
        font-weight: bold;
        color: white;
        text-align: center;
        color: rgba(255, 255, 255, 0.75);
    }

    p.media-app {
        color: white;
        text-shadow: #000 1px 1px 3px;
        position: absolute;
        top: 35%;
        left: 0;
        right: 0;
        text-align: center;
        display: block;
    }

    .media-image {
        height: 20vh;
    }

    .media-image > img {
        max-height: 100%;
    }

    .media-counter {
        margin-top: .6em;
        color: rgba(255, 255, 255, 0.75);
    }

    .weather-view {
        line-height: 1;
        font-size: 1.2em;
        border: none;
        height: auto;
    }

    .cube__face--front {
        background: hsla(0, 12%, 51%, 0.95);
        width: 600px;
        height: 350px;
    }

    .cube__face--right {
        background: hsla(60, 8%, 20%, 0.7);
        width: 350px;
        height: 350px;
    }

    .cube__face--back {
        background: hsla(40, 53%, 36%, 0.95);
        width: 600px;
        height: 350px;
    }

    .cube__face--left {
        background: hsla(60, 8%, 20%, 0.7);
        width: 350px;
        height: 350px;
    }

    .cube__face--top {
        background: hsla(240, 4%, 43%, 0.95);
        width: 600px;
        height: 350px;
    }

    .cube__face--bottom {
        background: hsla(300, 10%, 25%, 0.95);
        width: 600px;
        height: 350px;
    }

    .cube__face--front {
        transform: rotateY(0deg) translateZ(175px);
    }

    .cube__face--right {
        transform: rotateY(90deg) translateZ(425px);
    }

    .cube__face--back {
        transform: rotateY(180deg) translateZ(175px) rotate(180deg);;
    }

    .cube__face--left {
        transform: rotateY(-90deg) translateZ(175px);
    }

    .cube__face--top {
        transform: rotateX(90deg) translateZ(175px);
    }

    .cube__face--bottom {
        transform: rotateX(-90deg) translateZ(175px);
    }

    .marquee {
        width: 100%;
        font-size: 2em;
        line-height: 100px;
        white-space: nowrap;
        overflow: hidden;
        box-sizing: border-box;
    }

    .marquee p {
        color: rgba(255, 255, 255, 0.75);
        display: inline-block;
        padding-left: 100%;
        animation: marquee 120s linear infinite;
    }

    .media-progress {
        width: 100%;
        height: 4px;
        background: rgba(255, 255, 255, 0.15);
    }

    .media-progress-fill {
        height: 100%;
        width: 43.55%;
        background: rgba(255, 255, 255, 0.75)
    }

    @keyframes marquee {
        0% {
            transform: translate(0, 0);
        }
        100% {
            transform: translate(-100%, 0);
        }
    }

    label {
        margin-right: 10px;
    }

</style>
