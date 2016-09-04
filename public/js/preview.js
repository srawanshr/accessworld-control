(function () {
    "use strict";
    var readURL = function (input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(".preview").attr("src", e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    };

    $(".preview").click(function () {
        $(".image-input").trigger("click");
    });

    $(".image-input").change(function () {
        readURL(this);
    });

    $("button[type='reset']").on("click", function () {
        var $image = $(".preview");

        $image.attr("src", $image.data("src"));
    });

}());