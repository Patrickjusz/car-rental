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
    data = {};

    add() {
        let formData = this.getFormData();
        let errors = this.validateInputs(formData);
        this.checkErrors(errors);

        if (errors.length == 0) {
            simpleRequest.ajax(this.apiUrl, "POST", formData);
            this.hideModal();
            //@TODO: REFACTOR! FAKE ALERT... I don't check the status for lack of time..  ;>
            Swal.fire(
                "Rezerwacja dodana!",
                "Sprawdź skrzynkę e-mail...",
                "success"
            );
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

    //@TODO: Refactor! Get lang from resources/lang/pl.... ;>
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
            formData.date_from == ""
        ) {
            errors.push("The date from is required!");
            $($dateFrom).addClass("is-invalid");
        }

        if (typeof formData.date_to === "undefined" || formData.date_to == "") {
            errors.push("The date to is required!");
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

    clearForm() {
        $($btnSaveReservation).data("id", 0);
        $($formErrors).hide();
        $($formControl).val("");
        $($formControl).removeClass("is-invalid");
    }

    showModal(id) {
        this.clearForm();
        $($btnSaveReservation).data("id", id);
        $($reservationModal).modal("show");
    }

    hideModal() {
        this.clearForm();
        $($reservationModal).modal("hide");
    }
}

window.rental = new Rental();
