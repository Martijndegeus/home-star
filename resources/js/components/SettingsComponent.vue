<template>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Entities</h3>
                    </div>

                    <div class="card-body">
                        <ul class="nav nav-tabs" id="settings_tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="switches-tab" data-toggle="tab" href="#switches"
                                   role="tab" aria-controls="switches" aria-selected="true">Switches</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="sensors-tab" data-toggle="tab" href="#sensors" role="tab"
                                   aria-controls="sensors" aria-selected="false">Sensors</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="other-tab" data-toggle="tab" href="#other" role="tab"
                                   aria-controls="other" aria-selected="false">Other</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="settings_tab_content">
                            <div class="tab-pane fade show active" id="switches" role="tabpanel"
                                 aria-labelledby="switches-tab">
                                <div class="table-responsive p-0">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>State</th>
                                            <th>Test</th>
                                            <th>Include</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="device in devices.switch"
                                            :key="device.entity_id" v-if="device.state != 0">
                                            <td :title="device.entity_id">{{ device.attributes.friendly_name }}</td>
                                            <td>{{ device.state }}</td>
                                            <td>
                                                <span v-if="device.state === 'on'"><a href="#"
                                                                                      @click.prevent="switchOff(device.entity_id)"><on-icon
                                                    :size="38" title="Turn Off" /></a></span>
                                                <span v-else-if="device.state === 'off'"><a href="#"
                                                                                            @click.prevent="switchOn(device.entity_id)"><off-icon
                                                    :size="38" title="Turn On" class="text-muted" /></a></span>
                                            </td>
                                            <td>
                                                <span v-if="device.state === 'on'"><a href="#"
                                                                                      @click.prevent="switchOff(device.entity_id)"><check-checked-icon
                                                    :size="38" title="Turn Off"/></a></span>
                                                <span v-else-if="device.state === 'off'"><a href="#"
                                                                                            @click.prevent="switchOn(device.entity_id)"><check-blank-icon
                                                    :size="38" title="Turn On"/></a></span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="sensors" role="tabpanel" aria-labelledby="sensors-tab">
                                <div class="table-responsive p-0">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>State</th>
                                            <th>Test</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="device in devices.sensor"
                                            :key="device.entity_id">
                                            <td :title="device.entity_id">{{ device.attributes.friendly_name }}</td>
                                            <td>{{ device.state }}</td>
                                            <td><a href="#" @click.prevent="switchState(device.entity_id)">Change
                                                State</a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="other-tab">
                                <div class="table-responsive p-0">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>State</th>
                                            <th>Test</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="device in devices.other" :key="device.entity_id">
                                            <td :title="device.entity_id">{{ device.attributes.friendly_name }}</td>
                                            <td>{{ device.state }}</td>
                                            <td>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <vue-snotify></vue-snotify>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                editMode: false,
                devices: {},
            }
        },
        methods: {
            loadDevices() {
                let _this = this;
                axios.get('api/entities').then(function (result) {
                    _this.devices = result.data;
                })
            },
            switchOn(entityId) {
                let _this = this;
                axios.get('api/switches/' + entityId + '/on').then(function (result) {
                    _this.$snotify.success('Entity switched on');
                    setTimeout(function () {
                        _this.loadDevices()
                    }, 1000);
                }).catch(function(error) {
                    console.log(error);
                    _this.$snotify.error('Something went wrong...');
                });
            },
            switchOff(entityId) {
                let _this = this;
                axios.get('api/switches/' + entityId + '/off').then(function (result) {
                    _this.$snotify.success('Entity switched off');
                    setTimeout(function () {
                        _this.loadDevices()
                    }, 1000);
                }).catch(function(error) {
                    console.log(error);
                    _this.$snotify.error('Something went wrong...');
                });
            }
        },
        created() {
            this.loadDevices();
        }
    }
</script>

<style scoped>
    body {
        width: 120vw;
    }
</style>
