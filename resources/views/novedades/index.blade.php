

<x-app-layout>

  <h2 >
    Carga novedad
 </h2>
 <hr>



<div class="row">
  <div class="col-2">
    <label for="dni" class="visually-hidden">Apellido/Dni</label>
    <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="APELLIDO/DNI">
  </div>
  <div class="col-7">
    <label for="dni" class="visually-hidden">Dni/Apellido</label>
    <input type="text" list="listado" class="form-control"  id="dni" onchange="autocompletado()"  autocomplete="on" placeholder="apellido/dni">
    <input type="number"  class="visually-hidden"  id="cod"   autocomplete="on" placeholder="">

  </div>
  
    <datalist id="listado">
     
    </datalist>
 
  
  <div class="col-3">
    <button type="btn btn-primary" class="btn btn-primary"  onclick="busca_dni()">buscar</button>
  </div>
</div>
<hr>
<!--<form id='novedad' name="novedad">-->
<div id="response"></div>
<!--</form>-->
</x-app-layout>


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
 function busca_dni(){
   var doc = document.getElementById('cod').value;
    $.ajax({
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      url: "{{ route('dni') }}",
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
            $('#response').html(response.data); 
          }
       },
       error: function(xhr) {
           $('#response').html('<p>Error: ' + xhr.responseText + '</p>');
       }
   });
  }
 
  /*HABILITA LOS CAMPOS DEPENDIENDO LA MAGNITUD DE LA JUSTIFICACIÓN*/
  function habilita_campos(){
      var jus = document.getElementById('justificaciones').value;
      $.ajax({
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      url: "{{ route('justificacion') }}",
      method: 'GET',
      data: {id:jus},
      success: function(response) {
          console.log(response.data);
          // response.data.apellido_nombre
          $('#justificacion').html(response.data);
      },
      error: function(xhr) {
          $('#justificacion').html('<p>Error: ' + xhr.responseText + '</p>');
      }
      });

}


function guarda_novedad(){
    
     desde = document.getElementById('fecha_desde').value;
    jus = document.getElementById('justificaciones').value;
    per = document.getElementById('persona_id').value;
    dni = document.getElementById('dni').value;
    des = document.getElementById('descripcion').value;
    if(document.getElementById('hasta')){
      hasta = document.getElementById('hasta').value;
    }
    else
    {
      hasta = desde;
    }
    
    if(document.getElementById('minutos')){
      min = document.getElementById('minutos').value;
    } 
    else{
      min=0;
    }
    if(document.getElementById('hora')){
      ho = document.getElementById('hora').value;
    }
    else
    {
      ho =0;
    }
    if(document.getElementById('dias')){
      di = document.getElementById('dias').value;
    }
    else
    {
      di =0;
    }
    $.ajax({
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
          url: "{{ route('novedades.store') }}",
          method: 'GET',
          data: { persona_id:per, justificacion_id:jus,fecha_desde:desde,fecha_hasta:hasta,dias:di,hora:ho,minutos:min,descripcion:des},
          success: function(response) {
              console.log(response);
              // response.data.apellido_nombre
              $('#response').html("<div class='alert alert-success'>"+response.data+" <b>"+dni+"</b></div>");
              
              //'<div class="row"><div class="col-3"><div class="card" style=""><img src="{{ asset("img/dipu.png")}}" class="card-img-top" alt="..."><div class="card-body"><h5 class="card-title">'+response.data.apellido_nombre+'</h5><p class="card-text">Informacón relevante.</p><a href="#" class="btn btn-primary">Ficha</a></div></div></div><div class="col-9"><div class="card" style="width: 100%;"><div class="card-body"><h5 class="card-title">Novedad</h5><p class="card-text">Informacón relevante.</p></div></div></div></div>'
          },
          error: function(xhr) {
              $('#response').html('<p>Error: ' + xhr.responseText + '</p>');
          }
      });

    
  }

function calculo_dias(){
           
            var fechaInicio = new Date(document.getElementById('fecha_desde').value);
            var fechaFin = new Date(document.getElementById('fecha_hasta').value);

            // Asegurarse de que las fechas sean válidas
            if (isNaN(fechaInicio) || isNaN(fechaFin)) {
                document.getElementById('resultado').innerHTML = 'Por favor, ingrese fechas válidas.';
                return;
            }

            // Calcular la diferencia en milisegundos
            var diferenciaEnMilisegundos = fechaFin - fechaInicio;

            // Convertir milisegundos a días
            var milisegundosPorDia = 1000 * 60 * 60 * 24;
            var diferenciaEnDias = Math.ceil(diferenciaEnMilisegundos / milisegundosPorDia);

            document.getElementById('dias').value =diferenciaEnDias+1;
       
}

</script>
  

  
