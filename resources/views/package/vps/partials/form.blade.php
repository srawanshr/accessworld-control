<div class="card-body">
    @include('partials.errors')
    <div class="floating-label">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    {{ Form::text('name', old('name'), ['class'=>'form-control', 'required']) }}
                    <label>Name</label>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::text('price_npr', old('price_npr'), ['class'=>'form-control', 'min'=>0, 'max'=>999999.99, 'step'=>'any']) }}
                    <label for="price">Price (NRS)</label>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::text('price_usd', old('price_usd'), ['class'=>'form-control', 'min'=>0, 'max'=>999999.99, 'step'=>'any']) }}
                    <label for="price">Price (USD)</label>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    {{ Form::text('discount', old('discount'), ['class'=>'form-control', 'min'=>0, 'max'=>100, 'step'=>'any']) }}
                    <label for="discount">Discount (0-100)</label>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <div class="checkbox checkbox-styled">
                        <label>
                            {{ Form::checkbox("is_published", 1, old('is_published'), ['class' => 'form-control']) }}
                            <span>Publish</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <div class="checkbox checkbox-styled">
                        <label>
                            {{ Form::checkbox("is_featured", 1, old('is_featured'), ['class' => 'form-control']) }}
                            <span>Feature</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Description</label>
                    {{ Form::textarea('description', old('description'), ['class'=>'form-control', 'rows'=>'4', 'required']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::number("cpu", old("cpu"), ['class'=>'form-control', 'required', 'min' => '1']) }}
                    {{ Form::label("cpu", "CPU (in GB)") }}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::number("ram", old("ram"), ['class'=>'form-control', 'required', 'step' => 'any']) }}
                    {{ Form::label("ram", "RAM (in GB)") }}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::number("traffic", old("traffic"), ['class'=>'form-control', 'required', 'step' => 'any']) }}
                    {{ Form::label("traffic", "Traffic (in GB)") }}
                </div>
            </div>
            <div class="col-sm-6">
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
        @if(auth()->user()->can('save.content'))
            <button type="submit" class="btn btn-flat btn-primary ink-reaction">Save</button>
        @endif
    </div>
</div>
