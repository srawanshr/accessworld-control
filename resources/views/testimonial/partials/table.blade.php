<tr>
    <td>{{$testimonial->customer->name}}</td>
    <td class="text-center">{{($testimonial->is_published)? 'Yes' : 'No' }}</td>
    <td class="text-right">
        <a href="{{route('testimonial.edit', $testimonial->id)}}" class="text-primary">
            Edit
        </a>
        &nbsp;&nbsp;
        <a role="button" href="javascript:void(0);" data-url="{{ route('testimonial.destroy', $testimonial->id) }}" class="text-primary item-delete">
            Delete
        </a>
    </td>
</tr>