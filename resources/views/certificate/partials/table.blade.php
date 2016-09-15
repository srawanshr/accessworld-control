<tr>
    <td>{{ $certificate->title }}</td>
    <td class="text-center">{{ $certificate->is_published ? 'Yes' : 'No' }}</td>
    <td class="text-right">
        <a href="{{route('certificate.edit', $certificate->slug)}}" class="text-primary">
            Edit
        </a>
        &nbsp;&nbsp;
        <a role="button" href="javascript:void(0);" data-url="{{ route('certificate.destroy', $certificate->slug) }}" class="text-primary item-delete">
            Delete
        </a>
    </td>
</tr>
