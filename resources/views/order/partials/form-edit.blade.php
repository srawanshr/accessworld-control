@foreach($order->vpsOrder as $key => $vpsOrder)
<div class="order">
    <div class="card">
        <div class="card-head">
            <header>VPS {{ ++$key }}</header>
            <div class="tools">
                <div class="btn-group">
                    <a class="btn btn-icon-toggle btn-collapse">
                        <i class="md md-arrow-drop-down"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" name="vps[{{$vpsOrder->id}}][name]" id="vps[{{$vpsOrder->id}}][name]" class="form-control" value="{{old('vps.'.$vpsOrder->id.'.name') ?: $vpsOrder->name}}" required>
                        <label for="vps[{{$vpsOrder->id}}][name]">Name</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="number" name="vps[{{$vpsOrder->id}}][term]" id="vps[{{$vpsOrder->id}}][term]" class="form-control" min="1" value="{{old('vps.'.$vpsOrder->id.'.term') ?: $vpsOrder->term}}">
                        <label for="vps[{{$vpsOrder->id}}][term]">Term (in months)</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <span class="text-default-light text-light">Is Trial</span>
                    <div class="checkbox checkbox-styled">
                        <label>
                            <input type="checkbox" value="1" name="vps[{{$vpsOrder->id}}][is_trial]" {{old('vps.'.$vpsOrder->id.'.is_trial') ? 'checked' : $vpsOrder->is_trial ? 'checked' : ''}}>
                            <span>Trial</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        {{ Form::select('vps['.$vpsOrder->id.'][operating_system_id]',operating_systems(),old('vps.'.$vpsOrder->id.'.operating_system_id'),['id'=>'vps['.$vpsOrder->id.'][operating_system_id]','class'=>'form-control']) }}
                        <label for="vps[{{$vpsOrder->id}}][operating_system_id]">Operating System</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {{ Form::select('vps['.$vpsOrder->id.'][data_center_id]',data_centers(),old('vps.'.$vpsOrder->id.'.data_center_id'),['id'=>'vps['.$vpsOrder->id.'][data_center_id]','class'=>'form-control']) }}
                        <label for="vps[{{$vpsOrder->id}}][data_center_id]">Data Center</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">{{ config('website.currency') }}</span>
                            <div class="input-group-content">
                                <input type="number" name="vps[{{$vpsOrder->id}}][price]" class="form-control" id="vps[{{$vpsOrder->id}}][price]" min="0" step="any" value="{{old('vps.'.$vpsOrder->id.'.price') ?: $vpsOrder->price}}">
                                <label for="vps[{{$vpsOrder->id}}][price]">Price</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">{{ config('website.currency') }}</span>
                            <div class="input-group-content">
                                <input type="number" name="vps[{{$vpsOrder->id}}][discount]" class="form-control" id="vps[{{$vpsOrder->id}}][discount]" min="0" step="any" value="{{old('vps.'.$vpsOrder->id.'.discount') ?: $vpsOrder->discount}}">
                                <label for="vps[{{$vpsOrder->id}}][discount]">Discount</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="form-group">
                        <input type="number" name="vps[{{$vpsOrder->id}}][additional_ip]" id="vps[{{$vpsOrder->id}}][additional_ip]" class="form-control" min="0" value="{{old('vps.'.$vpsOrder->id.'.additional_ip') ?: $vpsOrder->additional_ip}}">
                        <label for="vps[{{$vpsOrder->id}}][additional_ip]">Additional IP</label>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <span class="text-default-light text-light">Is Managed</span>
                    <div class="checkbox checkbox-styled">
                        <label>
                            <input type="checkbox" value="1" name="vps[{{$vpsOrder->id}}][is_managed]" {{old('vps.'.$vpsOrder->id.'.is_managed') ? 'checked' : $vpsOrder->is_managed ? 'checked' : ''}}>
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
                                <input type="number" name="vps[{{$vpsOrder->id}}][cpu]" id="vps[{{$vpsOrder->id}}][cpu]" class="form-control" min="1" step="1" value="{{old('vps.'.$vpsOrder->id.'.cpu') ?: $vpsOrder->cpu}}">
                                <label for="vps[{{$vpsOrder->id}}][cpu]">CPU</label>
                            </div>
                            <span class="input-group-addon">CORE</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-content">
                                <input type="number" name="vps[{{$vpsOrder->id}}][ram]" id="vps[{{$vpsOrder->id}}][ram]" class="form-control" min="1" step="1" value="{{old('vps.'.$vpsOrder->id.'.ram') ?: $vpsOrder->ram}}">
                                <label for="vps[{{$vpsOrder->id}}][ram]">RAM</label>
                            </div>
                            <span class="input-group-addon">GB</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-content">
                                <input type="number" name="vps[{{$vpsOrder->id}}][disk]" id="vps[{{$vpsOrder->id}}][disk]" class="form-control" min="1" step="1" value="{{old('vps.'.$vpsOrder->id.'.disk') ?: $vpsOrder->disk}}">
                                <label for="vps[{{$vpsOrder->id}}][disk]">DISK/STORAGE</label>
                            </div>
                            <span class="input-group-addon">GB</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-content">
                                <input type="number" name="vps[{{$vpsOrder->id}}][traffic]" id="vps[{{$vpsOrder->id}}][traffic]" class="form-control" min="1" step="1" value="{{old('vps.'.$vpsOrder->id.'.traffic') ?: $vpsOrder->traffic}}">
                                <label for="vps[{{$vpsOrder->id}}][traffic]">TRAFFIC/BANDWIDTH</label>
                            </div>
                            <span class="input-group-addon">GB</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@foreach($order->webOrder as $key => $webOrder)
    <div class="order">
        <div class="card">
            <div class="card-head">
                <header>Web Hosting {{ ++$key }}</header>
                <div class="tools">
                    <div class="btn-group">
                        <a class="btn btn-icon-toggle btn-collapse">
                            <i class="md md-arrow-drop-down"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" name="web[{{$key}}][name]" id="web[{{$key}}][name]" class="form-control" value="{{old('web.'.$key.'.name') ?: $webOrder->name}}" required>
                            <label for="web[{{$key}}][name]">Name</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" name="web[{{$key}}][term]" id="web[{{$key}}][term]" class="form-control" min="1" value="{{old('web.'.$key.'.term') ?: $webOrder->term}}" required>
                            <label for="web[{{$key}}][term]">Term (in months)</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">{{ config('website.currency') }}</span>
                                <div class="input-group-content">
                                    <input type="number" name="web[{{$key}}][price]" class="form-control" id="web[{{$key}}][price]" min="0" step="any" value="{{old('web.'.$key.'.price') ?: $webOrder->price}}" required>
                                    <label for="web[{{$key}}][price]">Price</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">{{ config('website.currency') }}</span>
                                <div class="input-group-content">
                                    <input type="number" name="web[{{$key}}][discount]" class="form-control" id="web[{{$key}}][discount]" min="0" step="any" value="{{old('web.'.$key.'.discount') ?: $webOrder->discount}}">
                                    <label for="web[{{$key}}][discount]">Discount</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-content">
                                    <input type="number" name="web[{{$key}}][domain]" id="web[{{$key}}][domain]" class="form-control" min="1" step="1" value="{{old('web.'.$key.'.domain') ?: $webOrder->domain}}">
                                    <label for="web[{{$key}}][domain]">DOMAIN</label>
                                </div>
                                <span class="input-group-addon">#</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-content">
                                    <input type="number" name="web[{{$key}}][disk]" id="web[{{$key}}][disk]" class="form-control" min="1" step="1" value="{{old('web.'.$key.'.disk') ?: $webOrder->disk}}">
                                    <label for="web[{{$key}}][disk]">DISK/STORAGE</label>
                                </div>
                                <span class="input-group-addon">GB</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-content">
                                    <input type="number" name="web[{{$key}}][traffic]" id="web[{{$key}}][traffic]" class="form-control" min="1" step="1" value="{{old('web.'.$key.'.traffic') ?: $webOrder->traffic}}">
                                    <label for="web[{{$key}}][traffic]">TRAFFIC/BANDWIDTH</label>
                                </div>
                                <span class="input-group-addon">GB</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
