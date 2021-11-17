
window.$btnSaveReservation = $("#btn-save-reservation");

$(function () {
    var datapickerDateFrom = $("#reservation-date-from").datepicker({
        autoclose: true,
        format: "dd-mm-yyyy",
        startDate: new Date(),
        todayHighlight: true,
        orientation: "bottom",
    });

    var datapickerDateTo = $("#reservation-date-to").datepicker({
        autoclose: true,
        format: "dd-mm-yyyy",
        startDate: new Date(),
        todayHighlight: false,
        orientation: "bottom",
    });

    $(datapickerDateFrom).on("changeDate", function (selected) {
        var minDate = new Date(selected.date.valueOf());
        minDate.setDate(minDate.getDate() + 1);
        $(datapickerDateTo).datepicker("update", minDate);
        $(datapickerDateTo).datepicker("setStartDate", minDate);
    });
});
