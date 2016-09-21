<tr>
    <td>{{ ++$key }}</td>
    <td>{{ $operatingSystem->name }}</td>
    <td>{{ config('website.currency').$operatingSystem->price }}</td>
    <td class="text-center">{{ ($operatingSystem->is_active)? 'Yes' : 'No' }}</td>
    <td class="text-right">
        @if(auth()->user()->canOne(['save.content', 'delete.content']))
            @if(auth()->user()->can('save.content'))
                <a href="{{route('operatingSystem.edit', $operatingSystem->slug)}}" class="text-primary">
                    Edit
                </a>
            @endif
            @if(auth()->user()->can('delete.content'))
                <a role="button" href="javascript:void(0);" class="text-primary item-delete" data-url="{{ route('operatingSystem.destroy', $operatingSystem->id) }}">
                    Delete
                </a>
            @endif
        @else
            NA
        @endif
    </td>
</tr>