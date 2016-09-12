<div class="order">
    <div class="card">
        <div class="card-head">
            <header>{{ $service->name }} {{ ++$key }}</header>
            <div class="tools">
                <div class="btn-group">
                    <a class="btn btn-icon-toggle btn-collapse">
                        <i class="md md-arrow-drop-down"></i>
                    </a>
                    <a class="btn btn-icon-toggle btn-close btn-danger">
                        <i class="md md-close"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if('vps' == $service->slug)
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" name="vps[{{$key}}][name]" id="vps[{{$key}}][name]" class="form-control" value="{{old('vps.'.$key.'.name')}}" required>
                            <label for="vps[{{$key}}][name]">Name</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" name="vps[{{$key}}][term]" id="vps[{{$key}}][term]" class="form-control" min="1" value="{{old('vps.'.$key.'.term')}}">
                            <label for="vps[{{$key}}][term]">Term (in months)</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <span class="text-default-light text-light">Is Trial</span>
                        <div class="checkbox checkbox-styled">
                            <label>
                                <input type="checkbox" value="1" name="vps[{{$key}}][is_trial]" {{old('vps.'.$key.'.is_trial') ? 'checked' : ''}}>
                                <span>Trial</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::select('vps['.$key.'][operating_system_id]',operating_systems(),old('vps.'.$key.'.operating_system_id'),['id'=>'vps['.$key.'][operating_system_id]','class'=>'form-control']) }}
                            <label for="vps[{{$key}}][operating_system_id]">Operating System</label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::select('vps['.$key.'][data_center_id]',data_centers(),old('vps.'.$key.'.data_center_id'),['id'=>'vps['.$key.'][data_center_id]','class'=>'form-control']) }}
                            <label for="vps[{{$key}}][data_center_id]">Data Center</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">{{ config('website.currency') }}</span>
                                <div class="input-group-content">
                                    <input type="number" name="vps[{{$key}}][price]" class="form-control" id="vps[{{$key}}][price]" min="0" step="any" value="{{old('vps.'.$key.'.price')}}">
                                    <label for="vps[{{$key}}][price]">Price</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">{{ config('website.currency') }}</span>
                                <div class="input-group-content">
                                    <input type="number" name="vps[{{$key}}][discount]" class="form-control" id="vps[{{$key}}][discount]" min="0" step="any" value="{{old('vps.'.$key.'.discount')}}">
                                    <label for="vps[{{$key}}][discount]">Discount</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <input type="number" name="vps[{{$key}}][additional_ip]" id="vps[{{$key}}][additional_ip]" class="form-control" min="0" value="{{old('vps.'.$key.'.additional_ip')}}">
                            <label for="vps[{{$key}}][additional_ip]">Additional IP</label>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <span class="text-default-light text-light">Is Managed</span>
                        <div class="checkbox checkbox-styled">
                            <label>
                                <input type="checkbox" value="1" name="vps[{{$key}}][is_managed]" {{old('vps.'.$key.'.is_managed') ? 'checked' : ''}}>
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
                                    <input type="number" name="vps[{{$key}}][cpu]" id="vps[{{$key}}][cpu]" class="form-control" min="1" step="1" value="{{old('vps.'.$key.'.cpu')}}">
                                    <label for="vps[{{$key}}][cpu]">CPU</label>
                                </div>
                                <span class="input-group-addon">CORE</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-content">
                                    <input type="number" name="vps[{{$key}}][ram]" id="vps[{{$key}}][ram]" class="form-control" min="1" step="1" value="{{old('vps.'.$key.'.ram')}}">
                                    <label for="vps[{{$key}}][ram]">RAM</label>
                                </div>
                                <span class="input-group-addon">GB</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-content">
                                    <input type="number" name="vps[{{$key}}][disk]" id="vps[{{$key}}][disk]" class="form-control" min="1" step="1" value="{{old('vps.'.$key.'.disk')}}">
                                    <label for="vps[{{$key}}][disk]">DISK/STORAGE</label>
                                </div>
                                <span class="input-group-addon">GB</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-content">
                                    <input type="number" name="vps[{{$key}}][traffic]" id="vps[{{$key}}][traffic]" class="form-control" min="1" step="1" value="{{old('vps.'.$key.'.traffic')}}">
                                    <label for="vps[{{$key}}][traffic]">TRAFFIC/BANDWIDTH</label>
                                </div>
                                <span class="input-group-addon">GB</span>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif('web' == $service->slug)
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" name="web[{{$key}}][name]" id="web[{{$key}}][name]" class="form-control" value="{{old('web.'.$key.'.name')}}" required>
                            <label for="web[{{$key}}][name]">Name</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" name="web[{{$key}}][term]" id="web[{{$key}}][term]" class="form-control" min="1" value="{{old('web.'.$key.'.term')}}" required>
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
                                    <input type="number" name="web[{{$key}}][price]" class="form-control" id="web[{{$key}}][price]" min="0" step="any" value="{{old('web.'.$key.'.price')}}" required>
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
                                    <input type="number" name="web[{{$key}}][discount]" class="form-control" id="web[{{$key}}][discount]" min="0" step="any" value="{{old('web.'.$key.'.discount')}}">
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
                                    <input type="number" name="web[{{$key}}][domain]" id="web[{{$key}}][domain]" class="form-control" min="1" step="1" value="{{old('web.'.$key.'.domain')}}">
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
                                    <input type="number" name="web[{{$key}}][disk]" id="web[{{$key}}][disk]" class="form-control" min="1" step="1" value="{{old('web.'.$key.'.disk')}}">
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
                                    <input type="number" name="web[{{$key}}][traffic]" id="web[{{$key}}][traffic]" class="form-control" min="1" step="1" value="{{old('web.'.$key.'.traffic')}}">
                                    <label for="web[{{$key}}][traffic]">TRAFFIC/BANDWIDTH</label>
                                </div>
                                <span class="input-group-addon">GB</span>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" name="email[{{$key}}][name]" id="email[{{$key}}][name]" class="form-control" value="{{old('email.'.$key.'.name')}}" required>
                            <label for="email[{{$key}}][name]">Name</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" name="email[{{$key}}][term]" id="email[{{$key}}][term]" class="form-control" min="1" value="{{old('email.'.$key.'.term')}}" required>
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
                                    <input type="number" name="email[{{$key}}][price]" class="form-control" id="email[{{$key}}][price]" min="0" step="any" value="{{old('email.'.$key.'.price')}}" required>
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
                                    <input type="number" name="email[{{$key}}][discount]" class="form-control" id="email[{{$key}}][discount]" min="0" step="any" value="{{old('email.'.$key.'.discount')}}">
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
                                    <input type="number" name="email[{{$key}}][domain]" id="email[{{$key}}][domain]" class="form-control" min="1" step="1" value="{{old('email.'.$key.'.domain')}}">
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
                                    <input type="number" name="email[{{$key}}][disk]" id="email[{{$key}}][disk]" class="form-control" min="1" step="1" value="{{old('email.'.$key.'.disk')}}">
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
                                    <input type="number" name="email[{{$key}}][traffic]" id="email[{{$key}}][traffic]" class="form-control" min="1" step="1" value="{{old('email.'.$key.'.traffic')}}">
                                    <label for="email[{{$key}}][traffic]">TRAFFIC/BANDWIDTH</label>
                                </div>
                                <span class="input-group-addon">GB</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
