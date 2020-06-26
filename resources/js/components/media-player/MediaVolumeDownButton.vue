<template>
    <a href="#" @click.prevent="volumeDown('media_player.' +mediaPlayer)"
       :class="size === 'small' ? ' small-button' : ''"
       class="button d-flex align-items-center justify-content-center">
        <volume-down-icon title="" :size="size === 'small' ? 30 : 36"></volume-down-icon>
    </a>
</template>

<script>
    export default {
        name: "MediaVolumeDownButton",
        props: ["mediaInfo", "mediaPlayer", "size"],
        methods: {
            volumeDown(entityId) {
                let _this = this;
                axios.get('api/media/' + entityId + '/volume-down').then(() => {
                    console.log('Volume decreased on ' + entityId);
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
