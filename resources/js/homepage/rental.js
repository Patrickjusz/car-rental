var $reservationModal = $("#reservation-modal");
var $btnSaveReservation = $("#btn-save-reservation");
var $cityInput = $("#reservation-city");
var $emailInput = $("#reservation-email");
var $dateFrom = $("#reservation-date-from");
var $dateTo = $("#reservation-date-to");
var $formControl = $(".form-control");
var $formErrors = $(".form-errors");

class Rental {
    // config
    apiUrl = "api/rental";
    httpHeaders = { "X-Authorization": "API_KEY" };
    data = {};

    add() {
        let formData = this.getFormData();
        let errors = this.validateInputs(formData);
        this.checkErrors(errors);

        if (errors.length == 0) {
            simpleRequest.ajax(this.apiUrl, "POST", formData);
        }
    }

    getFormData() {
        let formData = new Object();
        formData.car_id = $($btnSaveReservation).data("id") ?? 0;
        formData.city = $($cityInput).val();
        formData.email = $($emailInput).val();
        formData.date_from = $($dateFrom).val();
        formData.date_to = $($dateTo).val();

        return formData;
    }

    validateInputs(formData) {
        let errors = [];
        $($formControl).removeClass("is-invalid");

        if (formData.car_id < 0) {
            errors.push("Błąd ogólny. Brak id!");
            $($nameInput).addClass("is-invalid");
        }

        if (formData.city == "") {
            errors.push("The city is required!");
            $($cityInput).addClass("is-invalid");
        }

        if (!this.isValidEmail(formData.email)) {
            errors.push("Bad email address!");
            $($emailInput).addClass("is-invalid");
        }

        if (
            typeof formData.date_from === "undefined" ||
            formData.dateFrom == ""
        ) {
            errors.push("The dateFrom is required!");
            $($dateFrom).addClass("is-invalid");
        }

        if (typeof formData.date_to === "undefined" || formData.dateTo == "") {
            errors.push("The dateTo is required!");
            $($dateTo).addClass("is-invalid");
        }

        return errors;
    }

    isValidEmail(email) {
        const re =
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
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

    showModal(id) {
        $($btnSaveReservation).data("id", id);
        $($reservationModal).modal("show");
    }
}

window.rental = new Rental();
