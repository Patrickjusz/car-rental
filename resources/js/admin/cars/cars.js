var $nameInput = $("#car-name");
var $descriptionInput = $("#car-description");
var $priceInput = $("#car-price");
var $stateSelect = $("#car-state");
var $formControl = $(".form-control");
var $formErrors = $(".form-errors");
var $previewOrders = $("#preview-orders");

class Cars {
    // config
    apiUrl = "api/cars";
    apiOrdersUrl = "api/rental";
    httpHeaders = { "X-Authorization": "API_KEY" };
    data = {};
    lastAjaxData = {};

    // methods
    add() {
        let httpMethod;
        let tmpApiUrl = this.apiUrl;
        let formData = this.getFormData();
        let isSetCarId = formData.id > 0;
        let errors = this.validateInputs(formData);
        this.checkErrors(errors);

        if (errors.length == 0) {
            httpMethod = isSetCarId ? "PUT" : "POST";
            tmpApiUrl =
                isSetCarId > 0 ? tmpApiUrl + "/" + formData.id : tmpApiUrl;
            this.simpleRequest(tmpApiUrl, httpMethod, formData);
        }
    }

    edit(el) {
        this.clearForm();
        this.fillInputs(el);
        this.showModal();
    }

    delete(id) {
        let tmpApiUrl = this.apiUrl + "/" + id;
        this.simpleRequest(tmpApiUrl, "DELETE", {});
    }

    //@TODO: REFACTOR, move to separate CLASS
    simpleRequest(url, httpMethod, data) {
        var classThis = this;
        cars.loading(true);
        $.ajax({
            method: httpMethod,
            url: url,
            headers: this.httpHeaders,
            data: data,
            async: false,
            beforeSend: cars.loading(true),
        })
            .done(function (data) {
                classThis.reloadDatatable();
                classThis.hideEditModal();
            })
            .fail(function (data) {
                //
            })
            .always(function (data) {
                classThis.lastAjaxData = data;
                cars.loading(false);
            });
    }

    loading(state) {
        if (state == true) {
            $($loadingBlur).removeClass("hidden");
        } else {
            $($loadingBlur).addClass("hidden");
        }
    }

    getFormData() {
        let formData = new Object();
        formData.id = $($btnSaveAction).data("id") ?? 0;
        formData.name = $($nameInput).val();
        formData.description = $($descriptionInput).val();
        formData.price = $($priceInput).val();
        formData.state = $($stateSelect).val();

        return formData;
    }

    fillInputs(el) {
        //@TODO: REFACTOR...
        $($btnSaveAction).data("id", $(el).data("id"));
        $($nameInput).val($(el).data("name"));
        $($descriptionInput).val($(el).data("description"));
        $($priceInput).val($(el).data("price"));
        $($stateSelect).val($(el).data("state"));
    }

    validateInputs(formData) {
        let errors = [];
        $($formControl).removeClass("is-invalid");

        if (formData.name == "") {
            errors.push("The name is required!");
            $($nameInput).addClass("is-invalid");
        }

        if (formData.name && formData.name.length > 512) {
            errors.push("The name is too long !");
            $($nameInput).addClass("is-invalid");
        }

        if (formData.description && formData.description.length > 2048) {
            errors.push("The description is to long!");
            $($descriptionInput).addClass("is-invalid");
        }

        if (formData.price === "") {
            errors.push("The price is required!");
            $($priceInput).addClass("is-invalid");
        }

        if (formData.state === "") {
            errors.push("The state is required!");
            $($stateSelect).addClass("is-invalid");
        }

        return errors;
    }

    checkErrors(errors) {
        $($formErrors).html("");
        if (errors.length > 0) {
            $(errors).each(function (index, message) {
                $($formErrors).append(message + "<br>");
                $($formErrors).show();
            });
        } else {
            $($formErrors).hide();
        }
    }

    clearForm() {
        $($btnSaveAction).data("id", 0);
        $($formErrors).hide();
        $($formControl).val("");
        $($formControl).removeClass("is-invalid");
    }

    showModal() {
        $($editCarModal).modal("show");
    }

    hideEditModal() {
        $($editCarModal).modal("hide");
        this.clearForm();
    }

    reloadDatatable() {
        datatable.ajax.reload(null, false);
    }

    showOrders(id) {
        this.simpleRequest(this.apiOrdersUrl + "/" + id, "GET", {});
        $($previewOrders).html(JSON.stringify(this.lastAjaxData));
    }
}

window.cars = new Cars();
