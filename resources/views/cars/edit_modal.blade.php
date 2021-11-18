  <div class="modal fade" id="edit-car-modal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Edytuj samochód</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form>
                      <div class="mb-3">
                          <label for="recipient-name" class="col-form-label">Nazwa samochodu:</label>
                          <input type="text" class="form-control" id="car-name" maxlength="512" required>
                      </div>
                      <div class="mb-3">
                          <label for="message-text" class="col-form-label">Opis:</label>
                          <textarea class="form-control" id="car-description" maxlength="2048"></textarea>
                      </div>

                      <div class="mb-3">
                          <label for="message-text" class="col-form-label">Cena:</label>
                          <input type="number" step="0.01" min="0" class="form-control" id="car-price" required>
                      </div>

                      <div class="mb-3">
                          <label for="message-text" class="col-form-label">Status:</label>
                          <select id="car-state" class="form-control" name="car-state">
                              <option value="active">Aktywny</option>
                              <option value="inactive">Niekatywny</option>
                          </select>
                      </div>

                      <div class="mb-3">
                          <div class="alert alert-danger form-errors" style="display:none;" role="alert">

                          </div>
                      </div>
                  </form>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
                  <button type="button" class="btn btn-primary btn-action" data-id="1"
                      data-action="save">Zapisz</button>
              </div>
          </div>
      </div>
  </div>


  <div class="loading hidden">
      <div class='uil-ring-css' style='transform:scale(0.79);'>
          <div></div>
      </div>
  </div>

  <div class="modal fade" id="preview-modal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Podgląd rezerwacji (DEV API)</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <textarea  id="preview-orders" style="width:100%; height: 60vh;" readonly></textarea>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
              </div>
          </div>
      </div>
  </div>
