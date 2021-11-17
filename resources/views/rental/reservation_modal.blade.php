<div class="modal fade" id="reservation-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Dodaj rezerwacje</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Miasto odbioru auta:</label>
                        <input type="text" class="form-control" id="reservation-city" maxlength="512">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Data odbioru:</label>
                        <input type="text" class="form-control" id="reservation-data-from">
                    </div>

                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Data zwrotu:</label>
                        <input type="text" class="form-control" id="reservation-data-from">
                    </div>

                    <div class="mb-3">
                        <div class="alert alert-danger form-errors" style="display:none;" role="alert">

                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
                <button id="btn-save-reservation"  type="button" class="btn btn-primary">Zarezerwuj</button>
            </div>
        </div>
    </div>
</div>


<div class="loading hidden">
    <div class='uil-ring-css' style='transform:scale(0.79);'>
        <div></div>
    </div>
</div>
