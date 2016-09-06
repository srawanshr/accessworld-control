<div class="card-body floating-label">
    <div class="row">
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    @if(isset($staff))
                        <img src="{{ thumbnail(200, $staff) }}" data-src="{{ thumbnail(200, $staff) }}" class="preview" alt="avatar" width="200" height="200">
                    @else
                        <img src="{{ thumbnail(200) }}" data-src="{{ thumbnail(200) }}" class="preview" alt="avatar" width="200" height="200">
                    @endif
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        {{ Form::text('fname', old('fname'), ['class' => 'form-control']) }}
                        {{ Form::label('fname', 'First Name') }}
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        {{ Form::text('lname', old('lname'), ['class' => 'form-control']) }}
                        {{ Form::label('lname', 'Last Name') }}
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        {{ Form::email('email', old('email'), ['class' => 'form-control', 'required']) }}
                        {{ Form::label('email', 'Email') }}
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        {{ Form::text('bloodgroup', old('bloodgroup'), ['class' => 'form-control']) }}
                        {{ Form::label('bloodgroup', 'Blood Group') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                {{ Form::text('address', old('address'), ['class' => 'form-control']) }}
                {{ Form::label('address', 'Address') }}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                {{ Form::text('phone', old('phone'), ['class' => 'form-control']) }}
                {{ Form::label('phone', 'Phone') }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                {{ Form::select('company', $companies, old('company'), ['class' => 'form-control']) }}
                {{ Form::label('company', 'Company Name') }}
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <div class="checkbox checkbox-inline checkbox-styled">
                    <label>
                        {{ Form::checkbox('is_active', 1, old('is_active')) }}
                        Active
                    </label>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                {{ Form::file('image', ['class' => 'image-input', 'accept' => 'image/*', 'data-msg' => trans('validation.mimes', ['attribute' => 'avatar', 'values' => 'png, jpeg'])]) }}
                {{ Form::label('image', 'Profile Picture') }}
            </div>
        </div>
    </div>
</div>
<div class="card-actionbar">
    <div class="card-actionbar-row">
        <a href="{{ Request::url() }}" class="btn btn-flat ink-reaction">Reset</a>
        <button type="submit" class="btn btn-flat btn-primary ink-reaction">Save</button>
    </div>
</div>
