<div id="calendar" class="mx-auto mt-5"></div>

<style>
  #calendar {
    max-width: 1100px;
    /* overflow: hidden; */
    height: 84vh;
  }
</style>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.6/index.global.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      themeSystem: 'bootstrap',
      allDaySlot: false,
      expandRows: true,
      slotDuration: '00:30',
      slotLabelInterval: '01:00',
      scrollTime: '08:00',
      initialView: 'timeGridWeek',
      initialDate: '2023-04-07',
      customButtons: {
        addEvent: {
          text: 'NEW EVENT',
          click: function() {
            $('#newEventModal').modal('show');
            // alert('clicked the custom button!');
          }
        }
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
      },
      // Dummy events
      events: [{
          title: 'All Day Event',
          start: '2023-04-01'
        },
        {
          title: 'Long Event',
          start: '2023-04-07',
          end: '2023-04-10'
        },
        {
          groupId: '999',
          title: 'Repeating Event',
          start: '2023-04-09T16:00:00'
        },
        {
          groupId: '999',
          title: 'Repeating Event',
          start: '2023-04-16T16:00:00'
        },
        {
          title: 'Conference',
          start: '2023-04-11',
          end: '2023-04-13'
        },
        {
          title: 'Meeting',
          start: '2023-04-12T10:30:00',
          end: '2023-04-12T12:30:00'
        },
        {
          title: 'Lunch',
          start: '2023-04-12T12:00:00'
        },
        {
          title: 'Meeting',
          start: '2023-04-12T14:30:00'
        },
        {
          title: 'Birthday Party',
          start: '2023-04-13T07:00:00'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2023-04-28'
        }
      ]
    });

    calendar.render();
  });
</script>