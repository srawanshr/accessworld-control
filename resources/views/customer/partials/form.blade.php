<div class="card-body floating-label">
    @include('partials.errors')
    <div class="row">
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    @if(isset($customer))
                        <img src="{{ thumbnail(200, $customer) }}" data-src="{{ thumbnail(200, $customer) }}" class="preview" alt="avatar" width="200" height="200">
                    @else
                        <img src="{{ asset(config('paths.placeholder.avatar')) }}" data-src="{{ asset(config('paths.placeholder.avatar')) }}" class="preview" alt="avatar" width="200" height="200">
                    @endif
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        {{ Form::text('detail.first_name', old('detail.first_name'),['class' => 'form-control']) }}
                        {{ Form::label('detail.first_name', 'First Name') }}
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        {{ Form::text('details.last_name', old('details.last_name'),['class' => 'form-control']) }}
                        {{ Form::label('details.last_name', 'Last Name') }}
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        {{ Form::email('email', old('email'),['class' => 'form-control', 'required']) }}
                        {{ Form::label('email', 'Email') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                {{ Form::text('username', old('username'),['class' => 'form-control', 'required']) }}
                {{ Form::label('username', 'Username') }}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                {{ Form::text('details.country', old('details.country'),['class' => 'form-control', 'id' => 'country-selector', 'data-source' => asset('data/countries.json'), 'required']) }}
                {{ Form::label('details.country', 'Country') }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                {{ Form::password('password', ['class' => 'form-control', isset($customer) ? '' : 'required']) }}
                {{ Form::label('password', 'Password') }}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                {{ Form::password('password_confirmation', ['class' => 'form-control', isset($customer) ? '' : 'required']) }}
                {{ Form::label('password_confirmation', 'Confirm Password') }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                {{ Form::text('details.address', old('details.address'),['class' => 'form-control']) }}
                {{ Form::label('details.address', 'Address') }}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                {{ Form::text('details.phone', old('details.phone'),['class' => 'form-control']) }}
                {{ Form::label('details.phone', 'Phone') }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                {{ Form::text('details.company', old('details.company'),['class' => 'form-control']) }}
                {{ Form::label('details.company', 'Company') }}
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <div class="checkbox checkbox-inline checkbox-styled">
                    <label>
                        {!! Form::checkbox('is_admin', 1, old('is_admin')) !!}
                        <span>Admin</span>
                    </label>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                {{ Form::file('image', ['class' => 'image-input', 'accept' => 'image/*', 'data-msg' => trans('validation.mimes', ['attribute' => 'avatar', 'values' => 'png, jpeg'])]) }}
                {{ Form::label('image', 'Avatar') }}
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
