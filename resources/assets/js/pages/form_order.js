(function (namespace, $) {
    "use strict";

    var OrderForm = function () {
        var o = this;
        $(document).ready(function () {
            o.initialize();
        });

    };
    var p = OrderForm.prototype;

    p.initialize = function () {
        $('#order-date').datepicker({autoclose: true, todayHighlight: true, format: "yyyy-mm-dd"});
        this._initServiceSelect();
        this._enableEvents();
    };

    p._enableEvents = function () {
        var o = this;

        $(document).on("click", ".card-head .tools .btn-collapse", function (e) {
            o._handleCardCollapse(e);
        });

        $(document).on("click", ".card-head .tools .btn-close", function (e) {
            o._handleCardClose(e);
        });
    };

    p._initServiceSelect = function () {
        var o = this;
        $(document).on("click", "#add-service-order", function () {
            var $button = $(this);
            bootbox.dialog({
                    title: "Add a service to order.",
                    message: $("#select-service").html(),
                    buttons: {
                        success: {
                            label: "Ok",
                            className: "btn-primary",
                            callback: function () {
                                o._handleOrderForm($button);
                            }
                        }
                    }
                }
            );
        })
    };

    p._handleOrderForm = function ($button) {
        var o = this;
        $.ajax({
            "type": "GET",
            "url": $button.data("url"),
            "data": {service_id: $("#service_id").val()},
            "success": function (response) {
                $("#service-orders").append(response);
            }
        })
    };

    p._handleCardCollapse = function (e) {
        var card = $(e.currentTarget).closest('.card');
        materialadmin.AppCard.toggleCardCollapse(card);
    };

    p._handleCardClose = function (e) {
        var card = $(e.currentTarget).closest('.card');
        materialadmin.AppCard.removeCard(card);
    };

    window.materialadmin.OrderForm = new OrderForm;
}(this.materialadmin, jQuery));