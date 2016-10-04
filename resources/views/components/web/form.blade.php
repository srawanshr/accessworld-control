<div class="card-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-8">
                    {{ Form::label("", "Name", ["class" => "text-primary"]) }}
                </div>
                <div class="col-sm-2 text-right">
                    {{ Form::label("price_npr", "Price (in NPR)", ["class" => "text-primary"]) }}
                </div>
                <div class="col-sm-2 text-right">
                    {{ Form::label("price_usd", "Price (in USD)", ["class" => "text-primary"]) }}
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
                    <div class="col-sm-2">
                        <div class="form-group">
                            {{ Form::number("price[$webComponent->id][npr]", $webComponent->price_npr, ["class" => "form-control text-right", "required", "min" => 0, "step" => "any"]) }}
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            {{ Form::number("price[$webComponent->id][usd]", $webComponent->price_usd, ["class" => "form-control text-right", "required", "min" => 0, "step" => "any"]) }}
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