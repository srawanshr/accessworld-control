<tr>
    <td>{{++$key}}</td>
    <td>{{ str_limit($page->title, 47) }}</td>
    <td class="text-center">{{ $page->is_published ? 'Yes' : 'No' }}</td>
    <td class="text-right">
        @if(auth()->user()->canOne(['save.content', 'delete.content']))
            @if(auth()->user()->can('save.content'))
                <a href="{{route('page.edit', $page->slug)}}" class="btn btn-flat btn-primary">
                    Edit
                </a>
            @endif
            @if(auth()->user()->can('delete.content'))
                <button type="button" data-url="{{ route('page.destroy', $page->slug) }}" class="btn btn-flat btn-primary item-delete">
                    Delete
                </button>
            @endif
        @else
            NA
        @endif
    </td>
</tr>