<tr>
    <td>{{ $role->name }}</td>
    <td class="text-center">{{ $role->description }}</td>
    <td class="text-right">
        <a href="{{route('role.edit', $role->slug)}}" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Edit">
            <i class="md md-edit"></i>
        </a>
        <button type="button" data-url="{{ route('role.destroy', $role->slug) }}" class="btn btn-icon-toggle btn-delete" data-toggle="tooltip" data-placement="top" data-original-title="Delete">
            <i class="md md-delete"></i>
        </button>
    </td>
</tr>