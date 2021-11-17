$(function () {
    if (typeof carsDatatableApiUrl !== "undefined") {
        window.datatable = $($datatableCars).DataTable({
            processing: true,
            serverSide: true,
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.11.3/i18n/pl.json",
            },
            ajax: carsDatatableApiUrl,
            columns: [
                {
                    data: "id",
                    name: "id",
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
                    data: "key",
                    name: "key",
                },
                {
                    data: "type",
                    name: "type",
                },
                {
                    data: "state",
                    name: "state",
                },
                {
                    data: "action",
                    name: "action",
                    orderable: true,
                    searchable: true,
                },
            ],
        });
    }
});
