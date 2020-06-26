<template>
    <div id="morning" class="cube__face cube__face--back pt-2">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-3">
                    <entity-script script="radio" icon="radio-icon"></entity-script>
                </div>
                <div
                    class="col-6 text-center d-flex align-items-center justify-content-center">
                    <digital-clock :displaySeconds="false"
                                   class="clock"></digital-clock>
                </div>
                <div class="col-3">
                    <weather-small v-bind:weather="weather"></weather-small>
                </div>
                <div class="col-3">
                    <entity-script script="1587942336983" icon="door-open-icon"></entity-script>
                </div>
                <div class="col-3">
                    <entity-script script="1587935371473" icon="power-off-icon"></entity-script>
                </div>
                <div class="col-3"></div>
                <div class="col-3">
                    <entity-switch switch-name="sitting_area_standing" v-bind:entity-states="entityStates" icon="sofa-icon"></entity-switch>
                    <entity-switch switch-name="bar" v-bind:entity-states="entityStates" icon="bar-icon"></entity-switch>
                    <entity-light light-name="bedroom" v-bind:entity-states="entityStates" icon="bed-icon"></entity-light>
                    <entity-switch switch-name="reading_light" v-bind:entity-states="entityStates" icon="desk-light-icon"></entity-switch>
                </div>
                <div class="col-12">
                    <news-ticker :headlines="headlines"></news-ticker>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "MorningDashboard",
        props: ["weather", "entityStates", "headlines"],
    }
</script>

<style scoped>

</style>
