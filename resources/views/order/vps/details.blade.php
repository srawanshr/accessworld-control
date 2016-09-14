{{ Form::model($vpsOrder, ['route' => ['order.vps.update', $vpsOrder->id], 'class' => 'form form-validate', 'method' => 'PUT']) }}
<div class="card">
    <div class="card-head style-accent-bright">
        <header>VPS Order</header>
        <div class="tools">
            <input type="submit" class="btn btn-primary" value="Save">
            @unless($vpsOrder->is_provisioned)
                <a href="{{ route('provision.vps.create', $vpsOrder->id) }}" class="btn btn-success">
                    Provision
                </a>
            @endunless
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <input type="text" name="name" id="vps_order_name" class="form-control" value="{{old('name') ?: $vpsOrder->name}}" required>
                    <label for="vps_order_name">Name</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <input type="number" name="term" id="term" class="form-control" min="1" value="{{old('term') ?: $vpsOrder->term}}">
                    <label for="term">Term (in months)</label>
                </div>
            </div>
            <div class="col-md-4">
                <span class="text-default-light text-light">Is Trial</span>
                <div class="checkbox checkbox-styled">
                    <label>
                        <input type="checkbox" value="1" name="is_trial" {{old('is_trial') ? 'checked' : $vpsOrder->is_trial ? 'checked' : ''}}>
                        <span>Trial</span>
                    </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::select('operating_system_id',operating_systems(),old('operating_system_id'),['id'=>'operating_system_id','class'=>'form-control']) }}
                    <label for="operating_system_id">Operating System</label>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::select('data_center_id',data_centers(),old('data_center_id'),['id'=>'data_center_id','class'=>'form-control']) }}
                    <label for="data_center_id">Data Center</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">{{ config('website.currency') }}</span>
                        <div class="input-group-content">
                            <input type="number" name="price" class="form-control" id="price" min="0" step="any" value="{{old('price') ?: $vpsOrder->price}}">
                            <label for="price">Price</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">{{ config('website.currency') }}</span>
                        <div class="input-group-content">
                            <input type="number" name="discount" class="form-control" id="discount" min="0" step="any" value="{{old('discount') ?: $vpsOrder->discount}}">
                            <label for="discount">Discount</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="form-group">
                    <input type="number" name="additional_ip" id="additional_ip" class="form-control" min="0" value="{{old('additional_ip') ?: $vpsOrder->additional_ip}}">
                    <label for="additional_ip">Additional IP</label>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <span class="text-default-light text-light">Is Managed</span>
                <div class="checkbox checkbox-styled">
                    <label>
                        <input type="checkbox" value="1" name="is_managed" {{old('is_managed') ? 'checked' : $vpsOrder->is_managed ? 'checked' : ''}}>
                        <span>Managed</span>
                    </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-content">
                            <input type="number" name="cpu" id="cpu" class="form-control" min="1" step="1" value="{{old('cpu') ?: $vpsOrder->cpu}}">
                            <label for="cpu">CPU</label>
                        </div>
                        <span class="input-group-addon">CORE</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-content">
                            <input type="number" name="ram" id="ram" class="form-control" min="1" step="1" value="{{old('ram') ?: $vpsOrder->ram}}">
                            <label for="ram">RAM</label>
                        </div>
                        <span class="input-group-addon">GB</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-content">
                            <input type="number" name="disk" id="disk" class="form-control" min="1" step="1" value="{{old('disk') ?: $vpsOrder->disk}}">
                            <label for="disk">DISK/STORAGE</label>
                        </div>
                        <span class="input-group-addon">GB</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-content">
                            <input type="number" name="traffic" id="traffic" class="form-control" min="1" step="1" value="{{old('traffic') ?: $vpsOrder->traffic}}">
                            <label for="traffic">TRAFFIC/BANDWIDTH</label>
                        </div>
                        <span class="input-group-addon">GB</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}