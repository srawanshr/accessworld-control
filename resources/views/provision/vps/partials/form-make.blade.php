<div class="card-body" id="provision-app">
    <div id="rootwizard1" class="form-wizard form-wizard-horizontal">
        <form class="form floating-label form-validate">
            {!! csrf_field() !!}
            <div class="form-wizard-nav">
                <div class="progress" style="width: 75%">
                    <div class="progress-bar progress-bar-primary" :style="'width:'+progress+'%;'"></div>
                </div>
                <ul class="nav nav-justified">
                    <li :class="{ 'active' : step == 1 }">
                        <a href="#"
                           v-on:click="gotoStep(1)"><span class="step">1</span>
                            <span class="title">Select VM</span></a></li>
                    <li :class="{ 'active' : step == 2 }">
                        <a href="#"
                           v-on:click="gotoStep(2)"><span class="step">2</span>
                            <span class="title">Provision Details</span></a></li>
                    <li :class="{ 'active' : step == 3 }">
                        <a href="#"
                           v-on:click="gotoStep(3)"><span class="step">3</span>
                            <span class="title">Subscription Details</span></a></li>
                    <li :class="{ 'active' : step == 4 }">
                        <a href="#"
                           v-on:click="gotoStep(4)"><span class="step">4</span>
                            <span class="title">Finish</span></a></li>
                </ul>
            </div><!--end .form-wizard-nav -->
            <div class="tab-content clearfix">
                <div class="tab-pane" :class="{ 'active' : step == 1 }" id="vmselect">
                    <h2>Select the VM where the VPS will be created</h2>
                    <div v-for="(vm, name) in vm_list">
                        <div class="radio radio-styled">
                            <label>
                                <input type="radio" name="vm" :value="vm" v-model="provision.virtual_machine" required>
                                @{{ name }}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" :class="{ 'active' : step == 2 }" id="tab1">
                    <br /><br />
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" v-model="provision.name" required>
                                <label>Name</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <select name="operating_system"
                                        class="form-control"
                                        v-model="provision.operating_system" required>
                                    <option selected value>Select an OS</option>
                                    <option v-for="os in operating_systems" :value="os.uuid">
                                        @{{ os['name-label'] }}
                                    </option>
                                </select>
                                <label>Operating System</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <select name="data_center_id"
                                        class="form-control"
                                        v-model="provision.data_center_id"
                                        required>
                                    <option selected value>Select a DataCenter</option>
                                    <option v-for="(id, name) in data_centers" :value="id">
                                        @{{ name }}
                                    </option>
                                </select>
                                <label>Data Center</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text"
                                       name="server_id"
                                       class="form-control"
                                       v-model="provision.server_id"
                                       required>
                                <label>Server ID</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <select name="ip_address"
                                        class="form-control select2-list"
                                        v-model="provision.ip_address"
                                        required>
                                    <option selected value>Select an IP</option>
                                    <option v-for="ip in ips" :value="ip">
                                        @{{ ip }}
                                    </option>
                                </select>
                                <label>IP Address</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text"
                                       name="additional_ip"
                                       class="form-control"
                                       v-model="provision.additional_ip">
                                <label>Additional IP</label>
                                <p class="help-block">For multiple ips, separate with a comma (,)</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-content">
                                        <input type="number"
                                               name="cpu"
                                               id="cpu"
                                               class="form-control"
                                               min="1"
                                               step="1"
                                               v-model="provision.cpu" required>
                                        <label>CPU</label>
                                    </div>
                                    <span class="input-group-addon">CORE</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-content">
                                        <input type="number"
                                               name="ram"
                                               id="ram"
                                               class="form-control"
                                               min="1"
                                               step="1"
                                               v-model="provision.ram" required>
                                        <label>RAM</label>
                                    </div>
                                    <span class="input-group-addon">GB</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-content">
                                        <input type="number"
                                               name="disk"
                                               id="disk"
                                               class="form-control"
                                               min="1"
                                               step="1"
                                               v-model="provision.disk" required>
                                        <label>DISK/STORAGE</label>
                                    </div>
                                    <span class="input-group-addon">GB</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-content">
                                        <input type="number"
                                               name="traffic"
                                               id="traffic"
                                               class="form-control"
                                               min="1"
                                               step="1"
                                               v-model="provision.traffic" required>
                                        <label>TRAFFIC/BANDWIDTH</label>
                                    </div>
                                    <span class="input-group-addon">GB</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end #tab1 -->
                <div class="tab-pane" :class="{ 'active' : step == 3 }" id="tab2">
                    <br /><br />
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="date"
                                       name="created_at"
                                       class="form-control"
                                       v-model="provision.created_at" required>
                                <label>Provision Date</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-content">
                                        <input type="nubmer"
                                               name="term"
                                               class="form-control text-right"
                                               min="1"
                                               v-model="provision.term" required>
                                        <label>Term</label>
                                    </div>
                                    <span class="input-group-addon">Month(s)</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <span class="text-default-light text-light">Is Managed</span>
                            <div class="checkbox checkbox-styled">
                                <label>
                                    <input type="checkbox"
                                           name="is_managed"
                                           v-model="provision.is_managed">
                                    <span>Managed</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <span class="text-default-light text-light">Is Trial</span>
                            <div class="checkbox checkbox-styled">
                                <label>
                                    <input name="is_trial"
                                           type="checkbox"
                                           v-model="provision.is_trial">
                                    <span>Trial</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div><!--end #tab2 -->
                <div class="tab-pane text-center" :class="{ 'active' : step == 4 }" id="tab3">
                    <div class="alert alert-callout alert-warning">
                        <i class="md md-warning"></i>
                        <p>
                            Please verify all the settings before proceeding.
                        </p>
                        <p>
                            <button type="button" class="btn-success btn-lg" id="submit-btn" v-on:click="submitProvision" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Provisioning...">
                                <i class="md md-cloud-upload"></i>
                                Provision
                            </button>
                        </p>
                    </div>
                </div>
            </div><!--end .tab-content -->
            <ul class="pager wizard">
                <li class="previous"><a class="btn-raised" href="#" v-on:click="previous">Previous</a></li>
                <li class="next"><a class="btn-raised" href="#" v-on:click="next">Next</a></li>
            </ul>
        </form>
    </div><!--end #rootwizard -->
