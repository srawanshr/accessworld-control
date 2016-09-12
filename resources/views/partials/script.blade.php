<script type="text/javascript">
    //TableTools
    var sSwfPath = "{{ asset('/js/libs/DataTables/extensions/TableTools/swf/copy_csv_xls_pdf.swf') }}";

    //Session messages
    var successMsg = "{{ session('success') }}";
    var infoMsg = "{{ session('info') }}";
    var warningMsg = "{{ session('warning') }}";
    var dangerMsg = "{{ session('danger') }}";
    var errorMsg = "{{ isset($errors) && ! empty($errors->all()) ? 'Validation error!' : false }}";

    //Active links
    var requestUrl = "{{ request()->url() }}";
    var $activeLink = $("#menubar").find("a[href='" + requestUrl + "']");

    $activeLink.addClass('active');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>