
   
<x-app-layout>
  
  <div class="row">
    <div class="col-2">
      <label for="dni" class="visually-hidden">Ingrese el Apellido/Dni</label>
      <input type="text" readonly class="form-control-plaintext" id="dni_auto" value="INGRESE DNI" >
    </div>
    <div class="col-7">
      <label for="dni" class="visually-hidden">Ingrese el Apellido/Dni</label>
      <input type="text" list="listado" class="form-control"  id="dni" onchange="autocompletado()"  autocomplete="on" placeholder="apellido/dni">
      <input type="number"  class="visually-hidden"  id="cod"   autocomplete="on" placeholder="">
        <datalist id="listado">
          
        </datalist>
    </div>
    <div class="col-3">
      <button type="btn btn-primary" class="btn btn-primary"  onclick="novedades_dni()">buscar</button>
    </div>
  </div>

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

  function muestra_calendario(){

    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      
      initialView: 'dayGridMonth',
      selectable: true,
      
      dateClick: function(info) {
      // Maneja el clic en una fecha aquí
      alert('Fecha clicada: ' + info.dateStr);
      // Puedes acceder a la fecha clicada con info.date
      },
      events: [
        <?php 
        echo "{ title: 'title', id: 'a', classNames : 'primary', start: '2024-08-21', end: '2024-08-21'}";    
        ?>
    
   
  ],
  editable: true
      
    });
   
    calendar.render();
    
  }
    
  

</script>

<script>
   function novedades_dni(){
     var doc = document.getElementById('cod').value;
    
      $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: "{{ route('novedades_por_usuario') }}",
        method: 'GET',
        data: {dni:doc},
        success: function(response) {
            let data = response.data;
            console.log(data);
            if(!response.success){
              //SI NO SE ECUENTRA DNI DEVUELVE MENSAJE 
              $('#novedades_particulares').html("<div class='alert alert-danger'>SIN NOVEDADES</div>"); 
            }
            else{
              //SI ENCONTRO DNI DEVUELVE LOS DATOS
              $('#novedades_particulares').html(response.data); 
              let table = new DataTable('#novedades_particulares', {
                  autoWidth:false,
                    responsive: true,
                    "language": {
                    "url":"{{ asset('Spanish.json') }}"
                },
        
        
            buttons: [
                'csvHtml5',
                'excelHtml5',
                'pdfHtml5'
            ],
            order: [[1, 'asc']]        
            });

            }
         },
         error: function(xhr) {
             $('#response').html('<p>Error: ' + xhr.responseText + '</p>');
         }
     });
    }
  function autocompletado(){
    var doc = document.getElementById('dni').value;
    $.ajax({
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      url: "{{ route('autocompletado') }}",
      method: 'GET',
      data: {dni:doc},
      success: function(response) {
          let data = response.data;
          
          if(!data){
            //SI NO SE ECUENTRA DNI DEVUELVE MENSAJE 
            $('#response').html("<div class='alert alert-danger'>NO SE ENCONTRO DNI</div>"); 
          }
          else{
            //SI ENCONTRO DNI DEVUELVE LOS DATOS
            $('#listado').html(response.data); 
            let cadena = response.data.split('>'); 
            let cadena1 = cadena[1].split('<');
            document.getElementById("cod").value=cadena1[0];
            console.log(cadena1[0]);
          }
       },
       error: function(xhr) {
           $('#response').html('<p>Error: ' + xhr.responseText + '</p>');
       }
   });
  }
</script>
