<tr>
    <td>{{ $service->name }}</td>
    <td class="text-center">{{ $service->is_published ? 'Yes' : 'No' }}</td>
    <td class="text-right">
        <a href="{{route('service.edit', $service->slug)}}" class="text-primary">
            Edit
        </a>
        <a role="button" href="javascript:void(0);" data-url="{{ route('service.destroy', $service->slug) }}" class="text-primary item-delete">
            Delete
        </a>
    </td>
</tr>