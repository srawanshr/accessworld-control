<tr>
    <td>{{++$key}}</td>
    <td>{{$testimonial->customer->name}}</td>
    <td class="text-center">{{($testimonial->is_published)? 'Yes' : 'No' }}</td>
    <td class="text-right">
        @if(auth()->user()->canOne(['save.content', 'delete.content']))
            @if(auth()->user()->can('save.content'))
                <a href="{{route('testimonial.edit', $testimonial->id)}}" class="text-primary">
                    Edit
                </a>
            @endif
            @if(auth()->user()->can('delete.content'))
                <a role="button" href="javascript:void(0);" data-url="{{ route('testimonial.destroy', $testimonial->id) }}" class="text-primary item-delete">
                    Delete
                </a>
            @endif
        @else
            NA
        @endif
    </td>
</tr>