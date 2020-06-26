<template>
    <a href="#" @click.prevent="volumeUp('media_player.' +mediaPlayer)"
       :class="size === 'small' ? ' small-button' : ''"
       class="button d-flex align-items-center justify-content-center">
        <volume-up-icon title=""  :size="size === 'small' ? 30 : 36"></volume-up-icon>
    </a>
</template>

<script>
    export default {
        name: "MediaVolumeUpButton",
        props: ["mediaInfo", "mediaPlayer", "size"],
        methods: {
            volumeUp(entityId) {
                let _this = this;
                axios.get('api/media/' + entityId + '/volume-up').then(() => {
                    console.log('Volume increased on ' + entityId);
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
