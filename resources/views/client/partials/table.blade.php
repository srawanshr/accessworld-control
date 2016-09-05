<tr>
    <td>{{$key+1}}</td>
    <td><img src="{{$client->image->thumbnail}}" class="img-circle width-1"></td>
    <td>{{$client->name}}</td>
    <td class="text-right">
        <a href="{{route('admin.client.edit', $client->slug)}}" class="btn btn-icon-toggle"
           data-toggle="tooltip" data-placement="top" data-original-title="Edit">
            <i class="md md-delete"></i>
        </a>
    </td>
</tr>