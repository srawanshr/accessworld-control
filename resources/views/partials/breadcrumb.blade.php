<?php 
    $segments = Request::segments();
?>
<ol class="breadcrumb">
    <li{{count($segments) == 0 ? " class=active" : ""}}>
        <a href="{{route('admin.dashboard')}}">Home</a>
    </li>
    @foreach($segments as $key => $segment)
        <li>
            <a href="{{url('/').'/'.implode(array_slice($segments,0,$key+1),'/')}}">{{$segment}}</a>
        </li>
    @endforeach
</ol>