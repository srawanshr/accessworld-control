<tr>
    <td>{{++$key}}</td>
    <td>{{ $certificate->title }}</td>
    <td class="text-center">{{ $certificate->is_published ? 'Yes' : 'No' }}</td>
    <td class="text-right">
        @if(auth()->user()->canOne(['save.content', 'delete.content']))
            @if(auth()->user()->can('save.content'))
                <a href="{{route('certificate.edit', $certificate->slug)}}" class="text-primary">
                    Edit
                </a>
            @endif
            @if(auth()->user()->can('delete.content'))
                <a role="button" href="javascript:void(0);" data-url="{{ route('certificate.destroy', $certificate->slug) }}" class="text-primary item-delete">
                    Delete
                </a>
            @endif
        @else
            NA
        @endif
    </td>
</tr>
