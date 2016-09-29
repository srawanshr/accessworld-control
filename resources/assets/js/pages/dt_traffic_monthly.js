(function (namespace, $) {
    "use strict";

    var TrafficDataTable = function () {
        var o = this;
        $(document).ready(function () {
            o.initialize();
        });

    };
    var p = TrafficDataTable.prototype;

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
        var $dt_traffic = $('#dt_traffic');

        var month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];

        var table = $dt_traffic.DataTable({
            "dom": "Brtip",
            "processing": true,
            "serverSide": true,
            "scrollY": "700px",
            "scrollCollapse": true,
            "ajax": {
                "type": "POST",
                "url": $dt_traffic.data('source'),
                "data": function (d) {
                    d.year = $('#q_year').val();
                    d.month = $('#q_month').val();
                    d.uuid = $('#q_uuid').val();
                    d.name = $('#q_name').val();
                    d.total = $('#q_total').val();
                }
            },
            "pageLength": "50",
            "order": [],
            "columns": [
                {"data": "name"},
                {"data": "uuid"},
                {"data": "year"},
                {"data": "month", "render": function (data) {
                    return data;
                }},
                {
                    "data": "upload", "class": "text-right", "searchable": false, "render": function (data) {
                    return data ? parseFloat(data / (1024 * 1024 * 1024)).toFixed(2) + ' GB' : '-';
                }
                },
                {
                    "data": "download", "class": "text-right", "searchable": false, "render": function (data) {
                    return data ? parseFloat(data / (1024 * 1024 * 1024)).toFixed(2) + ' GB' : '-';
                }
                },
                {
                    "data": "total", "class": "text-right", "searchable": false, "render": function (data) {
                    return data ? parseFloat(data / (1024 * 1024 * 1024)).toFixed(2) + ' GB' : '-';
                }
                }
            ],
            "buttons": [
                'pageLength', 'excel', 'pdf', 'print', 'colvis'
            ]
        });

        $('.query').change( function() {
                var val = $.fn.dataTable.util.escapeRegex(
                    $(this).val()
                );

                table.column($(this).data('col'))
                    .search(val ? '^' + val + '$' : '', true, false)
                    .draw();
        } );
    };

    window.materialadmin.TrafficDataTable = new TrafficDataTable;
}(this.materialadmin, jQuery));