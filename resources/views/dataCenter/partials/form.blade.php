<div class="card-body">
    @include('partials.errors')
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                {{ Form::text('name', old('name'), [ 'class' => 'form-control', 'required' ]) }}
                <label for="name">Name</label>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                {{ Form::text('country', old('country'), [ 'class' => 'form-control', 'required' ]) }}
                <label>Countries</label>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                {{ Form::text('prefix', old('prefix'), [ 'class' => 'form-control', 'required' ]) }}
                <label for="prefix">Prefix</label>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                {{ Form::text('price', old('price'), ['class'=>'form-control', 'min'=>0, 'max'=>999999.99, 'step'=>'any']) }}
                <label for="price">Price</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="form-group">
                        @if(isset($dataCenter))
                            <img src="{{ thumbnail(200, $dataCenter) }}" data-src="{{ thumbnail(200, $dataCenter) }}" class="preview" height="150" width="150">
                        @else
                            <img src="{{ thumbnail(200) }}" data-src="{{ thumbnail(200) }}" class="preview" height="150" width="150">
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                {{ Form::file('image', ['class' => 'image-input', isset($dataCenter) ? '':'required', 'accept' => 'image/*', 'data-msg' => 'Please enter a value with a valid image. PNG, JPG or GIF']) }}
                <label>Image</label>
            </div>
        </div>
    </div>
</div>
<div class="card-actionbar">
    <div class="card-actionbar-row">
        <button type="reset" class="btn btn-flat ink-reaction">Reset</button>
        <button type="submit" class="btn btn-flat btn-primary ink-reaction">Save</button>
    </div>
</div>