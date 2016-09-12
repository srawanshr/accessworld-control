<tr>
    <td>{{ $certificate->id }}</td>
    <td>
        @if(isset($certificate))
            <img src="{{ thumbnail(200, $certificate) }}" data-src="{{ thumbnail(200, $certificate) }}"
                 class="img-circle width-1">
        @else
            <img src="{{ thumbnail(200) }}" data-src="{{ thumbnail(200) }}" class="img-circle width-1">
        @endif
    </td>
    <td>{{ $certificate->title }}</td>
    <td>{{ ($certificate->is_published)? 'Yes' : 'No' }}</td>
    <td class="text-right">
        <a href="{{route('certificate.edit', $certificate->slug)}}" class="btn btn-icon-toggle" data-toggle="tooltip"
           data-placement="top" data-original-title="Edit certificate">
            <i class="md md-edit"></i>
        </a>
        <button type="button" data-url="{{ route('certificate.destroy', $certificate->slug) }}"
                class="btn btn-icon-toggle btn-delete" data-toggle="tooltip" data-placement="top"
                data-original-title="Delete">
            <i class="md md-delete"></i>
        </button>
    </td>
</tr>
