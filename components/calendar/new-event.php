<!-- Modal -->
<div class="modal top " id="newEventModal" tabindex="-1" aria-labelledby="newEventModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
  <div class="modal-dialog modal-sm ">
    <div class="modal-content">
      <form method="post" name="new-meal" id="new-meal">
        <div class="modal-header">
          <h5 class="modal-title" id="newEventModalLabel">Add a meal</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <!-- ------------------------------------------------- -->
        <div class="modal-body">
          <section class="summary-section">
            <div class="form-outline my-3">
              <input required type="text" id="event-title" name="event-title" class="form-control calendar-summary-input" value="">
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
              <!-- <input required type="text"  class="" value=""> -->
              <?php include_once('./components/calendar/meal-picker.php'); ?>
              <label class="form-label" for="food-id" style="margin-left: 0px;">
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
                  <input required type="date" id="event-date" name="event-date" class="form-control calendar-date-input active" value="2023-04-27">
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
                  <input required type="time" id="start-time" name="start-time" min="00:00" max="23:59" class="form-control calendar-date-input active" value="06:00">
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
                  <input required type="time" id="end-time" name="end-time" min="00:00" max="23:59" class="form-control calendar-date-input active" value="07:00">
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
<script type="text/javascript">
  $(document).ready(() => {
    // catch the form's submit event
    var form = $('#new-meal');
    form.submit(() => {
      $.ajax({
        type: 'POST',
        url: './api/calendar.php',
        data: form.serialize(), // Get the data from the form
        success: (res) => {
          console.log(res);
        },
        error: (res) => {}
      });
      false;
    });
  });
</script>
<!-- DONE: Post submission to DB -->