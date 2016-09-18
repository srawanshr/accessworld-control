<div class="card-body" id="renew-app">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-content">
                        <input type="nubmer" name="term" class="form-control text-right" min="1">
                        <label>Term</label>
                    </div>
                    <span class="input-group-addon">Month(s)</span>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                {{ Form::date('date', old('date'),['class'=>'form-control', 'v-model' => 'date', 'required']) }}
                <label>Effective Date</label>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">{{ currency() }}</span>
                    <div class="input-group-content">
                        {{ Form::number('sub_total', old('sub_total'),['class'=>'form-control', 'v-model' => 'sub_total', 'required']) }}
                        <label>Sub Total</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">{{ currency() }}</span>
                    <div class="input-group-content">
                        {{ Form::number('discount', old('discount'),['class'=>'form-control','v-model' => 'discount', 'required']) }}
                        <label for="name">Discount</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">{{ currency() }}</span>
                    <div class="input-group-content">
                        {{ Form::number('vat', old('vat'),['class'=>'form-control', 'v-model' => 'vat', 'required']) }}
                        <label>Vat Amt</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">{{ currency() }}</span>
                    <div class="input-group-content">
                        {{ Form::number('total', old('total'),['class'=>'form-control','v-model' => 'total', 'required']) }}
                        <label>Total Price</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card-actionbar">
    <div class="card-actionbar-row">
        <input type="reset" class="btn btn-flat btn-default" value="Reset">
        <input type="submit" class="btn btn-primary" value="Save">
    </div>
</div>

@push('scripts')
    <script src="{{ asset('assets/js/vue.js') }}"></script>
    <script>
        var vm = new Vue({
            el: '#renew-app',

            data: {
                term: 0,
                date: '',
                sub_total: 0,
                discount: 0
            },

            computed: {
                vat: function() {
                    return parseFloat((parseFloat(this.sub_total).toFixed(2) - parseFloat(this.discount).toFixed(2)) * 0.13).toFixed(2);
                },
                total: function() {
                    return parseFloat(this.sub_total) + parseFloat(this.vat) - parseFloat(this.discount);
                }
            }

        })
    </script>
@endpush