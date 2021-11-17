var $reservationModal = $('#reservation-modal');


class Rental {
    // config
    apiUrl = "api/rental";
    httpHeaders = { "X-Authorization": "API_KEY" };
    data = {};

    add(id) {
        alert(id);
    }

    showModal() {
        $($reservationModal).modal("show");
    }
}

window.rental = new Rental();
