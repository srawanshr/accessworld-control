(function (namespace, $) {
    "use strict";

    var StaffDataTable = function () {
        var o = this;
        $(document).ready(function () {
            o.initialize();
        });

    };
    var p = StaffDataTable.prototype;

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
        var $dt_staff = $('#dt_staff');
        var table = $dt_staff.DataTable({
            "dom": "Bfrtip",
            "processing": true,
            "serverSide": true,
            "ajax": {
                "type": "POST",
                "url": $dt_staff.data('source')
            },
            "pageLength": "50",
            "order": [],
            "columns": [
                {
                    "class": 'details-control text-center',
                    "orderable": false,
                    "data": null,
                    "defaultContent": '',
                    "searchable": false
                },
                {
                    "data": "avatar",
                    "searchable": false,
                    "class": "text-center",
                    "orderable": false,
                    "render": function (data) {
                        return "<img src='" + data + "' class='img-circle width-1'>";
                    }
                },
                {
                    "data": "fname", "render": function (data, row, full) {
                    return full.fname + ' ' + full.lname;
                }
                },
                {"data": "email"},
                {"data": "qr", "class": "text-center"},
                {"data": "action", name: "action", "class": "text-right", "orderable": false, "searchable": false}
            ],
            "drawCallback": function (settings) {
                $('[data-toggle="tooltip"]').tooltip();
            },
            "buttons": [
                'pageLength', 'excel', 'pdf', 'print', 'colvis'
            ]
        });

        var o = this;
        $dt_staff.find('tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            if (row.child.isShown()) {
                row.child.hide();
                tr.removeClass('shown');
            }
            else {
                row.child(o._formatDetails(row.data())).show();
                tr.addClass('shown');
            }
        });
    };

    p._formatDetails = function (d) {
        var status = d.status == 1 ? 'Active' : 'Inactive';
        var first_name = d.fname == null ? '-' : d.fname;
        var last_name = d.lname == null ? '-' : d.lname;
        var address = d.address == null ? '-' : d.address;
        var phone = d.phone == null ? '-' : d.phone;
        return '<div class="card style-default-dark"><div class="card-body text-medium"><div class="row">' +
            '<div class="col-sm-6">' +
            '<div class="row">' +
            '<div class="col-sm-6">First Name:</div>' +
            '<div class="col-sm-6">' + first_name + '</div>' +
            '<div class="col-sm-6">Address:</div>' +
            '<div class="col-sm-6">' + address + '</div>' +
            '<div class="col-sm-6">Status:</div>' +
            '<div class="col-sm-6">' + status + '</div>' +
            '</div>' +
            '</div>' +
            '<div class="col-sm-6">' +
            '<div class="row">' +
            '<div class="col-sm-6">Last Name:</div>' +
            '<div class="col-sm-6">' + last_name + '</div>' +
            '<div class="col-sm-6">Phone:</div>' +
            '<div class="col-sm-6">' + phone + '</div>' +
            '<div class="col-sm-6">Created:</div>' +
            '<div class="col-sm-6">' + d.created_at + '</div>' +
            '</div>' +
            '</div>' +
            '</div></div></div>';
    };

    window.materialadmin.StaffDataTable = new StaffDataTable;
}(this.materialadmin, jQuery));
