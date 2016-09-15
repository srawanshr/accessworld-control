<tr>
    <td>{{$client->name}}</td>
    <td>{{$client->website}}</td>
    <td class="text-center">{{($client->is_published)? 'Yes' : 'No'}}</td>
    <td class="text-right">
        <a href="{{route('client.edit', $client->slug)}}" class="text-primary">
            Edit
        </a>
        &nbsp;&nbsp;
        <a role="button" href="javascript:void(0);" data-url="{{ route('client.destroy', $client->slug) }}" class="text-primary item-delete">
            Delete
        </a>
    </td>
</tr>
