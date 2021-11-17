$(function () {
    $(document).on("click", btnAction, function () {
        var id = $(this).data("id");
        var action = $(this).data("action");

        if (id > 0 || action == 'save') {
            if (action == "delete") {
                cars.delete(id);
            } else if (action == "edit") {
                cars.edit(this);
            } else if (action == "save") {
                cars.add();
            }
        }
    });

    $($btnAddCar).click(function () {
        cars.clearForm();
        $($editCarModal).modal("show");
    });
});
