<tr>
    <td>{{ $testimonial->id }}</td>
    <td><img src="{{$testimonial->customer->image->thumbnail}}"
             alt="{{$testimonial->customer->dislay_name}}" class="img-circle width-1"></td>
    <td>{{$testimonial->customer->display_name}}</td>
    <td class="text-right">
        <a href="{{route('testimonial.edit', $testimonial->id)}}" class="btn btn-icon-toggle"
           data-toggle="tooltip" data-placement="top" data-original-title="Edit testimonial">
        <i class="md md-edit"></i>
    </td>
</tr>