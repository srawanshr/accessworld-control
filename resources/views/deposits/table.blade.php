<table id="dt_deposit"
       class="table order-column hover"
       data-source="{{route('customer.deposit.list', $customer->username)}}">
    <thead>
    <tr>
        <th>Date</th>
        <th>Amount (in {{ currency() }})</th>
        <th>Added By</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>
