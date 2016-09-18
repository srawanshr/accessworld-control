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
            @foreach($vpsComponents as $vpsComponent)
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            {{ Form::text("", $vpsComponent->name, ["class" => "form-control", "readonly"]) }}
                            <em><span>Slug: {{ $vpsComponent->slug }};&nbsp;</span>
                            <span>{{ empty($vpsComponent->unit) ? "" : "Unit: " }}{{ ucwords(display($vpsComponent->unit, " ")) }}</span></em>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            {{ Form::number("price[$vpsComponent->id]", $vpsComponent->price, ["class" => "form-control text-right", "required", "min" => 0, "step" => "any"]) }}
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