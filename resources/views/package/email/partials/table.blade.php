<tr>
    <td>{{ $emailPackage->id }}</td>
    <td>{{ $emailPackage->name }}</td>
    <td class="text-right">{{ $emailPackage->price }}</td>
    <td class="text-right">
        <a href="{{ route('emailPackage.edit', $emailPackage->slug) }}"
           class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top"
           data-original-title="Edit"><i class="fa fa-pencil"></i></a>
        <button type="button" data-role="confirm" class="btn btn-icon-toggle btn-confirm-submit"
                data-message="Delete <b>{{ $emailPackage->name }}</b> ?"
                data-toggle="tooltip" data-placement="top" data-original-title="Delete">
            <i class="fa fa-trash-o"></i>
        </button>
    </td>
</tr>