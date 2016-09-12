<div class="card">
    @include('partials.errors')
    <div class="card-head">
        <header>{!! $header !!}</header>
        <div class="tools">
            <a class="btn btn-default btn-ink" onclick="history.go(-1);return false;">
                <i class="md md-arrow-back"></i>
                Back
            </a>
            <input type="submit" name="draft" class="btn btn-info ink-reaction" value="Save as Draft">
            <input type="submit" name="publish" class="btn btn-primary ink-reaction" value="Publish">
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    {{ Form::text('title',old('title'),['class'=>'form-control', 'required']) }}
                    {{ Form::label('title','Title') }}
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    {{ Form::text('meta_description',old('meta_description'),['class'=>'form-control']) }}
                    {{ Form::label('meta_description','Meta Description') }}
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    {{ Form::textarea('content',old('content'),['class'=>'form-control summer-note', 'required']) }}
                    {{ Form::label('content','Content') }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                @if(isset($page) && $page->image)
                    <input type="file" name="image" class="dropify" data-default-file="{{ asset($page->image->thumbnail(260,198)) }}"/>
                @else
                    <input type="file" name="image" class="dropify"/>
                @endif
            </div>
        </div>
    </div>
    <div class="card-actionbar">
        <div class="card-actionbar-row">
            <button type="reset" class="btn btn-default ink-reaction">Reset</button>
            <input type="submit" name="draft" class="btn btn-info ink-reaction" value="Save as Draft">
            <input type="submit" name="publish" class="btn btn-primary ink-reaction" value="Publish">
        </div>
    </div>
</div>