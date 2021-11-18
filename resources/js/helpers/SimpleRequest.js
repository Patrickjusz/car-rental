class SimpleRequest {
    // config
    apiUrl = "api/rental";
    httpHeaders = { "X-Authorization": API_KEY_PUBLIC };
    data = {};

    ajax(url, httpMethod, data) {
        var classThis = this;
        this.loading(true);
        $.ajax({
            method: httpMethod,
            url: url,
            headers: this.httpHeaders,
            data: data,
            async: true,
            beforeSend: classThis.loading(true),
        })
            .done(function (data) {
                // classThis.reloadDatatable();
                // classThis.hideEditModal();
                if (typeof classThis.reloadDatatable !== "undefined") {
                    classThis.reloadDatatable();
                }
            })
            .fail(function (data) {
                //
            })
            .always(function () {
                classThis.loading(false);
            });
    }

    loading(state) {
        if (state == true) {
            $($loadingBlur).removeClass("hidden");
        } else {
            $($loadingBlur).addClass("hidden");
        }
    }
}

window.simpleRequest = new SimpleRequest();
