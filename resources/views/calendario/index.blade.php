<x-app-layout>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>
    <script>

        document.addEventListener('DOMContentLoaded', function() {
          const calendarEl = document.getElementById('calendar')
          const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth'
          })
          calendar.render()
        })
  
      </script>
    
      <div id='calendar'></div>
</x-app-layout>