<tr>
    <td>{{++$key}}</td>
    <td>{{$client->name}}</td>
    <td>{{$client->website}}</td>
    <td class="text-center">{{($client->is_published)? 'Yes' : 'No'}}</td>
    <td class="text-right">
        @if(auth()->user()->canOne(['save.content', 'delete.content']))
            @if(auth()->user()->can('save.content'))
                <a href="{{route('client.edit', $client->slug)}}" class="btn btn-flat btn-primary">
                    Edit
                </a>
            @endif
            @if(auth()->user()->can('delete.content'))
                <a role="button" href="javascript:void(0);" data-url="{{ route('client.destroy', $client->slug) }}" class="btn btn-flat btn-primary item-delete">
                    Delete
                </a>
            @endif
        @else
            NA
        @endif
    </td>
</tr>
