<div class="card">
    <div class="card-head style-accent-bright">
        <header>Order Details</header>
        <div class="tools"></div>
    </div>
    <div class="card-body">
        <div class="row">
            @foreach($order->vpsOrder as $key => $vpsOrder)
                <div class="col-sm-4">
                    <dl class="dl-horizontal">
                        <dt>VPS ORDER</dt>
                        <dd>#{{$vpsOrder->id}}</dd>
                        <dt>CPU</dt>
                        <dd>{{ $vpsOrder->cpu }} CORE</dd>
                        <dt>RAM</dt>
                        <dd>{{ $vpsOrder->ram }} GB</dd>
                        <dt>DISK</dt>
                        <dd>{{ $vpsOrder->disk }} GB</dd>
                        <dt>Traffic</dt>
                        <dd>{{ $vpsOrder->traffic }} GB</dd>
                        @unless($vpsOrder->is_trial)
                        <dt>PRICE</dt>
                        <dd>{{ config('website.currency') }}{{ $vpsOrder->price }}</dd>
                        <dt>DISCOUNT</dt>
                        <dd>{{ config('website.currency') }}{{ $vpsOrder->discount }}</dd>
                        @endunless
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
                        <dt>DOMAIN</dt>
                        <dd>{{ $webOrder->domain }}</dd>
                        <dt>DISK</dt>
                        <dd>{{ $webOrder->disk }} GB</dd>
                        <dt>Traffic</dt>
                        <dd>{{ $webOrder->traffic }} GB</dd>
                        <dt>PRICE</dt>
                        <dd>{{ config('website.currency') }}{{ $webOrder->price }}</dd>
                        <dt>DISCOUNT</dt>
                        <dd>{{ config('website.currency') }}{{ $webOrder->discount }}</dd>
                    </dl>
                </div>
            @endforeach
            @foreach($order->emailOrder as $key => $emailOrder)
                <div class="col-sm-4">
                    <dl class="dl-horizontal">
                        <dt>EMAIL ORDER</dt>
                        <dd>#{{$emailOrder->id}}</dd>
                        <dt>DOMAIN</dt>
                        <dd>{{ $emailOrder->domain }}</dd>
                        <dt>DISK</dt>
                        <dd>{{ $emailOrder->disk }} GB</dd>
                        <dt>Traffic</dt>
                        <dd>{{ $emailOrder->traffic }} GB</dd>
                        <dt>PRICE</dt>
                        <dd>{{ config('website.currency') }}{{ $emailOrder->price }}</dd>
                        <dt>DISCOUNT</dt>
                        <dd>{{ config('website.currency') }}{{ $emailOrder->discount }}</dd>
                    </dl>
                </div>
            @endforeach
        </div>
    </div>
</div>
