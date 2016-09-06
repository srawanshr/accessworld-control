<tr>
    <td>{{$client->id}}</td>
    <td>
        @if(isset($client))
            <img src="{{ thumbnail(200, $client) }}" data-src="{{ thumbnail(200, $client) }}" class="img-circle width-1" >
        @else
            <img src="{{ thumbnail(200) }}" data-src="{{ thumbnail(200) }}" class="img-circle width-1" >
        @endif
    </td>
    <td>{{$client->name}}</td>
    <td>{{$client->website}}</td>
    <td class="text-right">
        <a href="{{route('client.edit', $client->slug)}}" class="btn btn-icon-toggle"  data-toggle="tooltip" data-placement="top" data-original-title="Edit">
            <i class="md md-edit"></i>
        </a>
        <button type="button" data-url="{{ route('client.destroy', $client->slug) }}" class="btn btn-icon-toggle btn-delete" data-toggle="tooltip" data-placement="top" data-original-title="Delete">
            <i class="md md-delete"></i>
        </button>
    </td>
</tr>
