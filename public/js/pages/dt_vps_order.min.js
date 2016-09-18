(function (namespace, $) {
    "use strict";

    var VpsOrderDataTable = function () {
        var o = this;
        $(document).ready(function () {
            o.initialize();
        });

    };
    var p = VpsOrderDataTable.prototype;

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
        var $dt_vps_order = $("#dt_vps_order");

        var table = $dt_vps_order.DataTable({
            "dom": '<"clear">lfrtip',
            "order": [],
            "processing": true,
            "serverSide": true,
            "ajax": {
                "type": "POST",
                "url": $dt_vps_order.data("source")
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
                {"data": "order.customer.first_name", "name": "order.customer.first_name"},
                {"data": "order.customer.last_name", "name": "order.customer.last_name"},
                {"data": "order.date", "name": "order.date", "class": "text-center"},
                {"data": "cpu", "name": "vps_orders.cpu", "class": "text-center"},
                {"data": "ram", "name": "vps_orders.ram", "class": "text-center"},
                {"data": "disk", "name": "vps_orders.disk", "class": "text-center"},
                {"data": "traffic", "name": "vps_orders.traffic", "class": "text-center"},
                {"data": "order.created_by.username", "class": "text-center text-capitalize"},
                {"data": "order.status", "name": "order.status", "class": "text-center text-capitalize"},
                {
                    "data": "order.approved_by.username",
                    "class": "text-center text-capitalize",
                    "render": function (data) {
                        return data ? data : '-';
                    }
                }
            ],
            "createdRow": function (row, data) {
                if ('approved' == data.order.status) {
                    $(row).addClass("success");
                } else if ('rejected' == data.order.status) {
                    $(row).addClass("warning");
                }
            },
            "drawCallback": function () {
                $('[data-toggle="tooltip"]').tooltip();
            }
        });

        var o = this;
        $dt_vps_order.find('tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            o._formatDetails(row.data(), row, tr);
        });
    };

    p._formatDetails = function (d, row, tr) {
        var orderId = d.id;
        var $dt_vps_order = $("#dt_vps_order");
        $.ajax({
            "type": "POST",
            "url": $dt_vps_order.data("details-source"),
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

    window.materialadmin.VpsOrderDataTable = new VpsOrderDataTable;
}(this.materialadmin, jQuery));
