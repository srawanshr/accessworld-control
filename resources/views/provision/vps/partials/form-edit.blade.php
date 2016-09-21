{{ Form::model($vpsProvision, ['route'=>['provision.vps.update',$vpsProvision->id],'class'=>'form form-validate','novalidate']) }}
{{ method_field('PUT') }}
<div class="card-body">
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                {{ Form::date('created_at', old('created_at') ?: $vpsProvision->created_at->format('Y-m-d'), ['id'=>'created_at','class'=>'form-control','required']) }}
                <label for="created_at">Provision Date</label>
                <p class="help-block">mm/dd/yyyy</p>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                {{ Form::date('expiry_date', old('expiry_date') ?: date_create($vpsProvision->expiry_date)->format('Y-m-d'), ['id'=>'expiry_date','class'=>'form-control','required']) }}
                <label for="expiry_date">Expiry Date</label>
                <p class="help-block">mm/dd/yyyy</p>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                {{ Form::select('operating_system_id',operating_systems(),$vpsProvision->operating_system_id,['class'=>'form-control']) }}
                <label for="operating_system_id">Operating System</label>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                {{ Form::select('data_center_id',data_centers(),$vpsProvision->data_center_id,['class'=>'form-control']) }}
                <label for="data_center_id">Data Center</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-3">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-content">
                        <input type="number" name="cpu" id="cpu" class="form-control" min="1" step="1" value="{{$vpsProvision->cpu}}">
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
                        <input type="number" name="ram" id="ram" class="form-control" min="1" step="1" value="{{$vpsProvision->ram}}">
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
                        <input type="number" name="disk" id="disk" class="form-control" min="1" step="1" value="{{$vpsProvision->disk}}">
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
                        <input type="number" name="traffic" id="traffic" class="form-control" min="1" step="1" value="{{$vpsProvision->traffic}}">
                        <label for="traffic">TRAFFIC/BANDWIDTH</label>
                    </div>
                    <span class="input-group-addon">GB</span>
                </div>
            </div>
        </div>
    </div>
    <br/> <br/>
    <div class="row">
        <div class="col-md-3">
            <span class="text-default-light text-light">Is Trial</span>
            <div class="checkbox checkbox-styled">
                <label>
                    <input name="is_trial" id="is_trial" type="checkbox" value="1" {{$vpsProvision->is_trial ? 'checked' : ''}}>
                    <span>Trial</span>
                </label>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <span class="text-default-light text-light">Is Managed</span>
            <div class="checkbox checkbox-styled">
                <label>
                    <input type="checkbox" name="is_managed" value="1" {{$vpsProvision->is_managed ? 'checked' : ''}}>
                    <span>Managed</span>
                </label>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <span class="text-default-light text-light">Is Suspended</span>
            <div class="checkbox checkbox-styled">
                <label>
                    <input type="checkbox" value="1" {{$vpsProvision->is_suspended ? 'checked' : ''}}>
                    <span>Suspended</span>
                </label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                {{ Form::text('name', old('name') ?: $vpsProvision->name,['id'=>'name','class'=>'form-control','required']) }}
                <label for="name">Name</label>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                {{ Form::text('server_id', old('server_id'), ['id'=>'server_id','class'=>'form-control','required']) }}
                <label for="server_id">Server ID</label>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                {{ Form::text('virtual_machine', old('virtual_machine'), ['id'=>'virtual_machine','class'=>'form-control','required']) }}
                <label for="virtual_machine">Virtual Machine</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                {{ Form::text('uuid', old('uuid'),['id'=>'uuid','class'=>'form-control','required']) }}
                <label for="uuid">UUID</label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                {{ Form::text('ip', old('ip'),['id'=>'ip','class'=>'form-control','required']) }}
                <label for="ip">IP Address</label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                {{ Form::text('mac', old('mac'),['id'=>'mac','class'=>'form-control','required']) }}
                <label for="mac">MAC</label>
            </div>
        </div>
    </div>
</div>
<div class="card-actionbar">
    <div class="card-actionbar-row">
        @if(auth()->user()->can('save.provision'))
            <a href="{{ route('provision.vps.renew', $vpsProvision->id) }}" class="btn btn-success pull-left">Renew</a>
            <input type="submit" class="btn btn-primary" value="Save">
        @endif
    </div>
</div>
{{ Form::close() }}