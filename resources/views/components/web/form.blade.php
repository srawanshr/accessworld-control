<div class="card-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-8">
                    {{ Form::label("", "Name", ["class" => "text-primary"]) }}
                </div>
                <div class="col-sm-4 text-right">
                    {{ Form::label("price", "Price (in USD)", ["class" => "text-primary"]) }}
                </div>
            </div>
            @foreach($webComponents as $webComponent)
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            {{ Form::text("", $webComponent->name, ["class" => "form-control", "readonly"]) }}
                            <em><span>Slug: {{ $webComponent->slug }};&nbsp;</span>
                            <span>{{ empty($webComponent->unit) ? "" : "Unit: " }}{{ ucwords(display($webComponent->unit, " ")) }}</span></em>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            {{ Form::number("price[$webComponent->id]", $webComponent->price, ["class" => "form-control text-right", "required", "min" => 0, "step" => "any"]) }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<div class="card-actionbar">
    <div class="card-actionbar-row">
        <button type="submit" class="btn btn-flat btn-primary ink-reaction">Save</button>
    </div>
</div>