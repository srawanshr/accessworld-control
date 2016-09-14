<tr>
    <td>{{ $testimonial->id }}</td>
    <td>
        @if(isset($testimonial->customer))
            <img src="{{ thumbnail(200, $testimonial->customer) }}" data-src="{{ thumbnail(200, $testimonial->customer) }}" class="img-circle width-1" >
        @else
            <img src="{{ thumbnail(200) }}" data-src="{{ thumbnail(200) }}" class="img-circle width-1" >
        @endif

    </td>
    <td>{{$testimonial->customer->username}}</td>
    <td>{{$testimonial->quote}}</td>
    <td>{{($testimonial->is_published)? 'Yes' : 'No' }}</td>
    <td class="text-right">
        <a href="{{route('testimonial.edit', $testimonial->id)}}" class="btn btn-icon-toggle"
           data-toggle="tooltip" data-placement="top" data-original-title="Edit testimonial">
        <i class="md md-edit"></i>
        <button type="button" data-url="{{ route('testimonial.destroy', $testimonial->id) }}"
                class="btn btn-icon-toggle btn-delete" data-toggle="tooltip" data-placement="top"
                data-original-title="Delete">
            <i class="md md-delete"></i>
        </button>
    </td>
</tr>