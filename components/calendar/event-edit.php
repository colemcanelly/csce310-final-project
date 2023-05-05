<!-- By: Cole McAnelly                              -->
<!-- Modal -->
<div class="modal top " id="editEventModal" tabindex="-1" aria-labelledby="editEventModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
  <div class="modal-dialog modal-sm ">
    <div class="modal-content">
      <form method="post" name="edit-meal" id="edit-meal">
        <!-- EVENT ID - SET WITH SCRIPT -->
        <input id="edit-event-id" type="hidden" name="edit-event-id" value="">
        <div class="modal-header">
          <h5 class="modal-title" id="editEventModalLabel">Title</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <!-- ------------------------------------------------- -->
        <div class="modal-body">
          <section id="edit-title-section" class="summary-section">
            <div class="form-outline my-3">
              <input required type="text" id="edit-event-title" name="edit-event-title" class="form-control calendar-summary-input active" value="">
              <label class="form-label" for="edit-event-title" style="margin-left: 0px;">
                Title
              </label>
              <div class="form-notch">
                <div class="form-notch-leading" style="width: 9px;"></div>
                <div class="form-notch-middle" style="width: 62.4px;"></div>
                <div class="form-notch-trailing"></div>
              </div>
            </div>
          </section>
          <section id="edit-food-section">
            <div class="form-outline my-3">
              <select required id="edit-food-id" name="edit-food-id" class="select form-control active" value="">
                <?php
                $component_id = 'edit-food-id';
                include('./components/calendar/meal-picker.php');
                ?>
              </select>
              <label class="form-label" for="edit-food-id" style="margin-left: 0px;">
                Food
              </label>
              <div class="form-notch">
                <div class="form-notch-leading" style="width: 9px;"></div>
                <div class="form-notch-middle" style="width: 35.2px;"></div>
                <div class="form-notch-trailing"></div>
              </div>
            </div>
          </section>
          <section id="edit-datetime-section" class="date-time-section" style="display: block;">
            <div class="row my-3">
              <div>
                <div class="form-outline datepicker">
                  <input required type="date" id="edit-event-date" name="edit-event-date" class="form-control calendar-date-input active" value="2023-04-27">
                  <label class="form-label" for="edit-event-date" style="margin-left: 0px;">
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
                  <input required type="time" id="edit-start-time" name="edit-start-time" min="00:00" max="23:59" class="form-control calendar-date-input active" value="06:00">
                  <label class="form-label" for="edit-start-time" style="margin-left: 0px;">
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
                  <input required type="time" id="edit-end-time" name="edit-end-time" min="00:00" max="23:59" class="form-control calendar-date-input active" value="07:00">
                  <label class="form-label" for="edit-end-time" style="margin-left: 0px;">
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
          <input type="hidden" id="edit-form-type" name="edit-meal" value="true">
          <button id="btn-delete" onclick="del()" name="delete-meal" value="delete-meal" type="submit" class="btn btn-danger" data-mdb-dismiss="modal">Delete</button>
          <button id="btn-edit" onclick="edit()" type="button" class="btn btn-primary">Edit</button>
          <button id="btn-update" name="edit-meal" value="edit-meal" type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  function edit() {
    // Show the title section
    $('#edit-title-section').show();

    // Enable the form input
    $('#edit-food-id').prop('disabled', false);
    $('#edit-event-date').prop('disabled', false);
    $('#edit-start-time').prop('disabled', false);
    $('#edit-end-time').prop('disabled', false);

    // Show the update and delete buttons. Hide the Edit button
    $('#btn-delete').show();
    $('#btn-update').show();
    $('#btn-edit').hide();

    // Change the title to "Edit Event"
    $('#editEventModalLabel').text("Edit Event");
  }

  function del() {
    if (confirm("Are you sure you want to delete this item?")) {
      $('#edit-form-type').prop('name', 'delete-meal');
    }
  }

  $(document).ready(() => {
    // catch the form's submit event
    var form = $('#edit-meal');
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
      setTimeout(() => {
        calendar.render();
      }, 2000);
      false;
    });
  });
</script>
<!-- DONE: Post submission to DB -->