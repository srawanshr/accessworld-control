(function (namespace, $) {
    "use strict";

    var DepositDataTable = function () {
        var o = this;
        $(document).ready(function () {
            o.initialize();
        });

    };
    var p = DepositDataTable.prototype;

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
        var $dt_deposit = $('#dt_deposit');

        var table = $dt_deposit.DataTable({
            "dom": "Bfrtip",
            "processing": true,
            "serverSide": true,
            "ajax": {
                "type": "POST",
                "url": $dt_deposit.data('source')
            },
            "pageLength": "50",
            "order": [],
            "columns": [
                {"data": "created_at"},
                {"data": "amount"},
                {"data": "deposited_by"}
            ],
            "buttons": [
                'pageLength', 'excel', 'pdf', 'print', 'colvis'
            ]
        });
    };

    window.materialadmin.DepositDataTable = new DepositDataTable;
}(this.materialadmin, jQuery));