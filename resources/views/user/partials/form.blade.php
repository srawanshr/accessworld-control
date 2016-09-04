<div class="card-body floating-label">
    @include('partials.errors')
    <div class="row">
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    @if(isset($user))
                        <img src="{{ user_avatar(200, $user->slug) }}" data-src="{{ user_avatar(200, $user->slug) }}" class="avatar" alt="preview" width="200" height="200">
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
                        {{ Form::text('username', old('username'),['class' => 'form-control', 'required']) }}
                        {{ Form::label('username', 'Username') }}
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
                {{ Form::text('first_name', old('first_name'),['class' => 'form-control']) }}
                {{ Form::label('first_name', 'First Name') }}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                {{ Form::text('last_name', old('last_name'),['class' => 'form-control']) }}
                {{ Form::label('last_name', 'Last Name') }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                {{ Form::password('password', ['class' => 'form-control', isset($user) ? '' : 'required']) }}
                {{ Form::label('password', 'Password') }}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                {{ Form::password('password_confirmation', ['class' => 'form-control', isset($user) ? '' : 'required']) }}
                {{ Form::label('password_confirmation', 'Confirm Password') }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                {{ Form::text('address', old('address'),['class' => 'form-control']) }}
                {{ Form::label('address', 'Address') }}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                {{ Form::text('phone', old('phone'),['class' => 'form-control']) }}
                {{ Form::label('phone', 'Phone') }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                @if($roles->isEmpty())
                    {{ trans('messages.empty', ['entity' => 'Roles']) }}
                @else
                    {{ Form::select('role', $roles, isset($user) ? $user->roles->first()->id : old('role'), ['class' => 'form-control', 'required']) }}
                    {{ Form::label('role', 'Role') }}
                @endif
            </div>
        </div>
        <div class="col-sm-6">
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
