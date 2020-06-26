<template>
    <div v-if="weather !== null" class="weather-view button text-center">
        <img class="" :src="weather.weather[0].icons.large">
        <p>{{ weather.main.temp.toFixed(1) }}&deg;C ({{
            weather.main.feels_like.toFixed(1) }}&deg;C)</p>
        <p class="text-capitalize">{{ weather.weather[0].description }}</p>
        <p class="float-left">
            <low-temp-icon title=""></low-temp-icon>
            {{ weather.main.temp_min.toFixed(1) }}
        </p>
        <p class="float-right">
            {{ weather.main.temp_max.toFixed(1) }}
            <high-temp-icon title=""></high-temp-icon>
        </p>
        <div class="clearfix"></div>
    </div>
</template>

<script>
    export default {
        name: "WeatherComponent",
        props: ["weather"]
    }
</script>

<style scoped>

</style>
