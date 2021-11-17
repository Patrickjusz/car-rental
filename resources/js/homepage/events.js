var btnReservataion = ".btn-reservation";
var $btnSaveReservation = $("#btn-save-reservation");

$(function () {
    $(document).on("click", btnReservataion, function () {
        var id = $(this).data("id");
        if (id > 0) {
            rental.showModal();
        }
    });

    $($btnSaveReservation).click(function () {
        var id = $(this).data("id");
        if (id > 0) {
            rental.add(id);
        }
    });
});
