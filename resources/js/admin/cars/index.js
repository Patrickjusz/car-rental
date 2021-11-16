var $carsDatatable = $("#datatable-cars");

$(function () {
    var table = $($carsDatatable).DataTable({
        processing: true,
        serverSide: true,
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.11.3/i18n/pl.json",
        },
        ajax: carsDatatableApiUrl,
        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
            },
            {
                data: "name",
                name: "name",
            },
            {
                data: "description",
                name: "description",
            },
            {
                data: "price",
                name: "price",
            },
            {
                data: "amount",
                name: "amount",
            },
            {
                data: "action",
                name: "action",
                orderable: true,
                searchable: true,
            },
        ],
    });
});
