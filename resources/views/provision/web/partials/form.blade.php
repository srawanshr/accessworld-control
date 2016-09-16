<div class="card-body">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-content">
                        <input type="number" name="term" id="term" class="form-control" min="1" value="{{$webOrder->term ?: 7}}" >
                        <label for="term">Term</label>
                    </div>
                    <span class="input-group-addon">Months</span>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-content">
                        <input type="number" name="domain" id="domain" class="form-control" min="1" value="{{$webOrder->domain}}" >
                        <label for="domain">Domain</label>
                    </div>
                    <span class="input-group-addon">#</span>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-content">
                        <input type="number" name="disk" id="disk" class="form-control" min="1" value="{{$webOrder->disk}}" >
                        <label for="disk">Disk</label>
                    </div>
                    <span class="input-group-addon">GB</span>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-content">
                        <input type="number" name="traffic" id="traffic" class="form-control" min="1" value="{{$webOrder->traffic}}" >
                        <label for="traffic">Traffic</label>
                    </div>
                    <span class="input-group-addon">GB</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                {{ Form::date('created_at', old('created_at') ?: date('Y-m-d'),['id'=>'created_at','class'=>'form-control','required']) }}
                <label for="created_at">Provision Date</label>
            </div>
        </div>
    </div>
    <br/> <br/>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                {{ Form::text('name', old('name') ?: $webOrder->name,['id'=>'name','class'=>'form-control','required']) }}
                <label for="name">Name</label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                {{ Form::text('connection_string', old('connection_string'), ['id'=>'connection_string','class'=>'form-control','required']) }}
                <label for="connection_string">Connection String</label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="number" name="server_domain_id" id="server_domain_id" class="form-control" min="1" value="{{ old('server_domain_id') }}" >
                <label for="server_domain_id">server Domain ID</label>
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