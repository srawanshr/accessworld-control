<div class="card-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                {{ Form::text('name', old('name'), ['class'=>'form-control', 'required']) }}
                <label for="name">Name</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                {{ Form::text('short_description', old('short_description'), ['class'=>'form-control']) }}
                <label for="short_description">Short Description</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                {{ Form::textarea('description', old('description'), ['class'=>'form-control summer-note']) }}
                {{ Form::label('description', 'Description') }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="form-group">
                        @if(isset($service) && $service->image)
                            <img src="{{ thumbnail(150, $service) }}" data-src="{{ thumbnail(150, $service) }}" class="preview" height="150" width="150">
                        @else
                            <img src="{{ asset(config('paths.placeholder.default')) }}" data-src="{{ asset(config('paths.placeholder.default')) }}" class="preview" height="150" width="150">
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                {{ Form::file('image', ['class' => 'image-input', isset($service) ? '' : 'required', 'accept' => 'image/*', 'data-msg' => trans('validation.mimes', ['attribute' => 'image', 'values' => 'png, jpeg'])]) }}
                <label for="image">Image</label>
            </div>
        </div>
    </div>
</div>
<div class="card-actionbar">
    <div class="card-actionbar-row">
        <button type="reset" class="btn btn-flat ink-reaction">Reset</button>
        @if(auth()->user()->can('save.content'))
            <button type="submit" class="btn btn-flat btn-primary ink-reaction">Save</button>
        @endif
    </div>
</div>