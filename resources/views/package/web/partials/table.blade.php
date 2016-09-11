<tr>
    <td>{{ $webPackage->id }}</td>
    <td>{{ $webPackage->name }}</td>
    <td class="text-right">{{ '$ '.$webPackage->price }}</td>
    <td class="text-right">
        <a href="{{ route('webPackage.edit', $webPackage->slug) }}"
           class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top"
           data-original-title="Edit"><i class="fa fa-pencil"></i></a>
        <button type="button" data-role="confirm" class="btn btn-icon-toggle btn-confirm-submit"
                data-message="Delete <b>{{ $webPackage->name }}</b> ?"
                data-toggle="tooltip" data-placement="top" data-original-title="Delete">
            <i class="fa fa-trash-o"></i>
        </button>
    </td>
</tr>
