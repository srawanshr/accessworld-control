<div class="card-body">
    @include('partials.errors')
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group">
                {{ Form::select('customer_id',$customers,old('customer_id'),['id'=>'testimonial_customer_id','class'=>'form-control select2-list','data-placeholder'=>'Select a customer','required']) }}
                <label for="testimonial_customer_id">Customer</label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <div class="checkbox checkbox-inline checkbox-styled">
                    <label>
                        {{ Form::checkbox('is_published', 1, old('is_published')) }}
                        <span>Publish</span>
                    </label>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group floating-label">
                {{ Form::textarea('quote',old('quote'),['id'=>'testimonial_quote','class'=>'form-control','required','maxlength' => 300,'rows'=>4]) }}
                <label for="testimonial_quote">Quote</label>
            </div>
        </div>
    </div>
</div><!--end .card-body -->
<div class="card-actionbar">
    <div class="card-actionbar-row">
        <button type="reset" class="btn btn-flat">Reset</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</div>
