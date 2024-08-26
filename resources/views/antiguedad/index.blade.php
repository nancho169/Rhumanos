
   
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
      <button type="btn btn-primary" class="btn btn-primary"  onclick="menu_antiguedad()">buscar</button>
    </div>
  </div>
  <hr>

  <div id="resultado">

  </div>



  


      
</x-app-layout>

<script>
   function menu_antiguedad(){
     var doc = document.getElementById('cod').value;
    
      $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: "{{ route('opciones') }}",
        method: 'GET',
        data: {dni:doc},
        success: function(response) {
            let data = response.data;
            console.log(data);
            if(!response.success){
              //SI NO SE ECUENTRA DNI DEVUELVE MENSAJE 
              $('#resultado').html("<div class='alert alert-danger'>Error, el dato no se encuentra</div>"); 
            }
            else{
              //SI ENCONTRO DNI DEVUELVE LOS DATOS
              $('#resultado').html(response.data); 
         

            }
         },
         error: function(xhr) {
             $('#resultado').html('<p>Error: ' + xhr.responseText + '</p>');
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
