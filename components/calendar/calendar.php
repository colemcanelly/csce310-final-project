<!-- By: Cole McAnelly                              -->
<div id="calendar" class="mx-auto mt-5"></div>

<style>
  #calendar {
    max-width: 1100px;
    height: 84vh;
  }
</style>

<!-- CALENDAR API: https://fullcalendar.io/docs/ -->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.6/index.global.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      events: './api/calendar.php',
      themeSystem: 'bootstrap',
      allDaySlot: false,
      expandRows: true,
      slotDuration: '00:30',
      slotLabelInterval: '01:00',
      scrollTime: '08:00',
      initialView: 'timeGridWeek',
      initialDate: '2023-05-04',
      customButtons: {
        addEvent: {
          text: 'NEW EVENT',
          click: () => {
            $('#newEventModal').modal('show');
          }
        }
      },
      eventClick: (info) => {
        // Hide the title section
        $('#edit-title-section').hide();

        // Disable the form input
        $('#edit-food-id').prop('disabled', true);
        $('#edit-event-date').prop('disabled', true);
        $('#edit-start-time').prop('disabled', true);
        $('#edit-end-time').prop('disabled', true);
        
        // Hide the update and delete buttons. Show the edit button
        $('#btn-delete').hide();
        $('#btn-update').hide();
        $('#btn-edit').show();

        $('#editEventModalLabel').text(info.event.title);

        // Set the attributes
        let event_id = info.event.extendedProps.eventId;
        let option_id = info.event.extendedProps.foodId;
        let start_date_time = new Date(info.event.start);
        let date = start_date_time.toISOString().split("T")[0];
        let start = start_date_time.toTimeString().split(' ')[0];
        let end = new Date(info.event.end).toTimeString().split(' ')[0];
        $('#edit-event-id').prop('value', event_id);
        $('#edit-event-title').prop('value', info.event.title);
        $(`#edit-food-id--${option_id}`).prop('selected', true);
        $('#edit-event-date').prop('value', date);
        $('#edit-start-time').prop('value', start);
        $('#edit-end-time').prop('value', end);
        
        // Show the popup
        $('#editEventModal').modal('show');
      },
      headerToolbar: {
        left: 'dayGridMonth,timeGridWeek,timeGridDay',
        center: 'title',
        right: 'addEvent today prev,next',
      },
      buttonText: {
        today: 'TODAY',
        month: 'MONTH',
        week: 'WEEK',
        day: 'DAY'
      }
    });

    calendar.render();
  });
</script>