</div>

@push('styles')
<link rel="stylesheet" href="{{ asset('css/libs/wizard/wizard.css') }}">
<link rel="stylesheet" href="{{ asset('css/libs/select2/select2.css') }}" />
<style>
    .nav > li > a:hover, .nav > li > a:focus {
        background: none;
    }
</style>
@endpush
@push('scripts')
<script src="{{ asset('js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
<script src="{{ asset('js/libs/select2/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/vue.js') }}"></script>
<script>
    var vm = new Vue({
        el: '#provision-app',

        data: {
            step: 1,
            max_step: 4,
            min_step: 1,
            vm_list: {!! json_encode(vms()) !!},
            progress: 0,
            operating_systems: false,
            data_centers: {!! json_encode(data_centers()) !!},
            ips: {!! json_encode(ips()->values()) !!},
            provision: {
                name: '{{ old('name', str_slug($vpsOrder->name)) }}',
                cpu: '{{ old('cpu', $vpsOrder->cpu) }}',
                ram: '{{ old('ram', $vpsOrder->ram) }}',
                disk: '{{ old('disk', $vpsOrder->disk) }}',
                traffic: '{{ old('traffic', $vpsOrder->traffic)}}',
                ip_address: "{{ old('ip_address') }}",
                virtual_machine: '',
                operating_system: '',
                server_id: "{{ old('server_id') }}",
                data_center_id: '{{ old('data_center_id') }}',
                created_at: '{{ old('created_at', date('Y-m-d')) }}',
                term: {{ old('term', 12) }}
            }
        },

        ready: function () {
            this.provision.virtual_machine = {!! empty(old('vm')) ? 'this.firstItem(this.vm_list)' : "'".old('vm')."'" !!};
            $(".select2-list").select2({allowClear: true});
        },

        watch: {
            'step': 'updateProgress',

            'provision.virtual_machine': 'fetchOperatingSystem',

            'provision.data_center_id': 'fetchServerId'
        },

        methods: {
            firstItem: function (obj) {
                for (var a in obj) return a;
            },

            updateProgress: function () {
                this.progress = ((this.step - 1) / ( this.max_step - 1) ) * 100;
            },

            fetchOperatingSystem: function () {
                this.operating_systems = false;
                var v = this;
                $.ajax({
                    type: 'GET',
                    data: {vm: this.provision.virtual_machine},
                    url: '{{ route('vm.os.list') }}',
                    success: function (operating_systems) {
                        v.operating_systems = operating_systems;
                    }
                })
            },

            fetchServerId: function () {
                var v = this;
                if (this.provision.data_center_id != "") {
                    $.ajax({
                        type: 'GET',
                        data: {datacenter: this.provision.data_center_id, type: 1},
                        url: '{{ route('vm.serverid') }}',
                        success: function (server_id) {
                            v.provision.server_id = server_id;
                        }
                    });
                }
            },

            submitProvision: function () {
                var $btn = $('#submit-btn');
                $btn.button('loading');
                $.ajax({
                    type: 'POST',
                    data: $('.form-validate').serialize(),
                    success: function () {
                        $btn.button('reset');
                        bootbox.alert('VPS Provision Successful.', function(){
                            window.location.href = '{{ route('order.vps.index') }}';
                        });
                    },
                    error: function(e) {
                        $btn.button('reset');
                        bootbox.alert('Error provisioning. Error Description: <br>'+ JSON.stringify(e));
                    }
                })
            },

            next: function () {
                if (!( this.step == this.max_step) && this.validForm())
                    this.step += 1;
            },

            previous: function () {
                if (!(this.step == this.min_step) && this.validForm())
                    this.step -= 1;
            },

            gotoStep: function (step) {
                if (this.validForm() && step < this.step)
                    this.step = step;
            },

            validForm: function () {
                return $('.form-validate').valid();
            }
        }
    });
</script>
@endpush