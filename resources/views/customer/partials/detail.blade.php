@php
    $is_subscribed = $customer->is_subscribed ? 'Yes' : 'No';
    $status = $customer->status ? 'Active' : 'Inactive';
@endphp
<div class="row">
    <div class="col-sm-6">
        <div class="row">
            <div class="col-sm-6 text-bold">Username:</div>
            <div class="col-sm-6">{{ $customer->username }}</div>
            <div class="col-sm-6 text-bold">Address:</div>
            <div class="col-sm-6">{{ $customer->address ?: '-' }}</div>
            <div class="col-sm-6 text-bold">Phone:</div>
            <div class="col-sm-6">{{ $customer->phone ?: '-' }}</div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="row">
            <div class="col-sm-6 text-bold">Status:</div>
            <div class="col-sm-6">{{ $status }}</div>
            <div class="col-sm-6 text-bold">Subscribed:</div>
            <div class="col-sm-6">{{ $is_subscribed }}</div>
        </div>
    </div>
</div>
<div class="row">
    {{--@unless($customer->vpsProvisions->isEmpty())--}}
        {{--<hr>--}}
        {{--<h3 class="text-center text-primary">VPS Provisions</h3>--}}
        {{--<table class="table table-responsive table-striped">--}}
            {{--<thead>--}}
            {{--<tr>--}}
                {{--<th>#</th>--}}
                {{--<th class="text-center">Server Name</th>--}}
                {{--<th class="text-center">Start Date</th>--}}
                {{--<th class="text-center">CPU</th>--}}
                {{--<th class="text-center">RAM</th>--}}
                {{--<th class="text-center">Disk</th>--}}
                {{--<th class="text-center">Traffic</th>--}}
                {{--<th class="text-center">IP</th>--}}
                {{--<th class="text-center">Mac</th>--}}
                {{--<th class="text-center">Provisioned By</th>--}}
            {{--</tr>--}}
            {{--</thead>--}}
            {{--<tbody>--}}
                {{--@foreach($customer->vpsProvisions->sortBy('created_at') as $key => $provision)--}}
                   {{--<tr>--}}
                       {{--<td>{{ ++$key }}</td>--}}
                       {{--<td class="text-center">{{ $provision->name }}</td>--}}
                       {{--<td class="text-center">{{ $provision->subscribed_on }}</td>--}}
                       {{--<td class="text-center">{{ $provision->cpu }}</td>--}}
                       {{--<td class="text-center">{{ $provision->ram }}</td>--}}
                       {{--<td class="text-center">{{ $provision->disk }}</td>--}}
                       {{--<td class="text-center">{{ $provision->traffic }}</td>--}}
                       {{--<td class="text-center">{{ $provision->ips->implode('ip_address', ',') ?: '-' }}</td>--}}
                       {{--<td class="text-center">{{ $provision->ips->implode('mac_address', ',') ?: '-' }}</td>--}}
                       {{--<td class="text-center">{{ $provision->user ? $provision->user->display_name : '-' }}</td>--}}
                   {{--</tr>--}}
                {{--@endforeach--}}
            {{--</tbody>--}}
        {{--</table>--}}
    {{--@endunless--}}
    {{--@unless($customer->webProvisions->isEmpty())--}}
        {{--<hr>--}}
        {{--<h3 class="text-center text-primary">Web Provisions</h3>--}}
        {{--<table class="table table-responsive table-striped">--}}
            {{--<thead>--}}
            {{--<tr>--}}
                {{--<th class="text-center">#</th>--}}
                {{--<th class="text-center">Server Name</th>--}}
                {{--<th class="text-center">Start Date</th>--}}
                {{--<th class="text-center">Domain</th>--}}
                {{--<th class="text-center">Disk</th>--}}
                {{--<th class="text-center">Traffic</th>--}}
                {{--<th class="text-center">Host</th>--}}
                {{--<th class="text-center">Provisioned By</th>--}}
            {{--</tr>--}}
            {{--</thead>--}}
            {{--<tbody>--}}
            {{--@foreach($customer->webProvisions->sortBy('created_at') as $key => $provision)--}}
                {{--<tr>--}}
                    {{--<td class="text-center">{{ ++$key }}</td>--}}
                    {{--<td class="text-center">{{ $provision->name }}</td>--}}
                    {{--<td class="text-center">{{ $provision->subscribed_on }}</td>--}}
                    {{--<td class="text-center">{{ $provision->domain }}</td>--}}
                    {{--<td class="text-center">{{ $provision->disk }}</td>--}}
                    {{--<td class="text-center">{{ $provision->traffic }}</td>--}}
                    {{--<td class="text-center">{{ $provision->connection_string }}</td>--}}
                    {{--<td class="text-center">{{ $provision->user ? $provision->user->display_name : '-' }}</td>--}}
                {{--</tr>--}}
            {{--@endforeach--}}
            {{--</tbody>--}}
        {{--</table>--}}
    {{--@endunless--}}
    {{--@unless($customer->emailProvisions->isEmpty())--}}
        {{--<hr>--}}
        {{--<h3 class="text-center text-primary">Email Provisions</h3>--}}
        {{--<table class="table table-responsive table-striped">--}}
            {{--<thead>--}}
            {{--<tr>--}}
                {{--<th class="text-center">#</th>--}}
                {{--<th class="text-center">Server Name</th>--}}
                {{--<th class="text-center">Start Date</th>--}}
                {{--<th class="text-center">Domain</th>--}}
                {{--<th class="text-center">Disk</th>--}}
                {{--<th class="text-center">Traffic</th>--}}
                {{--<th class="text-center">Host</th>--}}
                {{--<th class="text-center">Provisioned By</th>--}}
            {{--</tr>--}}
            {{--</thead>--}}
            {{--<tbody>--}}
            {{--@foreach($customer->emailProvisions->sortBy('created_at') as $key => $provision)--}}
                {{--<tr>--}}
                    {{--<td class="text-center">{{ ++$key }}</td>--}}
                    {{--<td class="text-center">{{ $provision->name }}</td>--}}
                    {{--<td class="text-center">{{ $provision->subscribed_on }}</td>--}}
                    {{--<td class="text-center">{{ $provision->domain }}</td>--}}
                    {{--<td class="text-center">{{ $provision->disk }}</td>--}}
                    {{--<td class="text-center">{{ $provision->traffic }}</td>--}}
                    {{--<td class="text-center">{{ $provision->connection_string }}</td>--}}
                    {{--<td class="text-center">{{ $provision->user ? $provision->user->display_name : '-' }}</td>--}}
                {{--</tr>--}}
            {{--@endforeach--}}
            {{--</tbody>--}}
        {{--</table>--}}
    {{--@endunless--}}
    {{--@unless($customer->domainProvisions->isEmpty())--}}
        {{--<hr>--}}
        {{--<h3 class="text-center text-primary">Domain Provisions</h3>--}}
        {{--<table class="table table-responsive table-striped">--}}
            {{--<thead>--}}
            {{--<tr>--}}
                {{--<th class="text-center">#</th>--}}
                {{--<th class="text-center">Domain Name</th>--}}
                {{--<th class="text-center">Start Date</th>--}}
                {{--<th class="text-center">Period</th>--}}
            {{--</tr>--}}
            {{--</thead>--}}
            {{--<tbody>--}}
            {{--@foreach($customer->domainProvisions->sortBy('created_at') as $key => $provision)--}}
                {{--<tr>--}}
                    {{--<td class="text-center">{{ ++$key }}</td>--}}
                    {{--<td class="text-center">{{ $provision->domain }}</td>--}}
                    {{--<td class="text-center">{{ $provision->reg_date }}</td>--}}
                    {{--<td class="text-center">{{ $provision->duration }}</td>--}}
                {{--</tr>--}}
            {{--@endforeach--}}
            {{--</tbody>--}}
        {{--</table>--}}
    {{--@endunless--}}
    {{--@unless($customer->sslProvisions->isEmpty())--}}
        {{--<hr>--}}
        {{--<h3 class="text-center text-primary">Domain Provisions</h3>--}}
        {{--<table class="table table-responsive table-striped">--}}
            {{--<thead>--}}
            {{--<tr>--}}
                {{--<th class="text-center">#</th>--}}
                {{--<th class="text-center">SSl Type</th>--}}
                {{--<th class="text-center">Start Date</th>--}}
                {{--<th class="text-center">Period</th>--}}
                {{--<th class="text-center">Provisioned</th>--}}
            {{--</tr>--}}
            {{--</thead>--}}
            {{--<tbody>--}}
            {{--@foreach($customer->sslProvisions->sortBy('created_at') as $key => $provision)--}}
                {{--<tr>--}}
                    {{--<td class="text-center">{{ ++$key }}</td>--}}
                    {{--<td class="text-center">{{ $provision->productType->name }}</td>--}}
                    {{--<td class="text-center">{{ $provision->start_date }}</td>--}}
                    {{--<td class="text-center">{{ $provision->duration }}</td>--}}
                    {{--<td class="text-center">{{ $provision->is_provisioned ? 'Yes' : 'No' }}</td>--}}
                {{--</tr>--}}
            {{--@endforeach--}}
            {{--</tbody>--}}
        {{--</table>--}}
    {{--@endunless--}}
</div>