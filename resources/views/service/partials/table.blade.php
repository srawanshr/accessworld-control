<tr>
    <td>{{++$key}}</td>
    <td>{{ $service->name }}</td>
    <td class="text-center">{{ $service->is_published ? 'Yes' : 'No' }}</td>
    <td class="text-right">
        @if(auth()->user()->canOne(['save.content', 'delete.content']))
            @if(auth()->user()->can('save.content'))
                <a href="{{route('service.edit', $service->slug)}}" class="btn-primary btn btn-flat">
                    Edit
                </a>
            @endif
            @if(auth()->user()->can('delete.content'))
                <a role="button" href="javascript:void(0);" data-url="{{ route('service.destroy', $service->slug) }}" class="btn-primary btn btn-flat item-delete">
                    Delete
                </a>
            @endif
        @else
            NA
        @endif
    </td>
</tr>