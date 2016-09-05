<div class="card-body">
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group">
                {!! Form::select('customer_id', $customers, old('customer_id'), ['class'=>'form-control select2-list', 'data-placeholder' => 'Select a customer', 'required', 'multiple']) !!}
                <label>Customer</label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <div class="checkbox checkbox-inline checkbox-styled">
                    <label>
                        {!! Form::checkbox('is_published', 1, old('is_published')) !!}
                        <span>Publish</span>
                    </label>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group floating-label">
                {!! Form::textarea('quote', old('quote'), ['class'=>'form-control', 'required', 'maxlength' => 300, 'rows'=>4]) !!}
                <label>Quote</label>
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
