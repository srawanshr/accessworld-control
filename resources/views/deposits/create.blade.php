<div class="form-group">
    {{ Form::open(['route' => ['customer.deposit.store', $customer->username], 'id' => 'deposit-form', 'novalidate','onkeypress'=>'return event.keyCode != 13;' ]) }}
    <div class="col-sm-6 col-sm-offset-3">
        <div class="well">
            <div class="input-group input-group-lg">
                <div class="input-group-addon">
                    {{ currency() }}
                </div>
                <div class="input-group-content">
                    {{ Form::number('amount', null, ['class' => 'form-control entered-amount', 'step' => 'any', 'placeholder' => 'Amount', 'required']) }}
                    <div class="form-control-line"></div>
                </div>
                <div class="input-group-btn">
                    <button class="btn ink-reaction btn-success btn-add" type="button"><i class="md md-add"></i> Add
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
</div>
