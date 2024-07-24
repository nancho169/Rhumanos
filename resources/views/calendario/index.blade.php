
   
<x-app-layout>
  <input class="form-control" value="Ingrese dni">
  <hr>
  <div class="row">
      <div class="col-2">
        <div class="card" >
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <button class="form-control">
                  Feriado
                </button>
            </li>
            <li class="list-group-item">
              <button class="form-control">
                Receso
              </button>
            </li>
            <li class="list-group-item">
              <button class="form-control">
                Paro
              </button>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-10">
        <div class="card" style="background-color: #f3f3ff;" >
        <div id='calendar' style="width: 90%;margin: 0px auto;"></div>
        <br>
        </div>
      </div>
  </div>



  


      
</x-app-layout>

<script>

  
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      
      initialView: 'dayGridMonth',
      selectable: true,
      
      dateClick: function(info) {
      // Maneja el clic en una fecha aquí
      alert('Fecha clicada: ' + info.dateStr);
      // Puedes acceder a la fecha clicada con info.date
    }
      
    });
   
    calendar.render();
  

</script>
