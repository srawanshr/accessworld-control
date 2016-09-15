(function (namespace, $) {
    "use strict";

    var VpsProvisionDataTable = function () {
        var o = this;
        $(document).ready(function () {
            o.initialize();
        });

    };
    var p = VpsProvisionDataTable.prototype;

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
        var $dt_order = $("#dt_vps_provision");

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
                {"data": "customer"},
                {"data": "date", "class": "text-center"},
                {"data": "created_by", "class": "text-center"},
                {"data": "approved_by", "class": "text-center text-capitalize"},
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
        var $dt_order = $("#dt_vps_order");
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

    window.materialadmin.VpsProvisionDataTable = new VpsProvisionDataTable;
}(this.materialadmin, jQuery));

