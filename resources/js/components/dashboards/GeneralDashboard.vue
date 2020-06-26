<template>
    <div id="general" class="cube__face cube__face--front pt-2">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-3"></div>
                <div class="col-6">
                    <div v-if="mediaInfo !== null" class="media-progress">
                        <media-progress-bar v-bind:media-info="mediaInfo"></media-progress-bar>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "MediaDashboard",
        props: ["mediaInfo"]
    }
</script>

<style scoped>

</style>
