<tr>
    <td>{{ $operatingSystem->id }}</td>
    <td>{{ strtoupper($operatingSystem->name) }}</td>
    <td>{{ config('website.currency').$operatingSystem->price }}</td>
    <td>{{ ($operatingSystem->is_active)? 'Yes' : 'No' }}</td>
    <td class="text-right">
        <a href="{{route('operatingSystem.edit', $operatingSystem->slug)}}" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Edit">
            <i class="fa fa-pencil"></i>
        </a>

        <button type="button" class="btn btn-icon-toggle btn-confirm-submit" data-message="Delete operating system <b>{{ strtoupper($operatingSystem->name) }}</b>" data-toggle="tooltip" data-placement="top" data-original-title="Delete">
            <i class="fa fa-trash-o"></i>
        </button>

    </td>
</tr>