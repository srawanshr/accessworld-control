<div class="card-body">
    @include('partials.errors')
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                {{ Form::text('name', old('name'), ['class' => 'form-control', 'required']) }}
                {{ Form::label('name', 'Name') }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                {{ Form::text('description', old('description'), ['class' => 'form-control', 'required']) }}
                {{ Form::label('description', 'Description') }}
            </div>
        </div>
    </div>
    @foreach($permissions->groupBy('model')->chunk(3) as $chunk)
        <div class="row">
            @foreach($chunk as $title => $group)
                <div class="col-xs-6 col-sm-4">
                    <div class="checkbox checkbox-styled">
                        <label>
                            <input type="checkbox" data-checkbox-group="{{ str_slug($title) }}" data-role="selectall">
                            @unless(empty($title))
                                <span class="text-primary group-heading"><u>{{ last(explode("\\", $title)) }}</u></span>
                            @endunless
                        </label>
                    </div>
                    @foreach($group as $permission)
                        <div class="checkbox checkbox-styled">
                            <label>
                                <input type="checkbox" name="permissions[{{$permission->slug}}]" value="1" {{ isset($role) && $role->permissions()->whereSlug($permission->slug)->first() ? "checked": "" }} data-checkbox-group="{{ str_slug($title) }}" data-role="select">
                                <span>{{ $permission->name }}</span>
                            </label>
                            <sup data-toggle="popover" data-placement="right" data-content="{{ $permission->description }}"><abbr title="">?</abbr></sup>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    @endforeach
</div>
<div class="card-actionbar">
    <div class="card-actionbar-row">
        <button type="reset" class="btn btn-flat ink-reaction">Reset</button>
        <button type="submit" class="btn btn-flat btn-primary ink-reaction">Save</button>
    </div>
</div>