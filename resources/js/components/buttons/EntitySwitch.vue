<template>
    <a href="#"
       @click.prevent="changeSwitch('switch.' + switchName, $event)"
       :class="entityStates !== null && entityStates.switch['switch.' + switchName].state === 'on' ? 'active ' : ''"
       class="button small-button d-flex align-items-center justify-content-center">
        <component :is="icon" :size="30"></component>
<!--        <{{ icon }}-icon title="" :size="30"></{{ icon }}-icon>-->
    </a>

</template>

<script>
    export default {
        name: "EntitySwitch",
        props: ["switchName", "entityStates", "icon"],
        methods: {
            changeSwitch(entityId, event) {
                let _this = this;
                let button = event.target;
                axios.get('api/switches/' + entityId + '/change').then((result) => {
                    console.log('Changed state for ' + entityId);
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
