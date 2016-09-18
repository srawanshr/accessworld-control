<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="alert alert-info alert-callout">
            <p>
                <i class="md md-info"></i>
                Note: These changes will not be reflected on DHCP.
            </p>
        </div>
        {{ Form::model($ip,['route'=>['ip.update',$ip->id],'class'=>'form-horizontal','method'=>'PUT']) }}
        <div class="card">
            <div class="card-head style-accent-bright">
                <header>Edit IP in IP Pool</header>
                <div class="tools">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    {{ Form::label('ip', 'IP Address', ['class'=>'col-sm-4 control-label']) }}
                    <div class="col-sm-8">
                        {{ Form::text('ip', null, ['class'=>'form-control ip-mask', 'required']) }}
                        <div class="form-control-line"></div>
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('mac', 'MAC Address', ['class' => 'col-sm-4 control-label']) }}
                    <div class="col-sm-8">
                        {{ Form::text('mac', null, ['class'=>'form-control']) }}
                        <div class="form-control-line"></div>
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('subnet_id', 'Subnet', ['class' => 'col-sm-4 control-label']) }}
                    <div class="col-sm-8">
                        {{ Form::select('subnet_id', $subnets, old('subnet_id'), ['class'=>'form-control', 'required']) }}
                        <div class="form-control-line"></div>
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('hostname', 'Hostname', ['class' => 'col-sm-4 control-label']) }}
                    <div class="col-sm-8">
                        {{ Form::text('hostname', null, ['class'=>'form-control']) }}
                        <div class="form-control-line"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Used</label>
                    <div class="col-sm-8">
                        <div class="checkbox checkbox-styled">
                            <label>
                                {{ Form::checkbox("is_used", 1, old('is_used'), ['class' => 'form-control']) }}
                                <span>Used</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-actionbar style-accent-bright">
                <div class="card-actionbar-row">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.ip-mask').inputmask("ip");
    });
</script>
