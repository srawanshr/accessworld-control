<tr>
    <td>{{++$key}}</td>
    <td>{{$dataCenter->name}}</td>
    <td>{{ config('website.currency').$dataCenter->price }}</td>
    <td class="text-center">{{$dataCenter->prefix}}</td>
    <td class="text-right">
        @if(auth()->user()->canOne(['save.content', 'delete.content']))
            @if(auth()->user()->can('save.content'))
                 <a href="{{route('dataCenter.edit', $dataCenter->slug)}}" class="text-primary">
                    Edit
                 </a>
            @endif
            @if(auth()->user()->can('delete.content'))
                 <a role="button" href="javascript:void(0);" data-url="{{ route('dataCenter.destroy', $dataCenter->slug) }}" class="text-primary item-delete">
                    Delete
                 </a>
            @endif
        @else
            NA
        @endif
    </td>
</tr>
