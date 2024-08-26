

<x-app-layout>
    <h2 >
       Listar por dni o apellido
    </h2>
    <hr>
    
  
  
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
  <!--<form id='novedad' name="novedad">
  
  </form>-->
  
  <table id='novedades_particulares'>

    
  </table>
  </x-app-layout>
  
  <!--<script src="{{asset('js/jquery-3.6.4.min.js')}}"></script>-->
  <script type="text/javascript">

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
    /*verifica si existe el dni ingresado
    si existe trae los datos */
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
   

    function busca_novedades_dni(){
     var doc = document.getElementById('cod').value;
      $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: "{{ route('novedades_por_usuario') }}",
        method: 'GET',
        data: {dni:doc},
        success: function(response) {
            let data = response.data;
            console.log(data);
            if(!data){
              //SI NO SE ECUENTRA DNI DEVUELVE MENSAJE 
              $('#response').html("<div class='alert alert-danger'>NO SE ENCONTRO DNI</div>"); 
            }
            else{
              //SI ENCONTRO DNI DEVUELVE LOS DATOS
              $('#response').html(response.data); 
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
  

    /*function autocompletado(){
     var doc = document.getElementById('dni').value;
      $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: "{{ route('autocompletado') }}",
        method: 'GET',
        data: {dni:doc},
        success: function(response) {
            let data = response.data;
            console.log(data);
            if(!data){
              //SI NO SE ECUENTRA DNI DEVUELVE MENSAJE 
              $('#response').html("<div class='alert alert-danger'>NO SE ENCONTRO DNI</div>"); 
            }
            else{
              //SI ENCONTRO DNI DEVUELVE LOS DATOS
              $('#response').html(response.data); 
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
    }*/
  
  </script>
  
     
   
    
        
    
  
    
  