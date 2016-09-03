(function () {
    "use strict";
    var readURL = function (input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.avatar').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    };

    $('.avatar').click(function () {
        $('.avatar-input').trigger('click');
    });

    $(".avatar-input").change(function () {
        readURL(this);
    });

    $("button[type='reset']").on("click", function () {
        var $avatar = $('.avatar');

        $avatar.attr("src", $avatar.data("src"));
    });

}());