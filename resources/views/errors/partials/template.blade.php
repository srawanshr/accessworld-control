<!-- BEGIN {{ $error_code }} MESSAGE -->
<section>
    <section class="section-body">
        <div class="section-body contain-lg">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1>
                        <span class="text-xxxl text-light">{{ $error_code }}</span>
                    </h1>
                    <h2 class="text-light">{{ $error_message }}</h2>
                    <p>
                        <a href="{{ url('') }}" class="text-primary text-xxl"><i class="md md-home"></i>Home</a>
                    </p>
                </div><!--end .col -->
            </div><!--end .row -->
        </div><!--end .section-body -->
    </section>
</section>
<!-- END {{ $error_code }} MESSAGE -->