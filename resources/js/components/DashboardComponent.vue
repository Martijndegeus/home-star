<template>
    <div>
        <a href="#" id="menu_toggle" class="btn view-button float-right">
            <cog-icon title=""/>
        </a>
        <button onclick="showMorningDashboard()" id="dashboard_morning_button" class="btn view-button float-right">
            <sunrise-icon title=""/>
        </button>
        <button onclick="showDayDashboard()" id="dashboard_day_button" class="btn view-button float-right">
            <sun-icon title=""/>
        </button>
        <button onclick="showNightDashboard()" id="dashboard_night_button" class="btn view-button float-right">
            <moon-icon title=""/>
        </button>
        <button onclick="showGeneralDashboard()" id="dashboard_general_button" class="btn view-button float-right">
            <media-icon title=""/>
        </button>
        <div class="content">
            <div class="container-fluid">
                <div id="dashboards">
                    <div class="dashboard">
                        <div class="scene">
                            <div class="cube">
                                <general-dashboard v-bind:entity-states="entityStates" v-bind:media-info="mediaInfo"></general-dashboard>
                                <morning-dashboard v-bind:weather="weather" v-bind:entity-states="entityStates" v-bind:headlines="headlines"></morning-dashboard>
                                <div class="cube__face cube__face--right"></div>
                                <div class="cube__face cube__face--left"></div>
                                <day-dashboard v-bind:weather="weather" v-bind:entity-states="entityStates" v-bind:media-info="mediaInfo"></day-dashboard>
                                <night-dashboard v-bind:weather="weather" v-bind:entity-states="entityStates" v-bind:mediaInfo="mediaInfo"></night-dashboard>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <vue-snotify></vue-snotify>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                intervals: {
                    entities: null,
                    media: null,
                    weather: null,
                    headlines: null,
                },
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
            this.intervals.entities = setInterval(() => {
                this.refreshEntities();
            }, 60000);

            this.intervals.headlines = setInterval(() => {
                this.getHeadlines();
            }, 600000);

            this.intervals.media = setInterval(() => {
                this.getMediaInfo();
            }, 1000);

            this.intervals.weather = setInterval(() => {
                this.getWeather();
            }, 1200000);

            this.changeDashboard();
            this.getHeadlines();
            this.getWeather();
            this.getMediaInfo();
            this.getEntityStates();
        },
        methods: {
            refreshEntities() {
                this.changeDashboard();
                this.getEntityStates();
            },
            refreshDashboard() {
                this.getHeadlines();
                this.getWeather();
                this.getMediaInfo();

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

                // clearInterval(this.interval);

                if (hour > 6 && hour < 12) {
                    this.showMorningDashboard();
                } else if (hour > 11 && hour < 18) {
                    this.showDayDashboard();
                } else if ((hour > 17 && hour <= 24) || (hour >= 0 && hour <= 7)) {
                    this.showNightDashboard();
                } else {
                    this.showGeneralDashboard();
                }

                this.intervals.entities = setInterval(this.refreshEntities, 60000);
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
                    // console.log(result.data);
                }).catch(function (error) {
                    console.log(error);
                    _this.$snotify.error('Something went wrong...');
                });
            },
            getEntityStates() {
                let _this = this;
                axios.get('api/entities').then(function (result) {
                    _this.entityStates = result.data;
                    // console.log(result.data);
                }).catch(function (error) {
                    console.log(error);
                    _this.$snotify.error('Something went wrong...');
                });
            },
            switchOn(entityId) {
                let _this = this;
                axios.get('api/switches/' + entityId + '/on').then(() => {
                    // console.log('Switched ' + entityId + ' on');
                }).catch(function (error) {
                    console.log(error);
                    _this.$snotify.error('Something went wrong...');
                });
            },
            switchOff(entityId) {
                let _this = this;
                axios.get('api/switches/' + entityId + '/off').then(() => {
                    // console.log('Switched ' + entityId + ' off');
                }).catch(function (error) {
                    console.log(error);
                    _this.$snotify.error('Something went wrong...');
                });
            },
        }
    }
</script>

<style>

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

    .text-grey {
        color: rgba(255, 255, 255, 0.5);
    }

    .button {
        position: relative;
        margin-bottom: 1em;
        overflow: hidden;
        height: 20vh;
        border: 1px solid rgba(255, 255, 255, 0.15);
        color: rgba(255, 255, 255, 0.75);
    }

    .button:hover {
        color: rgba(255, 255, 255, 0.75);
    }

    .button.active {
        background: rgba(255, 255, 255, 0.15);
        color: rgba(255, 255, 255, 0.75);
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
