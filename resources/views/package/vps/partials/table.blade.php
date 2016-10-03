<tr>
    <td>{{++$key}}</td>
    <td>{{ $vpsPackage->name }}</td>
    <td>{{ ($vpsPackage->is_published)? 'Yes' : 'No' }}</td>
    <td class="text-right">{{ $vpsPackage->price }}</td>
    <td class="text-right">{{ $vpsPackage->discount }}</td>
    <td class="text-right">
        @if(auth()->user()->canOne(['save.content', 'delete.content']))
            @if(auth()->user()->can('save.content'))
                <a href="{{ route('vpsPackage.edit', $vpsPackage->slug) }}"
                   class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top"
                   data-original-title="Edit"><i class="fa fa-pencil"></i></a>
            @endif
            @if(auth()->user()->can('delete.content'))
                <button type="button" data-role="confirm" class="btn btn-icon-toggle btn-confirm-submit"
                        data-message="Delete <b>{{ $vpsPackage->name }}</b> ?"
                        data-toggle="tooltip" data-placement="top" data-original-title="Delete">
                    <i class="fa fa-trash-o"></i>
                </button>
            @endif
        @else
            NA
        @endif
    </td>
</tr>
