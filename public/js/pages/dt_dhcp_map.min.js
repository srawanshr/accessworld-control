(function (namespace, $) {
    "use strict";

    var DhcpMapDataTable = function () {
        var o = this;
        $(document).ready(function () {
            o.initialize();
        });

    };
    var p = DhcpMapDataTable.prototype;

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
        var $dt_dhcp_map = $('#dt_dhcp_map');

        var table = $dt_dhcp_map.DataTable({
            "dom": "Bfrtip",
            "processing": true,
            "serverSide": true,
            "ajax": {
                "type": "POST",
                "url": $dt_dhcp_map.data('source')
            },
            "lengthMenu": [[50, 100, -1], [50, 100, "All"]],
            "order": [],
            "columns": [
                {
                    "class": 'details-control text-center',
                    "data": null,
                    "defaultContent": '',
                    "orderable": false,
                    "searchable": false
                },
                {"data": "hostname"},
                {"data": "ip", "orderable": false},
                {"data": "mac", "orderable": false},
                {"data": "subnet", "orderable": false},
                {"data": "action", "name": "action", "class": "text-right", "orderable": false, "searchable": false}
            ],
            "buttons": [
                'pageLength', 'excel', 'pdf', 'print', 'colvis'
            ]
        });

        var o = this;
        $dt_dhcp_map.find('tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            o._formatDetails(row.data(), row, tr);
        });
    };

    p._formatDetails = function (d, row, tr) {
        var $dt_dhcp_map = $("#dt_dhcp_map");
        $.ajax({
            "type": "GET",
            "url": $dt_dhcp_map.data("details-source"),
            "data": {ip: d.ip},
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

    window.materialadmin.DhcpMapDataTable = new DhcpMapDataTable;
}(this.materialadmin, jQuery));