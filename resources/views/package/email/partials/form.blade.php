<div class="card-body">
    <div class="floating-label">
        <div class="row">
            <div class="col-sm-8">
                <div class="form-group">
                    {{ Form::text('name', old('name'), ['class'=>'form-control', 'required']) }}
                    <label>Name</label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    {{ Form::text('price', old('price'), ['class'=>'form-control', 'min'=>0, 'max'=>999999.99, 'step'=>'any']) }}
                    <label for="price">Price</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Description</label>
                    {{ Form::textarea('description', old('description'), ['class'=>'form-control', 'required']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    {{ Form::number("domain", old("domain"), ['class'=>'form-control', 'required', 'min' => '1']) }}
                    {{ Form::label("domain", "Domain") }}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    {{ Form::number("traffic", old("traffic"), ['class'=>'form-control', 'required', 'step' => 'any']) }}
                    {{ Form::label("traffic", "Traffic (in GB)") }}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    {{ Form::number("disk", old("disk"), ['class'=>'form-control', 'required', 'step' => 'any']) }}
                    {{ Form::label("disk", "Disk (in GB)") }}
                </div>
            </div>
        </div>
    </div>
</div><!--end .card-body -->
<div class="card-actionbar">
    <div class="card-actionbar-row">
        <button type="submit" class="btn btn-flat btn-primary ink-reaction">Save</button>
    </div>
</div>
