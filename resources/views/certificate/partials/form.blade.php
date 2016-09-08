<div class="card-body">
    @include('partials.errors')
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                {{ Form::text('title',old('title'),['class'=>'form-control', 'required']) }}
                <label>Title</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                {{ Form::textarea('description',old('description'),['class'=>'form-control', 'required']) }}
                <label>Description</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    @if(isset($certificate) && $certificate->image)
                        <img src="{{ asset($certificate->image->path) }}" data-src="{{ asset($certificate->image->path) }}" class="preview" height="150" width="150">
                    @else
                        <img src="{{ asset(config('paths.placeholder.default')) }}" data-src="{{ asset(config('paths.placeholder.default')) }}" class="preview" height="150" width="150">
                    @endif
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                {{ Form::file('image', ['class' => 'image-input', isset($certificate) ? '':'required', 'accept' => 'image/*', 'data-msg' => 'Please enter a value with a valid image. PNG, JPG or GIF']) }}
                <label>Image</label>
            </div>
        </div>
    </div>
</div><!--end .card-body -->
<div class="card-actionbar">
    <div class="card-actionbar-row">
        <button type="reset" class="btn btn-flat ink-reaction">Reset</button>
        <button type="submit" class="btn btn-flat btn-primary ink-reaction">Save</button>
    </div>
</div>
