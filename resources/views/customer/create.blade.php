@extends('layout')

@section('title', 'Customers')

@push('styles')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/libs/typeahead/typeahead.css') }}" />
@endpush

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header>Create a customer</header>
                    <div class="tools">
                        <a class="btn btn-default btn-ink" onclick="history.go(-1);return false;">
                            <i class="md md-arrow-back"></i>
                            Back
                        </a>
                    </div>
                </div>
                {{ Form::open(['route' =>'customer.store','class'=>'form form-validate','role'=>'form','files'=>true, 'novalidate'=>'novalidate']) }}
                @include('customer.partials.form')
                {{ Form::close() }}
            </div>
        </div>
    </section>
@stop

@push('scripts')
<script src="{{ asset('js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
<script src="{{ asset('js/preview.js') }}"></script>
<script src="{{ asset('js/libs/typeahead/typeahead.bundle.min.js') }}"></script>
<script>
    $(document).ready(function() {
        if (!$.isFunction($.fn.typeahead)) {
            return;
        }
        var countries = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            limit: 10,
            prefetch: {
                // url points to a json file that contains an array of country names, see
                // https://github.com/twitter/typeahead.js/blob/gh-pages/data/countries.json
                url: $('#country-selector').data('source'),
                // the json file contains an array of strings, but the Bloodhound
                // suggestion engine expects JavaScript objects so this converts all of
                // those strings
                filter: function (list) {
                    return $.map(list, function (country) {
                        return {name: country};
                    });
                }
            }
        });
        countries.initialize();
        $('#country-selector').typeahead(null, {
            name: 'countries',
            displayKey: 'name',
            // `ttAdapter` wraps the suggestion engine in an adapter that
            // is compatible with the typeahead jQuery plugin
            source: countries.ttAdapter()
        });
    });
</script>
@endpush
