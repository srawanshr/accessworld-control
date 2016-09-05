<tr>
    <td>{{ $certificate->title }}</td>
    <td><img src="{{$certificate->image->thumbnail}}" class="img-circle width-1"></td>
    <td>{{$certificate->title}}</td>
    <td class="text-right">
       <a href="{{route('admin.certificate.edit', $certificate->slug)}}" class="btn btn-icon-toggle"
          data-toggle="tooltip" data-placement="top" data-original-title="Edit certificate">
           <i class="md md-delete"></i>
       </a>
    </td>
</tr>
