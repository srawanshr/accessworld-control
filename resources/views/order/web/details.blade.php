{{ Form::model($webOrder, ['route' => ['order.web.update', $webOrder->id], 'class' => 'form form-validate', 'method' => 'PUT']) }}
<div class="card">
    <div class="card-head style-accent-bright">
        <header>Web Order</header>
        <div class="tools">
            <input type="submit" class="btn btn-primary" value="Save">
            @unless($webOrder->is_provisioned)
                <a href="{{ route('provision.web.create', $webOrder->id) }}" class="btn btn-success">
                    Provision
                </a>
            @endunless
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <input type="text" name="name" id="name" class="form-control" value="{{old('name') ?: $webOrder->name}}" required>
                    <label for="name">Name</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <input type="number" name="term" id="term" class="form-control" min="1" value="{{old('term') ?: $webOrder->term}}" required>
                    <label for="term">Term (in months)</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">{{ config('website.currency') }}</span>
                        <div class="input-group-content">
                            <input type="number" name="price" class="form-control" id="price" min="0" step="any" value="{{old('price') ?: $webOrder->price}}" required>
                            <label for="price">Price</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">{{ config('website.currency') }}</span>
                        <div class="input-group-content">
                            <input type="number" name="discount" class="form-control" id="discount" min="0" step="any" value="{{old('discount') ?: $webOrder->discount}}">
                            <label for="discount">Discount</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-content">
                            <input type="number" name="domain" id="domain" class="form-control" min="1" step="1" value="{{old('domain') ?: $webOrder->domain}}">
                            <label for="domain">DOMAIN</label>
                        </div>
                        <span class="input-group-addon">#</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-content">
                            <input type="number" name="disk" id="disk" class="form-control" min="1" step="1" value="{{old('disk') ?: $webOrder->disk}}">
                            <label for="disk">DISK/STORAGE</label>
                        </div>
                        <span class="input-group-addon">GB</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-content">
                            <input type="number" name="traffic" id="traffic" class="form-control" min="1" step="1" value="{{old('traffic') ?: $webOrder->traffic}}">
                            <label for="traffic">TRAFFIC/BANDWIDTH</label>
                        </div>
                        <span class="input-group-addon">GB</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}