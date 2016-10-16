<div class="card">
    <div class="card-head style-accent-bright">
        <header>Order Details</header>
        <div class="tools">
            @if($order->is_pending)
                {{ Form::open(['route' => ['order.approve', $order->id, 'approved'], 'class' => 'form-inline']) }}
                    <button type="submit" class="btn btn-success">Approve</button>
                {{ Form::close() }}
                {{ Form::open(['route' => ['order.destroy', $order->id], 'method' => 'DELETE', 'class' => 'form-inline']) }}
                    <button type="submit" class="btn btn-danger">Rejected</button>
                {{ Form::close() }}
            @endif
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            @foreach($order->vpsOrder as $key => $vpsOrder)
                <div class="col-sm-4">
                    <dl class="dl-horizontal">
                        <dt>VPS ORDER</dt>
                        <dd>#{{$vpsOrder->id}}</dd>
                        @unless($vpsOrder->is_trial)
                            <dt>TERM</dt>
                            <dd>{{ $vpsOrder->term }}</dd>
                            <dt>PRICE</dt>
                            <dd>{{ config('website.currency') }}{{ $vpsOrder->price }}</dd>
                            <dt>DISCOUNT</dt>
                            <dd>{{ config('website.currency') }}{{ $vpsOrder->discount }}</dd>
                        @endunless
                        <dt>CPU</dt>
                        <dd>{{ $vpsOrder->cpu }} CORE</dd>
                        <dt>RAM</dt>
                        <dd>{{ $vpsOrder->ram }} GB</dd>
                        <dt>DISK</dt>
                        <dd>{{ $vpsOrder->disk }} GB</dd>
                        <dt>Traffic</dt>
                        <dd>{{ $vpsOrder->traffic }} GB</dd>
                        <dt>TRIAL</dt>
                        <dd>{{ $vpsOrder->is_trial ? 'Yes' : 'No' }}</dd>
                    </dl>
                </div>
            @endforeach
            @foreach($order->webOrder as $key => $webOrder)
                <div class="col-sm-4">
                    <dl class="dl-horizontal">
                        <dt>WEB ORDER</dt>
                        <dd>#{{$webOrder->id}}</dd>
                        <dt>TERM</dt>
                        <dd>{{ $webOrder->term }}</dd>
                        <dt>PRICE</dt>
                        <dd>{{ config('website.currency') }}{{ $webOrder->price }}</dd>
                        <dt>DISCOUNT</dt>
                        <dd>{{ config('website.currency') }}{{ $webOrder->discount }}</dd>
                        <dt>DOMAIN</dt>
                        <dd>{{ $webOrder->domain }}</dd>
                        <dt>DISK</dt>
                        <dd>{{ $webOrder->disk }} GB</dd>
                        <dt>Traffic</dt>
                        <dd>{{ $webOrder->traffic }} GB</dd>
                    </dl>
                </div>
            @endforeach
            @foreach($order->emailOrder as $key => $emailOrder)
                <div class="col-sm-4">
                    <dl class="dl-horizontal">
                        <dt>EMAIL ORDER</dt>
                        <dd>#{{$emailOrder->id}}</dd>
                        <dt>TERM</dt>
                        <dd>{{ $emailOrder->term }}</dd>
                        <dt>PRICE</dt>
                        <dd>{{ config('website.currency') }}{{ $emailOrder->price }}</dd>
                        <dt>DISCOUNT</dt>
                        <dd>{{ config('website.currency') }}{{ $emailOrder->discount }}</dd>
                        <dt>DOMAIN</dt>
                        <dd>{{ $emailOrder->domain }}</dd>
                        <dt>DISK</dt>
                        <dd>{{ $emailOrder->disk }} GB</dd>
                        <dt>Traffic</dt>
                        <dd>{{ $emailOrder->traffic }} GB</dd>
                    </dl>
                </div>
            @endforeach
            @foreach($order->endpointSecurityOrder as $key => $endpointSecurityOrder)
                <div class="col-sm-4">
                    <dl class="dl-horizontal">
                        <dt>Endpoint Security ORDER</dt>
                        <dd>#{{$endpointSecurityOrder->id}}</dd>
                        <dt>TERM</dt>
                        <dd>{{ $endpointSecurityOrder->term }}</dd>
                        <dt>PRICE</dt>
                        <dd>{{ config('website.currency') }}{{ $endpointSecurityOrder->price }}</dd>
                        <dt>DISCOUNT</dt>
                        <dd>{{ config('website.currency') }}{{ $endpointSecurityOrder->discount }}</dd>
                        <dt>User Count</dt>
                        <dd>{{ $endpointSecurityOrder->user_count.' users' }}</dd>
                    </dl>
                </div>
            @endforeach
        </div>
    </div>
</div>
