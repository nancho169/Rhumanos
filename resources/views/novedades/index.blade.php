

<x-app-layout>

  <x-slot name="header">
    <h2 >
       
        <a href="{{route('profile.edit')}}" class="">
          Novedades
        </a>
    </h2>
    

</x-slot>


<div class="row">
  <div class="col-2">
    <label for="staticEmail2" class="visually-hidden">Ingrese el DNI</label>
    <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="INGRESE DNI">
  </div>
  <div class="col-7">
    <label for="inputPassword2" class="visually-hidden">Dni</label>
    <input type="number" class="form-control" id="dni" placeholder="dni">
  </div>
  <div class="col-3">
    <button type="btn btn-primary" class="btn btn-primary"  onclick="busca_dni()">buscar</button>
  </div>
</div>
<hr>
<div id="response"></div>

</x-app-layout>


<script type="text/javascript">
 function busca_dni(){
   
   //e.preventDefault();
   var doc = document.getElementById('dni').value;
  
   $.ajax({
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      url: "{{ route('dni') }}",
      method: 'GET',
      data: {dni:doc},
      success: function(response) {
           console.log(response.data);
           // response.data.apellido_nombre
           $('#response').html(response.data);
           
          //'<div class="row"><div class="col-3"><div class="card" style=""><img src="{{ asset("img/dipu.png")}}" class="card-img-top" alt="..."><div class="card-body"><h5 class="card-title">'+response.data.apellido_nombre+'</h5><p class="card-text">Informacón relevante.</p><a href="#" class="btn btn-primary">Ficha</a></div></div></div><div class="col-9"><div class="card" style="width: 100%;"><div class="card-body"><h5 class="card-title">Novedad</h5><p class="card-text">Informacón relevante.</p></div></div></div></div>'
       },
       error: function(xhr) {
           $('#response').html('<p>Error: ' + xhr.responseText + '</p>');
       }
   });
  }
 
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
          
          //'<div class="row"><div class="col-3"><div class="card" style=""><img src="{{ asset("img/dipu.png")}}" class="card-img-top" alt="..."><div class="card-body"><h5 class="card-title">'+response.data.apellido_nombre+'</h5><p class="card-text">Informacón relevante.</p><a href="#" class="btn btn-primary">Ficha</a></div></div></div><div class="col-9"><div class="card" style="width: 100%;"><div class="card-body"><h5 class="card-title">Novedad</h5><p class="card-text">Informacón relevante.</p></div></div></div></div>'
      },
      error: function(xhr) {
          $('#justificacion').html('<p>Error: ' + xhr.responseText + '</p>');
      }
      });

}

function calculo_dias(){
           
            var fechaInicio = new Date(document.getElementById('fecha_inicio').value);
            var fechaFin = new Date(document.getElementById('fecha_fin').value);

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

            document.getElementById('cantidad').value =diferenciaEnDias;
       
}

</script>
  

  
