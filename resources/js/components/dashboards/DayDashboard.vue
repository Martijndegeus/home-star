<template>
    <div id="day" class="cube__face cube__face--top pt-2">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-6">
                    <div class="row align-items-start">
                        <div
                            class="col-12 text-center d-flex align-items-center justify-content-center">
                            <div class="clock-container-full-width mb-2">
                                <digital-clock :displaySeconds="false"
                                               class="clock"></digital-clock>
                                <div v-if="mediaInfo !== null">
                                    <media-progress-bar v-bind:media-info="mediaInfo"></media-progress-bar>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <entity-script script="radio" icon="radio-icon"></entity-script>
                        </div>
                        <div class="col-6">
                            <media-play-button v-bind:media-info="mediaInfo" :media-player="'living_room_tv'" size="small"></media-play-button>
                            <media-pause-button v-bind:media-info="mediaInfo" :media-player="'living_room_tv'" size="small"></media-pause-button>
                            <media-volume-down-button v-bind:media-info="mediaInfo" :media-player="'living_room_tv'" size="small"></media-volume-down-button>
                            <media-volume-up-button v-bind:media-info="mediaInfo" :media-player="'living_room_tv'" size="small"></media-volume-up-button>
                        </div>
                        <div class="col-6">
                            <entity-script script="1587942336983" icon="door-open-icon"></entity-script>
                        </div>
                        <div class="col-6">
                            <div
                                class="button d-flex align-items-center justify-content-center">
                                <power-off-icon title="" :size="36"></power-off-icon>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <weather-view v-bind:weather="weather"></weather-view>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "DayDashboard",
        props: ["weather", "entityStates", "mediaInfo"]
    }
</script>

<style scoped>

</style>
