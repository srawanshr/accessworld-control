<tr>
    <td>{{ $package->name }}</td>
    <td class="text-center">{{ $package->is_published ? 'Yes' : 'No' }}</td>
    <td class="text-right">
        <a href="{{route('service.package.index', [$package->service->slug, $package->slug])}}"
           class="btn btn-icon-toggle"
           data-toggle="tooltip"
           data-placement="top"
           data-original-title="Packages">
            <i class="md md-wallet-giftcard"></i>
        </a>
        <a href="{{route('service.package.edit', [$package->service->slug, $package->slug])}}"
           class="btn btn-icon-toggle"
           data-toggle="tooltip"
           data-placement="top"
           data-original-title="Edit">
            <i class="md md-edit"></i>
        </a>
        <button type="button"
                data-url="{{ route('service.package.destroy', [$package->service->slug, $package->slug]) }}"
                class="btn btn-icon-toggle"
                data-toggle="tooltip"
                data-placement="top"
                data-original-title="Delete">
            <i class="md md-delete"></i>
        </button>
    </td>
</tr>