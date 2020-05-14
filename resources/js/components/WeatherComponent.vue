<template>
    <div v-if="this.weather !== null" class="weather-view button text-center">
        <img class="float-left" :src="this.weather.weather[0].icon_image">
        <p class="pt-3">{{ this.weather.main.temp.toFixed(1) }}&deg;C ({{ this.weather.main.feels_like.toFixed(1) }}&deg;C)</p>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                weather: this.$parent.$data.weather,
            }
        },
        name: "WeatherComponent",
        mounted() {
            console.log(this.weather);
        }
    }
</script>

<style scoped>

</style>
