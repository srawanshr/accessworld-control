(function (namespace, $) {
    "use strict";

    var OrderDataTable = function () {
        var o = this;
        $(document).ready(function () {
            o.initialize();
        });

    };
    var p = OrderDataTable.prototype;

    p.initialize = function () {
        this._initDataTables();
    };

    p._initDataTables = function () {
        if (!$.isFunction($.fn.dataTable)) {
            return;
        }

        this.createDataTable();
    };

    p.createDataTable = function () {
        var $dt_order = $("#dt_order");

        var table = $dt_order.DataTable({
            "dom": '<"clear">lfrtip',
            "order": [],
            "processing": true,
            "serverSide": true,
            "ajax": {
                "type": "POST",
                "url": $dt_order.data("source")
            },
            "pageLength": "50",
            "columns": [
                {
                    "class": "details-control text-center",
                    "orderable": false,
                    "data": null,
                    "defaultContent": '',
                    "searchable": false
                },
                {"data": "customer.first_name"},
                {"data": "customer.last_name"},
                {"data": "date", "class": "text-center"},
                {"data": "created_by.username", "class": "text-center", "render": function (data) {
                    return data ? data : '-';
                }},
                {"data": "status", "class": "text-center text-capitalize"},
                {"data": "approved_by.username", "class": "text-center text-capitalize", "render": function (data) {
                    return data ? data : '-';
                }},
                {"data": "action", "class": "text-right", "orderable": false, "searchable": false}
            ],
            "createdRow": function (row, data) {
                if ('approved' == data["status"]) {
                    $(row).addClass("success");
                } else if ('rejected' == data["status"]) {
                    $(row).addClass("warning");
                }
            },
            "drawCallback": function () {
                $('[data-toggle="tooltip"]').tooltip();
            }
        });

        var o = this;
        $dt_order.find('tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            o._formatDetails(row.data(), row, tr);
        });
    };

    p._formatDetails = function (d, row, tr) {
        var orderId = d.id;
        var $dt_order = $("#dt_order");
        $.ajax({
            "type": "POST",
            "url": $dt_order.data("details-source"),
            "data": {id: orderId},
            "success": function (response) {
                if (row.child.isShown()) {
                    row.child.hide();
                    tr.removeClass('shown');
                }
                else {
                    row.child(response).show();
                    tr.addClass('shown');
                }
            },
            "error": function () {
                bootbox.alert("<h3 class='text-center'>Error fetching data!</h3>");
            }
        });
    };

    window.materialadmin.OrderDataTable = new OrderDataTable;
}(this.materialadmin, jQuery));
