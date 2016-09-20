{{ Form::model($emailProvision, ['route'=>['provision.email.update',$emailProvision->id],'class'=>'form form-validate','novalidate']) }}
{{ method_field('PUT') }}
<div class="card-body">
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                {{ Form::date('created_at', old('created_at') ?: $emailProvision->created_at->format('Y-m-d'), ['id'=>'created_at','class'=>'form-control','required']) }}
                <label for="created_at">Provision Date</label>
                <p class="help-block">mm/dd/yyyy</p>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                {{ Form::text('connection_string', old('connection_string') ?: $emailProvision->connection_string,['id'=>'connection_string','class'=>'form-control','required']) }}
                <label for="connection_string">Connection String</label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                {{ Form::text('server_domain_id', old('server_domain_id') ?: $emailProvision->server_domain_id,['id'=>'server_domain_id','class'=>'form-control','required']) }}
                <label for="server_domain_id">Server Domain Id</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-content">
                        <input type="number" name="domain" id="domain" class="form-control" min="1" step="1" value="{{$emailProvision->domain}}">
                        <label for="domain">Domain</label>
                    </div>
                    <span class="input-group-addon">#</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-content">
                        <input type="number" name="disk" id="disk" class="form-control" min="1" step="1" value="{{$emailProvision->disk}}">
                        <label for="disk">DISK/STORAGE</label>
                    </div>
                    <span class="input-group-addon">GB</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-content">
                        <input type="number" name="traffic" id="traffic" class="form-control" min="1" step="1" value="{{$emailProvision->traffic}}">
                        <label for="traffic">TRAFFIC/BANDWIDTH</label>
                    </div>
                    <span class="input-group-addon">GB</span>
                </div>
            </div>
        </div>
    </div>
    <br/> <br/>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                {{ Form::text('name', old('name') ?: $emailProvision->name,['id'=>'name','class'=>'form-control','required']) }}
                <label for="name">Name</label>
            </div>
        </div>
    </div>
</div>
<div class="card-actionbar">
    <div class="card-actionbar-row">
        @if(auth()->user()->can('save.provision'))
            <input type="submit" class="btn btn-primary" value="Save">
        @endif
    </div>
</div>
{{ Form::close() }}