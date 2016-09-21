<div class="card-body">
    @include('partials.errors')
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                {{ Form::text('name', old('name'), ['class'=>'form-control', 'required']) }}
                <label>Name</label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                {{ Form::text('website', old('website'), ['class'=>'form-control', 'required', 'data-rule-url' => true]) }}
                <label>Website</label>
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
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="form-group">
                        @if(isset($client))
                            <img src="{{ thumbnail(150, $client) }}" data-src="{{ thumbnail(150, $client) }}" class="preview" height="150" width="150">
                        @else
                            <img src="{{ asset(config('paths.placeholder.default')) }}" data-src="{{ asset(config('paths.placeholder.default')) }}" class="preview" height="150" width="150">
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                {{ Form::file('image', ['class' => 'image-input', isset($client) ? '':'required', 'accept' => 'image/*', 'data-msg' => 'Please enter a value with a valid image. PNG, JPG or GIF']) }}
                <label>Image</label>
            </div>
        </div>
    </div>
</div><!--end .card-body -->
<div class="card-actionbar">
    <div class="card-actionbar-row">
        <button type="reset" class="btn btn-flat">Reset</button>
        @if(auth()->user()->can('save.content'))
            <button type="submit" class="btn btn-primary">Save</button>
        @endif
    </div>
</div>
