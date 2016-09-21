<div class="card-body">
    @include('partials.errors')
    <div class="row">
        <div class="col-md-10">
            <div class="form-group">
                {{ Form::text('title',old('title'),['id'=>'certificate_title','class'=>'form-control', 'required']) }}
                <label for="certificate_title">Title</label>
            </div>
        </div>
        <div class="col-md-2">
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
        <div class="col-md-12">
            <div class="form-group">
                {{ Form::textarea('description',old('description'),['id'=>'certificate_description','class'=>'form-control','rows'=>'4','required']) }}
                <label for="certificate_description">Description</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    @if(isset($certificate) && $certificate->image)
                        <img src="{{ thumbnail(150, $certificate) }}" data-src="{{ thumbnail(150, $certificate) }}" class="preview" height="150" width="150">
                    @else
                        <img src="{{ asset(config('paths.placeholder.default')) }}" data-src="{{ asset(config('paths.placeholder.default')) }}" class="preview" height="150" width="150">
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::file('image',['id'=>'certificate_image','class'=>'image-input',isset($certificate) ? '' : 'required','accept'=>'image/*','data-msg'=>trans('validation.mimes', ['attribute'=>'image','values'=>'png, jpeg'])]) }}
                <label for="certificate_image">Image</label>
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
