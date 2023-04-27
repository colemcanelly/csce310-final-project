<!-- Modal -->
<div class="modal top " id="newEventModal" tabindex="-1" aria-labelledby="newEventModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
  <div class="modal-dialog  ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newEventModalLabel">Add a meal</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- ------------------------------------------------- -->
      <div class="modal-body">
        <section class="summary-section">
          <div class="form-outline my-3">
            <input type="text" id="addModal982803addEventSummary" name="summary" class="form-control calendar-summary-input" value="">
            <label class="form-label" for="addModal982803addEventSummary" style="margin-left: 0px;">Summary</label>
            <div class="form-notch">
              <div class="form-notch-leading" style="width: 9px;"></div>
              <div class="form-notch-middle" style="width: 62.4px;"></div>
              <div class="form-notch-trailing"></div>
            </div>
          </div>
        </section>
        <div class="form-outline my-3">
          <textarea type="text" id="addModal982803addEventDescription" name="description" class="form-control"></textarea>
          <label class="form-label" for="addModal982803addEventDescription" style="margin-left: 0px;">
            Description
          </label>
          <div class="form-notch">
            <div class="form-notch-leading" style="width: 9px;"></div>
            <div class="form-notch-middle" style="width: 72.8px;"></div>
            <div class="form-notch-trailing"></div>
          </div>
        </div>
        <div class="d-flex justify-content-between">
          <div class="form-check mx-2">
            <input class="form-check-input calendar-long-events-checkbox" type="checkbox" checked="" id="addModal982803longEventsCheckbox" autocompleted="">
            <label class="form-check-label" for="addModal982803longEventsCheckbox">
              All day event
            </label>
          </div>
          <div class="dropdown color-dropdown">
            <button class="dropdown-toggle color-dropdown-toggle form-control w-auto" type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false"><i class="fas fa-circle" style="color: #cfe0fc"></i></button>
            <ul class="dropdown-menu color-dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 37.5273px, 0px);" data-popper-placement="bottom-start" data-mdb-popper="null">
              <li><a class="dropdown-item" name="color" data-background="#cfe0fc" data-foreground="#0a47a9" href="#"><i class="fas fa-circle" style="color: #cfe0fc"></i></a></li>
              <li><a class="dropdown-item" name="color" data-background="#ebcdfe" data-foreground="#6e02b1" href="#"><i class="fas fa-circle" style="color: #ebcdfe"></i></a></li>
              <li><a class="dropdown-item" name="color" data-background="#c7f5d9" data-foreground="#0b4121" href="#"><i class="fas fa-circle" style="color: #c7f5d9"></i></a></li>
              <li><a class="dropdown-item" name="color" data-background="#fdd8de" data-foreground="#790619" href="#"><i class="fas fa-circle" style="color: #fdd8de"></i></a></li>
              <li><a class="dropdown-item" name="color" data-background="#ffebc2" data-foreground="#453008" href="#"><i class="fas fa-circle" style="color: #ffebc2"></i></a></li>
              <li><a class="dropdown-item" name="color" data-background="#d0f0fb" data-foreground="#084154" href="#"><i class="fas fa-circle" style="color: #d0f0fb"></i></a></li>
              <li><a class="dropdown-item" name="color" data-background="#292929" data-foreground="#f5f5f5" href="#"><i class="fas fa-circle" style="color: #292929"></i></a></li>
            </ul>
          </div>
        </div>
        <section class="long-event-section" style="display: none;">
          <div class="form-outline datepicker my-3">
            <input type="text" id="addModal982803addEventStartDate" name="start.date" class="form-control calendar-date-input active form-icon-trailing" value="27/04/2023">
            <label class="form-label" for="addModal982803addEventStartDate" style="margin-left: 0px;">
              Start
            </label>
            <div class="form-notch">
              <div class="form-notch-leading" style="width: 9px;"></div>
              <div class="form-notch-middle" style="width: 8px;"></div>
              <div class="form-notch-trailing"></div>
            </div>
            <button id="datepicker-toggle-248652" type="button" class="datepicker-toggle-button" data-mdb-toggle="datepicker">
              <i class="far fa-calendar datepicker-toggle-icon"></i>
            </button>
          </div>
        </section>
        <section class="date-time-section" style="display: block;">
          <div class="row my-3">
            <div class="col-6">
              <div class="form-outline datepicker">
                <input type="text" id="addModal982803addEventStartDate2" name="start.date" class="form-control calendar-date-input active form-icon-trailing" value="27/04/2023">
                <label class="form-label" for="addModal982803addEventStartDate2" style="margin-left: 0px;">
                  Start
                </label>
                <div class="form-notch">
                  <div class="form-notch-leading" style="width: 9px;"></div>
                  <div class="form-notch-middle" style="width: 35.2px;"></div>
                  <div class="form-notch-trailing"></div>
                </div>
                <button id="datepicker-toggle-930650" type="button" class="datepicker-toggle-button" data-mdb-toggle="datepicker">
                  <i class="far fa-calendar datepicker-toggle-icon"></i>
                </button>
              </div>
            </div>
            <div class="col-6">
              <div class="form-outline timepicker">
                <input type="text" id="addModal982803addEventStartDateTime" name="start.time" class="form-control calendar-date-input active timepicker-input" value="00:00">
                <button id="timepicker-toggle-868808" tabindex="0" type="button" class="timepicker-toggle-button" data-mdb-toggle="timepicker">
                  <i class="far fa-clock fa-sm timepicker-icon"></i>
                </button>

                <label class="form-label" for="addModal982803addEventStartDateTime" style="margin-left: 0px;">
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
        </section>
        <section class="long-event-section" style="display: none;">
          <div class="form-outline datepicker my-3">
            <input type="text" id="addModal982803addEventEndDate" name="end.date" class="form-control calendar-date-input active form-icon-trailing" value="27/04/2023">
            <label class="form-label" for="addModal982803addEventEndDate" style="margin-left: 0px;">
              End
            </label>
            <div class="form-notch">
              <div class="form-notch-leading" style="width: 9px;"></div>
              <div class="form-notch-middle" style="width: 8px;"></div>
              <div class="form-notch-trailing"></div>
            </div>
            <button id="datepicker-toggle-913832" type="button" class="datepicker-toggle-button" data-mdb-toggle="datepicker">
              <i class="far fa-calendar datepicker-toggle-icon"></i>
            </button>
          </div>
        </section>
        <section class="date-time-section" style="display: block;">
          <div class="row my-3">
            <div class="col-6">
              <div class="form-outline datepicker">
                <input type="text" id="addModal982803addEventEndDate2" name="end.date" class="form-control calendar-date-input active form-icon-trailing" value="27/04/2023">
                <label class="form-label" for="addModal982803addEventEndDate2" style="margin-left: 0px;">
                  End
                </label>
                <div class="form-notch">
                  <div class="form-notch-leading" style="width: 9px;"></div>
                  <div class="form-notch-middle" style="width: 29.6px;"></div>
                  <div class="form-notch-trailing"></div>
                </div>
                <button id="datepicker-toggle-430063" type="button" class="datepicker-toggle-button" data-mdb-toggle="datepicker">
                  <i class="far fa-calendar datepicker-toggle-icon"></i>
                </button>
              </div>
            </div>
            <div class="col-6">
              <div class="form-outline timepicker">
                <input type="text" id="addModal982803addEventEndDateTime" name="end.time" class="form-control calendar-date-input active timepicker-input" value="00:00">
                <button id="timepicker-toggle-926566" tabindex="0" type="button" class="timepicker-toggle-button" data-mdb-toggle="timepicker">
                  <i class="far fa-clock fa-sm timepicker-icon"></i>
                </button>

                <label class="form-label" for="addModal982803addEventEndDateTime" style="margin-left: 0px;">
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
        <button type="button" class="btn btn-primary">Add</button>
      </div>
    </div>
  </div>
</div>