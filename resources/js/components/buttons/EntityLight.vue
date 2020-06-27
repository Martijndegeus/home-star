<template>
    <a href="#" @click.prevent="changeLight('light.' + lightName, $event)"
       :class="entityStates !== null && entityStates.light['light.' + lightName].state === 'on' ? 'active ' : ''"
       class="button small-button d-flex align-items-center justify-content-center">
        <component :is="icon" title="" :size="30"></component>
    </a>
</template>

<script>
    export default {
        name: "EntityLight",
        props: ["lightName", "entityStates", "icon"],
        methods: {
            changeLight(entityId, event) {
                let _this = this;
                let button = event.target;
                axios.get('api/lights/' + entityId + '/change').then((result) => {
                    _this.$snotify.success('Turning light ' + result.data);
                    if (result.data === 'on') {
                        button.classList.add('active');
                    } else {
                        button.classList.remove('active');
                    }
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
