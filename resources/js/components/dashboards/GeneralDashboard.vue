<template>
    <div class="cube__face cube__face--front pt-2" id="general">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-3"></div>
                <div class="col-6 text-center">
                    <span class="text-white">System Overview</span>
                </div>
                <div class="col-12" v-if="entityStates !== null">
                    <div class="row">
                        <div class="col-4">
                            <span class="text-white">People</span>
                            <table class="table table-responsive-xs system-overview-table">
                                <tr v-bind="person.id" v-for="person in entityStates.person">
                                    <th class="text-capitalize">{{ person.attributes.friendly_name }}</th>
                                    <td>
                                        <component :class="person.state === 'home' ? 'text-white' : 'text-grey'"
                                                   :is="person.state === 'home' ? 'home-icon' : 'door-open-icon'"></component>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-4">
                            <span class="text-white">Switches</span>
                            <table class="table table-responsive-xs system-overview-table">
                                <tr v-bind="switchEntity.id" v-for="switchEntity in entityStates.switch">
                                    <th class="text-capitalize">{{ switchEntity.attributes.friendly_name }}</th>
                                    <td>
                                        <component :class="switchEntity.state === 'on' ? 'text-white' : 'text-grey'"
                                                   :is="switchEntity.state === 'on' ? 'on-icon' : 'off-icon'"></component>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-4">
                            <span class="text-white">Lights</span>
                            <table class="table table-responsive-xs system-overview-table">
                                <tr v-bind="light.id" v-for="light in entityStates.light">
                                    <th class="text-capitalize">{{ light.attributes.friendly_name }}</th>
                                    <td>
                                        <component :class="light.state === 'on' ? 'text-white' : 'text-grey'"
                                                   :is="light.state === 'on' ? 'on-icon' : 'off-icon'"></component>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "MediaDashboard",
        props: ["entityStates", "mediaInfo"]
    }
</script>

<style scoped>
    .system-overview-table {
        margin-top: 0.5rem;
        color: rgba(255, 255, 255, 0.7);
    }

    .system-overview-table th, .system-overview-table td {
        border: none;
        padding: 0.2rem;
    }

    .system-overview-table td {
        text-align: center;
    }
</style>
