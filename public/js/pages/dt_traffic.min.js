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

        var table = $dt_traffic.DataTable({
            "dom": "Brtip",
            "processing": true,
            "serverSide": true,
            "scrollY": "700px",
            "scrollCollapse": true,
            "ajax": {
                "type": "POST",
                "url": $dt_traffic.data('source')
            },
            "pageLength": "50",
            "order": [],
            "columns": [
                {"data": "name"},
                {"data": "uuid"},
                {"data": "date"},
                {
                    "data": "upload", "class": "text-right", "render": function (data) {
                    return data ? parseFloat(data / (1024 * 1024 * 1024)).toFixed(2) + ' GB' : '-';
                }
                },
                {
                    "data": "download", "class": "text-right", "render": function (data) {
                    return data ? parseFloat(data / (1024 * 1024 * 1024)).toFixed(2) + ' GB' : '-';
                }
                },
                {
                    "data": "total", "class": "text-right", "render": function (data) {
                    return data ? parseFloat(data / (1024 * 1024 * 1024)).toFixed(2) + ' GB' : '-';
                }
                }
            ],
            "buttons": [
                'pageLength', 'excel', 'pdf', 'print', 'colvis'
            ],
            "initComplete" : function () {
                //To hide double header
                $('.dataTables_scrollBody thead tr').addClass('hidden');
            }
        });

        $('.query').change(function () {
            var val = $.fn.dataTable.util.escapeRegex(
                $(this).val()
            );

            table.column($(this).data('col'))
                .search(val ? '^' + val + '$' : '', true, false)
                .draw();
        });

        //To hide double header
        table.on('draw.dt', function () {
            $('.dataTables_scrollBody thead tr').addClass('hidden')
        });
    };

    window.materialadmin.TrafficDataTable = new TrafficDataTable;
}(this.materialadmin, jQuery));