<template>
    <div id="night" class="cube__face cube__face--bottom pt-2">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-3">
                    <entity-script script="radio" icon="radio-icon"></entity-script>
                </div>
                <div
                    class="col-6 text-center d-flex align-items-center justify-content-center">
                    <div class="clock-container-full-width">
                        <digital-clock :displaySeconds="false"
                                       class="clock"></digital-clock>
                        <div v-if="mediaInfo !== null">
                            <media-progress-bar v-bind:media-info="mediaInfo"></media-progress-bar>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <weather-small v-bind:weather="weather"></weather-small>
                </div>
                <div class="col-3">
                    <entity-script script="1587942336983" icon="sleep-icon"></entity-script>
                </div>
                <div class="col-3">
                    <media-play-button v-bind:media-info="mediaInfo" :media-player="'living_room_tv'" size="large"></media-play-button>
                </div>
                <div class="col-3">
                    <media-pause-button v-bind:media-info="mediaInfo" :media-player="'living_room_tv'" size="large"></media-pause-button>
                </div>
                <div class="col-3">
                    <entity-switch switch-name="sitting_area_standing" v-bind:entity-states="entityStates" icon="sofa-icon"></entity-switch>
                    <entity-switch switch-name="bar" v-bind:entity-states="entityStates" icon="bar-icon"></entity-switch>
                    <entity-light light-name="bedroom" v-bind:entity-states="entityStates" icon="bed-icon"></entity-light>
                    <entity-switch switch-name="reading_light" v-bind:entity-states="entityStates" icon="desk-light-icon"></entity-switch>
                </div>
                <div class="col-3">
                    <div class="button" v-if="mediaInfo !== null">
                        <media-preview v-bind:media-info="mediaInfo"></media-preview>
                    </div>
                </div>
                <div class="col-3">
                    <media-volume-down-button v-bind:media-info="mediaInfo" :media-player="'living_room_tv'" size="large"></media-volume-down-button>
                </div>
                <div class="col-3">
                    <media-volume-up-button v-bind:media-info="mediaInfo" :media-player="'living_room_tv'" size="large"></media-volume-up-button>
                </div>
                <div class="col-3">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "NightDashboard",
        props: ["weather", "entityStates", "mediaInfo", "changeSwitchMethod"],
        methods: {
            changeSwitch: function () {
                this.changeSwitchMethod();
            }
        }
    }
</script>

<style scoped>

</style>
