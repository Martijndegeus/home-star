<template>
    <a href="#"
       v-bind:class="(mediaInfo !== null && mediaInfo.state === 'playing' ? 'active' : '') + ('' + size === 'small' ? ' small-button' : '')"
       @click.prevent="play('media_player.' +mediaPlayer)"
       class="button d-flex align-items-center justify-content-center"
       id="play_button">
        <play-icon title="" :size="size === 'small' ? 30 : 36"></play-icon>
    </a>
</template>

<script>
    export default {
        name: "MediaPlayButton",
        props: ["mediaInfo", "mediaPlayer", "size"],
        methods: {
            play(entityId) {
                let _this = this;
                let playButton = document.getElementById('play_button');
                let pauseButton = document.getElementById('pause_button');
                pauseButton.classList.remove('active');
                playButton.classList.add('active');
                axios.get('api/media/' + entityId + '/play').then(() => {
                    console.log('Playing on ' + entityId);
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
