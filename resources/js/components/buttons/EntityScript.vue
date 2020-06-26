<template>
    <a href="#" @click.prevent="scriptOn('script.' + script)"
       class="button d-flex align-items-center justify-content-center">
        <component :is="icon" title="" :size="36"></component>
    </a>
</template>

<script>
    export default {
        name: "EntityScript",
        props: ["script", "icon"],
        methods: {
            scriptOn(entityId) {
                let _this = this;
                axios.get('api/scripts/' + entityId + '/on').then(() => {
                    console.log('Switched ' + entityId + ' on');
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
