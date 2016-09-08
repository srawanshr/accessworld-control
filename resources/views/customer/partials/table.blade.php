<script>
    (function(namespace, $) {
        "use strict";

        var CustomerDatatable = function() {
            // Create reference to this instance
            var o = this;
            // Initialize app when document is ready
            $(document).ready(function() {
                o.initialize();
            });

        };
        var p = CustomerDatatable.prototype;

        // =========================================================================
        // INIT
        // =========================================================================

        p.initialize = function() {
            this._initDataTables();
        };

        // =========================================================================
        // DATATABLES
        // =========================================================================

        p._initDataTables = function() {
            if (!$.isFunction($.fn.dataTable)) {
                return;
            }

            this.createDatatable();
        };

        p.createDatatable = function() {
            var table = $('#dt_customer').DataTable({
                "dom": 'T<"clear">lfrtip',
                "processing": true,
                "serverSide": true,
                "ajax": $('#dt_customer').data('source'),
                "columns": [
                    {
                        "class": 'details-control',
                        "orderable": false,
                        "data": null,
                        "defaultContent": '',
                        "searchable": false
                    },
                    {"data": "avatar", "render" :function(data,type,full){
                        return "<img src='" + data + "' class='img-circle width-1'>";
                    }, "searchable": false, "orderable": false},
                    {"data": "name"},
                    {"data": "email"},
                    {"data": "action", name: "action", "class":"text-right", "orderable": false, "searchable": false}
                ],
                "tableTools": {
                    "sSwfPath": $('#dt_customer').data('swftools')
                },
                "order": [[1, 'asc']],
                "language": {
                    "lengthMenu": '_MENU_ entries per page',
                    "search": '<i class="fa fa-search"></i>',
                    "paginate": {
                        "previous": '<i class="fa fa-angle-left"></i>',
                        "next": '<i class="fa fa-angle-right"></i>'
                    }
                },
                "drawCallback": function( settings ) {
                    $('[data-toggle="tooltip"]').tooltip();
                }
            });

            // =========================================================================
            // DETAILS
            // =========================================================================

            var o = this;
            $('#dt_customer').find('tbody').on('click', 'td.details-control', function() {
                var tr = $(this).closest('tr');
                var row = table.row(tr);
                $.ajax({
                    "type": "get",
                    "url": '{{ route('customer.details') }}',
                    "data": {id: row.data().id},
                    "success": function (response) {
                        bootbox.alert(response)
                    },
                    "error": function () {
                        bootbox.alert("<h3 class='text-center'>Error fetching data!</h3>");
                    }
                });
            });
        };

        // =========================================================================
        namespace.CustomerDatatable = new CustomerDatatable;
    }(this.materialadmin, jQuery)); // pass in (namespace, jQuery):
</script>
