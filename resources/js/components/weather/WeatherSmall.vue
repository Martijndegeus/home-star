<template>
    <div v-if="weather !== null" class="weather-view button text-center">
        <img class="float-left" :src="weather.weather[0].icons.small">
        <p class="pt-3">{{ weather.main.temp.toFixed(1) }}&deg;C ({{
            weather.main.feels_like.toFixed(1) }}&deg;C)</p>
    </div>
</template>

<script>
    export default {
        name: "WeatherSmall",
        props: ["weather"],
    }
</script>

<style scoped>

</style>
