@extends('layout')

@section('title', 'Setting')

@section('content')
    <section>
        <div class="row">
            <div class="col-sm-4">
                {{ Form::open(['route'=>'setting.update','class'=>'form form-validate','method'=>'PUT','files'=>true,'novalidate']) }}
                <div class="card">
                    <div class="card-head">
                        <header>General</header>
                        <div class="tools">
                            <input type="submit" class="btn btn-primary" value="Save">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::text('setting[name]', old('setting.name') ?: setting('name'), ['class'=>'form-control','required']) }}
                            {{ Form::label('setting[name]', 'Name') }}
                        </div>
                        <div class="form-group">
                            {{ Form::textarea('setting[address]', old('setting.address') ?: setting('address'), ['class'=>'form-control','rows'=>2,'required']) }}
                            {{ Form::label('setting[address]', 'Address') }}
                        </div>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
            <div class="col-sm-4">
                {{ Form::open(['route'=>'setting.update','class'=>'form form-validate','method'=>'PUT','files'=>true,'novalidate']) }}
                <div class="card">
                    <div class="card-head">
                        <header>Contacts</header>
                        <div class="tools">
                            <input type="submit" class="btn btn-primary" value="Save">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::text('setting[phone]', old('setting.phone') ?: setting('phone'), ['class'=>'form-control','required']) }}
                            {{ Form::label('setting[phone]', 'Phone') }}
                        </div>
                        <div class="form-group">
                            {{ Form::text('setting[email]', old('setting.email') ?: setting('email'), ['class'=>'form-control','required']) }}
                            {{ Form::label('setting[email]', 'Email') }}
                        </div>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
            <div class="col-sm-4">
                {{ Form::open(['route'=>'setting.update','class'=>'form form-validate','method'=>'PUT','files'=>true,'novalidate']) }}
                <div class="card">
                    <div class="card-head">
                        <header>Social Links</header>
                        <div class="tools">
                            <input type="submit" class="btn btn-primary" value="Save">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::textarea('setting[facebook]', old('setting.facebook') ?: setting('facebook'), ['class'=>'form-control','rows'=>2,'required']) }}
                            {{ Form::label('setting[facebook]', 'Facebook') }}
                        </div>
                        <div class="form-group">
                            {{ Form::textarea('setting[twitter]', old('setting.twitter') ?: setting('twitter'), ['class'=>'form-control','rows'=>2,'required']) }}
                            {{ Form::label('setting[twitter]', 'Twitter') }}
                        </div>
                        <div class="form-group">
                            {{ Form::textarea('setting[google_plus]', old('setting.google_plus') ?: setting('google_plus'), ['class'=>'form-control','rows'=>2,'required']) }}
                            {{ Form::label('setting[google_plus]', 'Google Plus') }}
                        </div>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </section>
@stop