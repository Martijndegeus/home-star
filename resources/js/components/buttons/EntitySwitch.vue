<template>
    <a :class="entityStates.switch['switch.' + switchName].state === 'on' ? 'active ' : ''"
       v-bind:data-title="entityStates.switch['switch.' + switchName].friendly_name"
       @click.prevent="changeSwitch('switch.' + switchName, $event)"
       class="button small-button d-flex align-items-center justify-content-center"
       href="#"
       v-if="entityStates !== null">
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
                let name = button.dataset.entityName;
                axios.get('api/switches/' + entityId + '/change').then((result) => {
                    _this.$snotify.success('Turning switch ' + name);
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
