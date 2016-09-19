(function (namespace, $) {
    "use strict";

    var CustomerDataTable = function () {
        var o = this;
        $(document).ready(function () {
            o.initialize();
        });

    };
    var p = CustomerDataTable.prototype;

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
        var $dt_customer = $('#dt_customer');

        var table = $dt_customer.DataTable({
            "dom": "Bfrtip",
            "processing": true,
            "serverSide": true,
            "ajax": {
                "type": "POST",
                "url": $dt_customer.data('source')
            },
            "pageLength": "50",
            "order": [],
            "columns": [
                {"data": "first_name"},
                {
                    "data": "last_name",
                    "render": function (data) {
                        return data ? data : '-';
                    }
                },
                {"data": "email"},
                {
                    "data": "address",
                    "render": function (data) {
                        return data ? data : '-';
                    }
                },
                {
                    "data": "phone",
                    "render": function (data) {
                        return data ? data : '-';
                    }
                },
                {"data": "action", name: "action", "class": "text-right", "orderable": false, "searchable": false}
            ],
            "buttons": [
                'pageLength', 'excel', 'pdf', 'print', 'colvis'
            ]
        });
    };

    window.materialadmin.CustomerDataTable = new CustomerDataTable;
}(this.materialadmin, jQuery));