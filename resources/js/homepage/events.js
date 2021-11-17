var btnReservataion = ".btn-reservation";


$(function () {
    $(document).on("click", btnReservataion, function () {
        var id = $(this).data("id");
        if (id > 0) {
            rental.showModal(id);
        }
    });

    $($btnSaveReservation).click(function () {
        var id = $(this).data("id");

        if (id > 0) {
            rental.add(id);
        }
    });
});
