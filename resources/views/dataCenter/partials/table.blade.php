<tr>
    <td>{{$dataCenter->id}}</td>
    <td>
        @if(isset($dataCenter))
            <img src="{{ thumbnail(200, $dataCenter) }}" data-src="{{ thumbnail(200, $dataCenter) }}" class="img-circle width-1" >
        @else
            <img src="{{ thumbnail(200) }}" data-src="{{ thumbnail(200) }}" class="img-circle width-1" >
        @endif
    </td>
    <td>{{$dataCenter->name}}</td>
    <td>{{ config('website.currency').$dataCenter->price }}</td>
    <td>{{$dataCenter->prefix}}</td>
    <td class="text-right">
         <a href="{{route('dataCenter.edit', $dataCenter->slug)}}" class="btn btn-icon-toggle"
           data-toggle="tooltip" data-placement="top" data-original-title="Edit">
            <i class="fa fa-pencil"></i>
         </a>
         <button type="button" class="btn btn-icon-toggle btn-confirm-submit"
                data-message="Delete data Center <b>{{ $dataCenter->name }}</b>" data-toggle="tooltip"
                data-placement="top" data-original-title="Delete">
            <i class="fa fa-trash-o"></i>
         </button>
    </td>
</tr>
