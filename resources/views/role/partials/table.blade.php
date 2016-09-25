<tr>
    <td>{{ $role->name }}</td>
    <td class="text-center">{{ $role->description }}</td>
    <td class="text-right">
        @if(auth()->user()->can('save.role'))
            <a href="{{route('role.edit', $role->id)}}" class="text-primary">
                Edit
            </a>
        @endif
        @if(auth()->user()->can('delete.role'))
            &nbsp;&nbsp;
            <a role="button" href="javascript:void(0);" data-url="{{ route('role.destroy', $role->id) }}" class="text-primary item-delete">
                Delete
            </a>
        @endif
    </td>
</tr>