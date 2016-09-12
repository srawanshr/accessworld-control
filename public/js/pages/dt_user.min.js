(function (namespace, $) {
    "use strict";

    var UserDataTable = function () {
        var o = this;
        $(document).ready(function () {
            o.initialize();
        });

    };
    var p = UserDataTable.prototype;

    p.initialize = function () {
        this._initDataTables();
    };

    p._initDataTables = function () {
        if (!$.isFunction($.fn.dataTable)) {
            return;
        }

        this.createDatatable();
    };

    p.createDatatable = function () {
        var $dt_user = $('#dt_user');
        var table = $dt_user.DataTable({
            "dom": '<"clear">lfrtip',
            "processing": true,
            "serverSide": true,
            "ajax": $dt_user.data('source'),
            "pageLength": "50",
            "columns": [
                {
                    "class": 'details-control text-center',
                    "orderable": false,
                    "data": null,
                    "defaultContent": '',
                    "searchable": false
                },
                {
                    "data": "avatar", "render": function (data, type, full) {
                    return "<img src='" + data + "' class='img-circle width-1'>";
                }, "searchable": false, "class": "text-center", "orderable": false
                },
                {"data": "username"},
                {"data": "email"},
                {"data": "role", "class": "text-center"},
                {"data": "action", name: "action", "class": "text-right", "orderable": false, "searchable": false}
            ],
            "order": [[2, 'asc']],
            "drawCallback": function () {
                $('[data-toggle="tooltip"]').tooltip();
            }
        });

        var o = this;
        $dt_user.find('tbody').on('click', 'td.details-control', function () {
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
        var first_name = d.first_name == null ? '-' : d.first_name;
        var last_name = d.last_name == null ? '-' : d.last_name;
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

    window.materialadmin.UserDataTable = new UserDataTable;
}(this.materialadmin, jQuery));
