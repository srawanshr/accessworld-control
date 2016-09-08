<tr>
    <td>{{$dataCenter->id}}</td>
    <td>{{$dataCenter->name}}</td>
    <td>{{$dataCenter->slug}}</td>
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
