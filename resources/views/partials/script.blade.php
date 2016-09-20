<script type="text/javascript">
    //TableTools
    var sSwfPath = "{{ asset('/js/libs/DataTables/extensions/TableTools/swf/copy_csv_xls_pdf.swf') }}";

    //Session messages
    var successMsg = "{{ session('success') }}";
    var infoMsg = "{{ session('info') }}";
    var warningMsg = "{{ session('warning') }}";
    var dangerMsg = "{{ session('danger') }}";
    var errorMsg = "{{ isset($errors) && ! empty($errors->all()) ? 'Form validation error!' : false }}";

    //Active links
    var requestUrl = "{{ request()->url() }}";
    var $activeLink = $("#menubar").find("a[href='" + requestUrl + "']");

    $activeLink.addClass('active');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    _evalContentScrollbar = function () {
        if (!$.isFunction($.fn.nanoScroller)) {
            return;
        }

        // Check if there is a base
        var content = $('#content');
        if (content.length === 0)
            return;

        // Get scrollbar elements
        var sectionScroller = $('section');
        var parent = sectionScroller.parent();

        // Add the scroller wrapper
        if (parent.hasClass('nano-content') === false) {
            sectionScroller.wrap('<div class="nano"><div class="nano-content"></div></div>');
        }

        // Set the correct height
        var height = $(window).height() - content.position().top - content.find('.nano').position().top;
        var scroller = sectionScroller.closest('.nano');
        scroller.css({height: height});

        // Add the nanoscroller
        scroller.nanoScroller({preventPageScrolling: true, iOSNativeScrolling: true});
    };

    _evalContentScrollbar();

    $(document).on("click", ".item-delete", function () {
        var $button = $(this), $row = $(this).closest("tr");
        bootbox.confirm("Are you sure you want to delete this item?", function (response) {
            if (response)
                $.ajax({
                    "type": "POST",
                    "url": $button.data("url"),
                    "data": {_method: "DELETE"},
                    "success": function () {
                        $row.addClass("danger").fadeOut();
                    },
                    "error": function () {
                        bootbox.alert("Delete failed!");
                    }
                });
        });
    });
</script>