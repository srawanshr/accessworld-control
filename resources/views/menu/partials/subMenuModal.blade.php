{{ Form::open(['route' => ['menu.subMenu.store', $menu->id], 'class' => 'form']) }}
<div class="modal fade" id="addSubMenu" tabindex="-1" role="dialog" aria-labelledby="addSubMenuLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="addSubMenuLabel">Add Sub Menu ({{ $menu->name }})</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    {{ Form::select('page', $pages, null, ['class' => 'form-control', 'placeholder' => 'Select a page', 'required']) }}
                    <label class="page">Page</label>
                </div>
                <div class="form-group">
                    {{ Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '(same as page title)']) }}
                    <label class="name">Name</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Sub Menu</button>
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}