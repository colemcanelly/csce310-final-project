<!-- Modal -->
<div class="modal top " id="newEventModal" tabindex="-1" aria-labelledby="newEventModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
  <div class="modal-dialog modal-sm ">
    <div class="modal-content">
      <form action="">
        <div class="modal-header">
          <h5 class="modal-title" id="newEventModalLabel">Add a meal</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <!-- ------------------------------------------------- -->
        <div class="modal-body">
          <section class="summary-section">
            <div class="form-outline my-3">
              <input type="text" id="event-title" name="summary" class="form-control calendar-summary-input" value="">
              <label class="form-label" for="event-title" style="margin-left: 0px;">
                Title
              </label>
              <div class="form-notch">
                <div class="form-notch-leading" style="width: 9px;"></div>
                <div class="form-notch-middle" style="width: 62.4px;"></div>
                <div class="form-notch-trailing"></div>
              </div>
            </div>
          </section>
          <section>
            <div class="form-outline my-3">
              <!-- <input type="text"  class="" value=""> -->
              <?php include_once('./components/calendar/meal-picker.php'); ?>
              <label class="form-label" for="select-food" style="margin-left: 0px;">
                Food
              </label>
              <div class="form-notch">
                <div class="form-notch-leading" style="width: 9px;"></div>
                <div class="form-notch-middle" style="width: 35.2px;"></div>
                <div class="form-notch-trailing"></div>
              </div>
            </div>
          </section>
          <section class="date-time-section" style="display: block;">
            <div class="row my-3">
              <div>
                <div class="form-outline datepicker">
                  <input type="date" id="event-date" name="event.date" class="form-control calendar-date-input active" value="2023-04-27 ">
                  <label class="form-label" for="event-date" style="margin-left: 0px;">
                    Date
                  </label>
                  <div class="form-notch">
                    <div class="form-notch-leading" style="width: 9px;"></div>
                    <div class="form-notch-middle" style="width: 35.2px;"></div>
                    <div class="form-notch-trailing"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row my-3">
              <div>
                <div class="form-outline timepicker">
                  <input type="time" id="start-time" name="start.time" min="00:00" max="23:59" class="form-control calendar-date-input active" value="00:00">
                  <label class="form-label" for="start-time" style="margin-left: 0px;">
                    Start
                  </label>
                  <div class="form-notch">
                    <div class="form-notch-leading" style="width: 9px;"></div>
                    <div class="form-notch-middle" style="width: 35.2px;"></div>
                    <div class="form-notch-trailing"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row my-3">
              <div>
                <div class="form-outline timepicker">
                  <input type="time" id="end-time" name="end.time" min="00:00" max="23:59" class="form-control calendar-date-input active" value="00:00">
                  <label class="form-label" for="end-time" style="margin-left: 0px;">
                    End
                  </label>
                  <div class="form-notch">
                    <div class="form-notch-leading" style="width: 9px;"></div>
                    <div class="form-notch-middle" style="width: 29.6px;"></div>
                    <div class="form-notch-trailing"></div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
        <!-- ------------------------------------------------- -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-mdb-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>