@foreach($order->emailOrder as $key => $emailOrder)
    <div class="order">
        <div class="card">
            <div class="card-head">
                <header>Email {{ ++$key }}</header>
                <div class="tools">
                    <div class="btn-group">
                        <a class="btn btn-icon-toggle btn-collapse">
                            <i class="md md-arrow-drop-down"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" name="email[{{$key}}][name]" id="email[{{$key}}][name]" class="form-control" value="{{old('email.'.$key.'.name') ?: $emailOrder->name}}" required>
                            <label for="email[{{$key}}][name]">Name</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" name="email[{{$key}}][term]" id="email[{{$key}}][term]" class="form-control" min="1" value="{{old('email.'.$key.'.term') ?: $emailOrder->term}}" required>
                            <label for="email[{{$key}}][term]">Term (in months)</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">{{ config('website.currency') }}</span>
                                <div class="input-group-content">
                                    <input type="number" name="email[{{$key}}][price]" class="form-control" id="email[{{$key}}][price]" min="0" step="any" value="{{old('email.'.$key.'.price') ?: $emailOrder->price}}" required>
                                    <label for="email[{{$key}}][price]">Price</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">{{ config('website.currency') }}</span>
                                <div class="input-group-content">
                                    <input type="number" name="email[{{$key}}][discount]" class="form-control" id="email[{{$key}}][discount]" min="0" step="any" value="{{old('email.'.$key.'.discount') ?: $emailOrder->discount}}">
                                    <label for="email[{{$key}}][discount]">Discount</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-content">
                                    <input type="number" name="email[{{$key}}][domain]" id="email[{{$key}}][domain]" class="form-control" min="1" step="1" value="{{old('email.'.$key.'.domain') ?: $emailOrder->domain}}">
                                    <label for="email[{{$key}}][domain]">DOMAIN</label>
                                </div>
                                <span class="input-group-addon">#</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-content">
                                    <input type="number" name="email[{{$key}}][disk]" id="email[{{$key}}][disk]" class="form-control" min="1" step="1" value="{{old('email.'.$key.'.disk') ?: $emailOrder->disk}}">
                                    <label for="email[{{$key}}][disk]">DISK/STORAGE</label>
                                </div>
                                <span class="input-group-addon">GB</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-content">
                                    <input type="number" name="email[{{$key}}][traffic]" id="email[{{$key}}][traffic]" class="form-control" min="1" step="1" value="{{old('email.'.$key.'.traffic') ?: $emailOrder->traffic}}">
                                    <label for="email[{{$key}}][traffic]">TRAFFIC/BANDWIDTH</label>
                                </div>
                                <span class="input-group-addon">GB</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
