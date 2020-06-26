<template>
    <div>
        <small class="float-left media-counter">0:00</small>
        <small class="float-right media-counter">{{ new
            Date((mediaInfo.attributes.media_duration) *
            1000).toISOString().substr(11, 8) }}</small>
        <div class="media-progress">
            <div class="media-progress-fill"
                 v-bind:style="{ width: (mediaInfo.attributes.media_position / mediaInfo.attributes.media_duration) * 100 + '%' }"></div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ProgressBar",
        props: ["mediaInfo"]
    }
</script>

<style scoped>

</style>
