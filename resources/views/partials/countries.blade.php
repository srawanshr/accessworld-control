<li>
    <a href="javascript:void(0);" class="btn btn-icon-toggle" data-toggle="dropdown" aria-expanded="false">
        <i class="fa"><i class="flag-{{ country()->iso_alpha2 }}"></i></i>
    </a>
    <ul class="dropdown-menu animation-expand">
        <li class="dropdown-header">Supported Countries</li>
        @foreach(supported_countries() as $key => $country)
            <li class="">
                <a class="alert alert-callout alert-warning" href="{{ route('country.session', $country->iso_alpha2) }}" rel="alternate">
                    <i class="fa"><i class="flag-{{ $country->iso_alpha2 }}"></i></i>
                    <strong>{{ $country->name }}</strong><br>
                </a>
            </li>
        @endforeach
    </ul><!--end .dropdown-menu -->
</li>