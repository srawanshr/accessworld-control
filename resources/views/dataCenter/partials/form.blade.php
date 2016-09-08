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
    </div>
</div>
<div class="card-actionbar">
    <div class="card-actionbar-row">
        <button type="reset" class="btn btn-flat ink-reaction">Reset</button>
        <button type="submit" class="btn btn-flat btn-primary ink-reaction">Save</button>
    </div>
</div>