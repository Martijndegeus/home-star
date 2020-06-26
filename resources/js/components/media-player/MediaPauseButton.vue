<template>
    <a href="#"
       v-bind:class="(mediaInfo !== null && mediaInfo.state === 'paused' ? 'active' : '') + ('' + size === 'small' ? ' small-button' : '')"
       @click.prevent="pause('media_player.' +mediaPlayer)"
       class="button d-flex align-items-center justify-content-center"
       id="pause_button">
        <pause-icon title="" :size="size === 'small' ? 30 : 36"></pause-icon>
    </a>
</template>

<script>
    export default {
        name: "MediaPauseButton",
        props: ["mediaInfo", "mediaPlayer", "size"],
        methods: {
            pause(entityId) {
                let _this = this;
                let playButton = document.getElementById('play_button');
                let pauseButton = document.getElementById('pause_button');
                pauseButton.classList.add('active');
                playButton.classList.remove('active');
                axios.get('api/media/' + entityId + '/pause').then(() => {
                    console.log('Paused ' + entityId);
                }).catch(function (error) {
                    console.log(error);
                    _this.$snotify.error('Something went wrong...');
                });
            },

        }
    }
</script>

<style scoped>

</style>
