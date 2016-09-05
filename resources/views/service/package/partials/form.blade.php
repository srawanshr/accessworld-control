<div class="card-body">
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                {{ Form::text('name', old('name'), ['class'=>'form-control', 'required']) }}
                <label for="name">Name</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {{ Form::number('price', old('price'), ['class'=>'form-control', 'required']) }}
                <label for="price">Price</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {{ Form::textarea('description', old('description'), ['class'=>'form-control', 'rows' => 4]) }}
                {{ Form::label('description', 'Description') }}
            </div>
        </div>
    </div>
    <div class="well">
        <div class="row">
            <div class="col-md-6">
                Components
            </div>
            <div class="col-md-6">
                <button class="btn btn-sm btn-primary pull-right add-component" type="button"><i class="md md-add"></i> Add</button>
            </div>
        </div>
        <div class="components"></div>
    </div>
</div>
<div class="card-actionbar">
    <div class="card-actionbar-row">
        <button type="reset" class="btn btn-flat ink-reaction">Reset</button>
        <button type="submit" class="btn btn-flat btn-primary ink-reaction">Save</button>
    </div>
</div>

@push('scripts')
<script>
    var id = 1;
    $(document).ready(function () {
        var componentTemplate = function(key) {
            return '<div class="input-group form-group component">\
                        <div class="input-group-content" class="no-padding">\
                            <div class="row">\
                                <div class="col-sm-5">\
                                        <input type="text" name="component[' + key + '][attribute]" class="form-control" placeholder="Component">\
                    </div>\
                    <div class="col-sm-7">\
                        <input type="text" name="component[' + key + '][value]" class="form-control" placeholder="Value (unit)">\
                    </div>\
                </div>\
            </div>\
            <div class="input-group-btn">\
                <button type="button" class="btn btn-sm btn-danger remove-component"><i class="md md-close"></i></button>\
            </div>\
        </div>';
        };

        $('.components').append(componentTemplate);

        $(document).on('click', '.add-component' ,function() {
            id++;
            $('.components').append(componentTemplate(id));
        });

        $(document).on('click', '.remove-component' ,function() {
            var $component = $(this).closest('.component');
            if($('.components').children().length > 1)
               $component.detach();
        });
    });
</script>
@endpush