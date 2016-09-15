<tr>
    <td>{{ str_limit($page->title, 47) }}</td>
    <td class="text-center">{{ $page->is_published ? 'Yes' : 'No' }}</td>
    <td class="text-right">
        <a href="{{route('page.edit', $page->slug)}}" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Edit">
            <i class="md md-edit"></i>
        </a>
        <button type="button" data-url="{{ route('page.destroy', $page->slug) }}" class="btn btn-icon-toggle item-delete" data-toggle="tooltip" data-placement="top" data-original-title="Delete">
            <i class="md md-delete"></i>
        </button>
    </td>
</tr>