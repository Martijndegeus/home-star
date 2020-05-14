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
            <home-icon/>
        </button>
        <div class="content">
            <div class="container-fluid">
                <div id="dashboards">
                    <div class="dashboard">
                        <div class="scene">
                            <div class="cube">
                                <div id="general" class="cube__face cube__face--front pt-2">General Dashboard</div>
                                <div id="morning" class="cube__face cube__face--back pt-2">
                                    <div class="container">
                                        <div class="row align-items-start">
                                            <div class="col-3">
                                                <div class="button d-flex align-items-center justify-content-center">
                                                    <radio-icon :size="36"></radio-icon>
                                                </div>
                                            </div>
                                            <div
                                                class="col-6 text-center d-flex align-items-center justify-content-center">
                                                <digital-clock :displaySeconds="true"
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
                                                <div class="button d-flex align-items-center justify-content-center">
                                                    <door-open-icon :size="36"></door-open-icon>
                                                </div>
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
                                                    <div class="col-12 text-center d-flex align-items-center justify-content-center">
                                                        <digital-clock :displaySeconds="true" class="clock"></digital-clock>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="button d-flex align-items-center justify-content-center">
                                                            <radio-icon :size="36"></radio-icon>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="button d-flex align-items-center justify-content-center">
                                                            <power-off-icon :size="36"></power-off-icon>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="button d-flex align-items-center justify-content-center">
                                                            <door-open-icon :size="36"></door-open-icon>
                                                        </div>
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

                                            </div>
                                            <div
                                                class="col-6 text-center d-flex align-items-center justify-content-center">
                                                <digital-clock :displaySeconds="true"
                                                               class="clock"></digital-clock>
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
                activeDashboard: 0,
                headlines: [],
                weather: null,
            }
        },
        name: "DashboardComponent.vue",
        mounted() {
            this.interval = setInterval(() => {
                this.changeDashboard();
                this.getHeadlines();
                this.getWeather();
            }, 60000);

            this.changeDashboard();
            this.getHeadlines();
            this.getWeather();
        },
        methods: {
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

                if (hour > 6 && hour < 12) {
                    this.showMorningDashboard();
                } else if (hour > 11 && hour < 18) {
                    this.showDayDashboard();
                } else if ((hour > 17 && hour <= 24) || (hour >= 0 && hour <= 7)) {
                    this.showNightDashboard();
                } else {
                    this.showGeneralDashboard();
                }
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
                    console.log(result.data);
                    _this.weather = result.data;
                }).catch(function (error) {
                    console.log(error);
                    _this.$snotify.error('Something went wrong...');
                });
            }
        }
    }
</script>

<style scoped>

    #dashboards {
        margin: 0 auto;
    }

    .scene {
        width: 600px;
        height: 350px;
        margin: 50px 80px auto 100px;
        perspective: 300px;
        float: left;
    }

    .cube {
        width: 600px;
        height: 300px;
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
        margin-bottom: 1em;
        height: 20vh;
        border: 1px solid rgba(255, 255, 255, 0.15);
        color: rgba(255, 255, 255, 0.75);
    }

    .clock {
        height: 20vh;
        font-size: 40px;
        font-weight: bold;
        color: white;
        text-align: center;
        color: rgba(255, 255, 255, 0.75);
    }

    .weather-view {
        line-height: 1;
        font-size: 1.2em;
        border: none;
    }

    .cube__face--front {
        background: hsla(0, 12%, 51%, 0.95);
        width: 600px;
        height: 300px;
    }

    .cube__face--right {
        background: hsla(60, 8%, 20%, 0.7);
        width: 300px;
        height: 300px;
    }

    .cube__face--back {
        background: hsla(40, 53%, 36%, 0.95);
        width: 600px;
        height: 300px;
    }

    .cube__face--left {
        background: hsla(60, 8%, 20%, 0.7);
        width: 300px;
        height: 300px;
    }

    .cube__face--top {
        background: hsla(242, 17%, 73%, 0.95);
        width: 600px;
        height: 300px;
    }

    .cube__face--bottom {
        background: hsla(300, 10%, 25%, 0.95);
        width: 600px;
        height: 300px;
    }

    .cube__face--front {
        transform: rotateY(0deg) translateZ(150px);
    }

    .cube__face--right {
        transform: rotateY(90deg) translateZ(450px);
    }

    .cube__face--back {
        transform: rotateY(180deg) translateZ(150px) rotate(180deg);;
    }

    .cube__face--left {
        transform: rotateY(-90deg) translateZ(150px);
    }

    .cube__face--top {
        transform: rotateX(90deg) translateZ(150px);
    }

    .cube__face--bottom {
        transform: rotateX(-90deg) translateZ(150px);
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
        animation: marquee 80s linear infinite;
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
