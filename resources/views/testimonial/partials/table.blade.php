<table class="table table-hover">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Icon</th>
        <th class="text-right">Actions</th>
    </tr>
    </thead>
    <tbody>
    @if($testimonials->isEmpty())
        <tr>
            <td class="text-center" colspan="5">No data available.</td>
        </tr>
    @else
        @foreach($testimonials as $key=>$testimonial)
            <tr>
                <td>{{$key+1}}</td>
                <td><img src="{{$testimonial->customer->image->thumbnail}}"
                         alt="{{$testimonial->customer->dislay_name}}" class="img-circle width-1"></td>
                <td>{{$testimonial->customer->display_name}}</td>
                <td class="text-right">
                    <a href="{{route('testimonial.edit', $testimonial->id)}}" class="btn btn-icon-toggle"
                       data-toggle="tooltip" data-placement="top" data-original-title="Edit testimonial">
                    <i class="md md-edit"></i>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
