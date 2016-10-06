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
                            <span class="title">Provision Details</span></a></li>
                    <li :class="{ 'active' : step == 2 }">
                        <a href="#"
                           v-on:click="gotoStep(2)"><span class="step">2</span>
                            <span class="title">Subscription Details</span></a></li>
                    <li :class="{ 'active' : step == 3 }">
                        <a href="#"
                           v-on:click="gotoStep(3)"><span class="step">3</span>
                            <span class="title">Finish</span></a></li>
                </ul>
            </div><!--end .form-wizard-nav -->
            <div class="tab-content clearfix">
                <div class="tab-pane" :class="{ 'active' : step == 1 }" id="tab1">
                    <br /><br />
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" v-model="provision.name" required>
                                <label>Name</label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text"
                                       name="domain"
                                       class="form-control"
                                       v-model="provision.domain"
                                       required>
                                <label>domain</label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" name="disk" class="form-control" v-model="provision.disk" required>
                                <label>disk</label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text"
                                       name="traffic"
                                       class="form-control"
                                       v-model="provision.traffic"
                                       required>
                                <label>Traffic</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text"
                                       name="username"
                                       class="form-control"
                                       v-model="provision.username"
                                       required>
                                <label>Lakuri User</label>
                            </div>
                        </div>
                        <input type="hidden" name="new_user" :value="newLakuriUser ? 1 : 0">
                        <div class="col-sm-6" v-if="newLakuriUser">
                            <div class="form-group">
                                <input type="text" name="password" class="form-control" v-model="provision.password" required>
                                <label>Lakuri Password</label>
                                <p class="help-block">Password for the new Lakuri User</p>
                            </div>
                        </div>
                        <div class="col-sm-6" v-else>
                            <p>User Detected in Lakuri</p>
                        </div>
                    </div>
                </div><!--end #tab1 -->
                <div class="tab-pane" :class="{ 'active' : step == 2 }" id="tab2">
                    <br /><br />
                    <div class="row">
                        <div class="col-sm-5 col-sm-offset-1">
                            <div class="form-group">
                                <input type="date"
                                       name="created_at"
                                       class="form-control"
                                       v-model="provision.created_at" required>
                                <label>Provision Date</label>
                            </div>
                        </div>
                        <div class="col-md-5">
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
                    </div>
                </div><!--end #tab2 -->
                <div class="tab-pane text-center" :class="{ 'active' : step == 3 }" id="tab3">
                    <div class="alert alert-callout alert-warning">
                        <i class="md md-warning"></i>
                        <p>
                            Please verify all the settings before proceeding.
                        </p>
                        <p>
                            <button type="button"
                                    class="btn-success btn-lg"
                                    id="submit-btn"
                                    v-on:click="submitProvision"
                                    data-loading-text="<i class='fa fa-spinner fa-spin'></i> Provisioning...">
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
<script src="{{ asset('js/vue.js') }}"></script>
<script>
    var vm = new Vue({
        el: '#provision-app',

        data: {
            step: 1,
            max_step: 3,
            min_step: 1,
            progress: 0,
            newLakuriUser: true,
            provision: {
                username: '',
                name: '{{ $emailOrder->name }}',
                domain: '{{ $emailOrder->domain }}',
                disk: '{{ $emailOrder->disk }}',
                traffic: '{{ $emailOrder->traffic }}',
                password: '{{ old('password') }}',
                created_at: '{{ old('created_at', date('Y-m-d')) }}',
                term: {{ old('term', 12) }}
            }
        },

        watch: {
            'step': 'updateProgress',
            'provision.username': 'updateUserStatus'
        },

        ready: function() {
            this.provision.username = '{{ $emailOrder->customer->username }}';
        },

        methods: {

            updateProgress: function () {
                this.progress = ((this.step - 1) / ( this.max_step - 1) ) * 100;
            },

            submitProvision: function () {
                var $btn = $('#submit-btn');
                $btn.button('loading');
                $.ajax({
                    type: 'POST',
                    data: $('.form-validate').serialize(),
                    success: function (response) {
                        $btn.button('reset');
                        if(response.status == 'ok')
                        {
                            bootbox.alert('Email Provision Successful.', function () {
                                window.location.href = '{{ route('order.email.index') }}';
                            });
                        } else {
                            bootbox.alert('Email Provision Not Successful. '+ response.status);
                        }
                    },
                    error: function (e) {
                        $btn.button('reset');
                        bootbox.alert('Error provisioning. Error Description: <br>' + JSON.stringify(e));
                    }
                });
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
            },

            updateUserStatus: function() {
                var v = this;
                return $.ajax({
                    type: 'GET',
                    url: '{{ route('lakuri.checkuser') }}',
                    data: {username: this.provision.username},
                    success: function (response) {
                        v.newLakuriUser = response == 0;
                    },
                    error: function (e) {
                        bootbox.alert('Error fetching Client Information from Lakuri');
                    }
                });
            }
        }
    });
</script>
@endpush