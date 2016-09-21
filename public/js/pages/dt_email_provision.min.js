(function (namespace, $) {
    "use strict";

    var WebProvisionDataTable = function () {
        var o = this;
        $(document).ready(function () {
            o.initialize();
        });
    };

    var p = WebProvisionDataTable.prototype;

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
        var $dt_web_provision = $("#dt_web_provision");

        var table = $dt_web_provision.DataTable({
            "dom": '<"clear">lfrtip',
            "order": [],
            "processing": true,
            "serverSide": true,
            "ajax": {
                "type": "POST",
                "url": $dt_web_provision.data("source")
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
                {"data": "customer.name", "name": "customer.name"},
                {"data": "domain", "name": "email_provisions.domain", "class": "text-center"},
                {"data": "provisioned_by.name", "name": "provisionedBy.name", "class": "text-center"},
                {"data": "server_domain_id", "name": "email_provisions.server_domain_id", "class": "text-center"}
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
        $dt_web_provision.find('tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            o._formatDetails(row.data(), row, tr);
        });
    };

    p._formatDetails = function (d, row, tr) {

        var provisionId = d.id;
        var $dt_web_provision = $("#dt_web_provision");

        $.ajax({
            "type": "POST",
            "url": $dt_web_provision.data("details-source"),
            "data": {id: provisionId},
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

    window.materialadmin.WebProvisionDataTable = new WebProvisionDataTable;
}(this.materialadmin, jQuery));