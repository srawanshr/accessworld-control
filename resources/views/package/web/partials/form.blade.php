<div class="card-body">
    @include('partials.errors')
    <div class="floating-label">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::text('name', old('name'), ['class'=>'form-control', 'required']) }}
                    <label>Name</label>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    {{ Form::text('price', old('price'), ['class'=>'form-control', 'min'=>0, 'max'=>999999.99, 'step'=>'any']) }}
                    <label for="price">Price</label>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    {{ Form::text('discount', old('discount'), ['class'=>'form-control', 'min'=>0, 'max'=>999999.99, 'step'=>'any']) }}
                    <label for="discount">Discount</label>
                </div>
            </div>
            <div class="col-sm-1">
                <div class="form-group">
                    <div class="checkbox checkbox-styled">
                        <label>
                            {{ Form::checkbox("is_published", 1, old('is_published'), ['class' => 'form-control']) }}
                            <span>Publish</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-sm-1">
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
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::number("domain", old("domain"), ['class'=>'form-control domain-field priceable', 'required', 'min' => '1']) }}
                            {{ Form::label("domain", "Domain") }}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::number("traffic", old("traffic"), ['class'=>'form-control traffic-field priceable', 'required', 'step' => 'any']) }}
                            {{ Form::label("traffic", "Traffic (in GB)") }}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::number("disk", old("disk"), ['class'=>'form-control disk-field priceable', 'required', 'step' => 'any']) }}
                            {{ Form::label("disk", "Disk (in GB)") }}
                        </div>
                    </div>
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
