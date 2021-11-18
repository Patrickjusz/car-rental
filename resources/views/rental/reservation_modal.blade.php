<div class="modal fade" id="reservation-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Dodaj rezerwacje</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- https://laravelcollective.com/ HMM? --}}
                <form>
                    <div class="mb-3">
                        <label for="reservation-city" class="col-form-label">Miasto odbioru auta:</label>
                        <input type="text" class="form-control" id="reservation-city" maxlength="512">
                    </div>

                    <div class="mb-3">
                        <label for="reservation-email" class="col-form-label">Adres e-mail:</label>
                        <input type="email" class="form-control" id="reservation-email" maxlength="512">
                    </div>

                    <div class="mb-3">
                        <div class="form-group">
                            <label class="control-label" for="reservation-date-from">Data odbioru</label>
                            <input class="form-control" id="reservation-date-from" name="date" placeholder="od"
                                type="text" readonly="readonly" />
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-group">
                            <label class="control-label" for="reservation-date-to">Data zwrotu</label>
                            <input class="form-control" id="reservation-date-to" name="date" placeholder="do"
                                type="text" readonly="readonly" />
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="alert alert-danger form-errors" style="display:none;" role="alert">

                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
                <button id="btn-save-reservation" type="button" class="btn btn-primary">Zarezerwuj</button>
            </div>
        </div>
    </div>
</div>