{{ Form::model($endpointSecurityOrder, ['route' => ['order.endpointSecurity.update', $endpointSecurityOrder->id], 'class' => 'form form-validate', 'method' => 'PUT']) }}
<div class="card">
    <div class="card-head style-accent-bright">
        <header>Email Order</header>
        <div class="tools">
            @if(auth()->user()->can('save.order'))
                <input type="submit" class="btn btn-primary" value="Save">
            @endif
            @if(!$endpointSecurityOrder->is_provisioned && auth()->user()->can('save.provision'))
                <input type="submit" class="btn btn-success" name="provision" value="Provision">
            @endif
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <input type="number" name="user_count" id="user_count" class="form-control" value="{{old('user_count') ?: $endpointSecurityOrder->user_count}}" min="1" required>
                    <label for="user_count">User Count</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="number" name="term" id="term" class="form-control" min="1" value="{{old('term') ?: $endpointSecurityOrder->term}}" required>
                    <label for="term">Term (in months)</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">{{ config('website.currency') }}</span>
                        <div class="input-group-content">
                            <input type="number" name="price" class="form-control" id="price" min="0" step="any" value="{{old('price') ?: $endpointSecurityOrder->price}}" required>
                            <label for="price">Price</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">{{ config('website.currency') }}</span>
                        <div class="input-group-content">
                            <input type="number" name="discount" class="form-control" id="discount" min="0" step="any" value="{{old('discount') ?: $endpointSecurityOrder->discount}}">
                            <label for="discount">Discount</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}