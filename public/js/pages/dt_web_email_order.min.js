(function (namespace, $) {
    "use strict";

    var WebEmailOrderDataTable = function () {
        var o = this;
        $(document).ready(function () {
            o.initialize();
        });

    };
    var p = WebEmailOrderDataTable.prototype;

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
        var $dt_web_email_order = $("#dt_web_email_order");

        var table = $dt_web_email_order.DataTable({
            "dom": '<"clear">lfrtip',
            "order": [],
            "processing": true,
            "serverSide": true,
            "ajax": {
                "type": "POST",
                "url": $dt_web_email_order.data("source")
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
                {"data": "customer"},
                {"data": "order.date", "class": "text-center"},
                {"data": "domain", "class": "text-center"},
                {"data": "disk", "class": "text-center"},
                {"data": "traffic", "class": "text-center"},
                {"data": "created_by", "class": "text-center"},
                {"data": "approved_by", "class": "text-center text-capitalize"}
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
        $dt_web_email_order.find('tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            o._formatDetails(row.data(), row, tr);
        });
    };

    p._formatDetails = function (d, row, tr) {
        var orderId = d.id;
        var $dt_web_email_order = $("#dt_web_email_order");
        $.ajax({
            "type": "POST",
            "url": $dt_web_email_order.data("details-source"),
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

    window.materialadmin.WebEmailOrderDataTable = new WebEmailOrderDataTable;
}(this.materialadmin, jQuery));
