<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        {{ Form::model($map,['route'=>['dhcp.map.update',$map->ip],'class'=>'form-horizontal','method'=>'PUT']) }}
        <div class="card">
            <div class="card-head style-accent-bright">
                <header>Edit DHCP IP</header>
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
                        {{ Form::text('mac', null, ['class'=>'form-control', 'required']) }}
                        <div class="form-control-line"></div>
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('subnet', 'Subnet', ['class' => 'col-sm-4 control-label']) }}
                    <div class="col-sm-8">
                        {{ Form::text('subnet', null, ['class'=>'form-control', 'required']) }}
                        <div class="form-control-line"></div>
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('hostname', 'Hostname', ['class' => 'col-sm-4 control-label']) }}
                    <div class="col-sm-8">
                        {{ Form::text('hostname', null, ['class'=>'form-control', 'required']) }}
                        <div class="form-control-line"></div>
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('serial', 'Serial', ['class' => 'col-sm-4 control-label']) }}
                    <div class="col-sm-8">
                        {{ Form::text('serial', null, ['class'=>'form-control', 'required']) }}
                        <div class="form-control-line"></div>
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
