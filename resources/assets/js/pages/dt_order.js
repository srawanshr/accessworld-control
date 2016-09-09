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
            "processing": true,
            "serverSide": true,
            "ajax": $dt_order.data("source"),
            "pageLength": "50",
            "columns": [
                {
                    "class": "details-control text-center",
                    "orderable": false,
                    "data": null,
                    "defaultContent": '',
                    "searchable": false
                },
                {"data": "customer"},
                {"data": "date", "class": "text-center"},
                {"data": "created_by", "class": "text-center"},
                {"data": "approved_by", "class": "text-center text-capitalize"},
                {"data": "action", name: "action", "class": "text-right", "orderable": false, "searchable": false}
            ],
            "createdRow": function (row, data) {
                if (data["status"] == 1) {
                    $(row).addClass("success");
                } else if (data["status"] == 2) {
                    $(row).addClass("warning");
                }
            },
            "order": [],
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
        $.ajax({
            "type": "get",
            "url": $("#dt_order").data("detail-source"),
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
