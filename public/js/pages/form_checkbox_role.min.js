(function () {
    $(document).ready(function () {
        $("[data-role=selectall]").change(function () {
            var $thisgroup = $("[data-checkbox-group=" + $(this).data('checkbox-group') + "][data-role=select]");
            if (this.checked) {
                $thisgroup.each(function () {
                    this.checked = true;
                })
            } else {
                $thisgroup.each(function () {
                    this.checked = false;
                })
            }
        });

        $("[data-checkbox-group]").change(function () {
            var $thisgroup = $("[data-checkbox-group=" + $(this).data('checkbox-group') + "][data-role=select]");
            var $thisselectall = $("[data-checkbox-group=" + $(this).data('checkbox-group') + "][data-role=selectall]");
            if ($(this).is(":checked")) {
                var isAllChecked = 0;
                $thisgroup.each(function () {
                    if (!this.checked)
                        isAllChecked = 1;
                });
                if (isAllChecked == 0) {
                    $thisselectall.prop("checked", true);
                }
            }
            else {
                $thisselectall.prop("checked", false);
            }
        });

        $('.card-body').on('click', function (e) {
            $('[data-toggle="popover"]').each(function () {
                if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
                    $(this).popover('hide');
                }
            });
        });

        $("[data-checkbox-group][data-role=select]").trigger('change');
    });
})();