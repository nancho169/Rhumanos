<x-app-layout>

    <br>
    <h2>Organigrama</h2>
    <hr>

    <table id="personas" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descripción</th>
                <th>Dependencia</th>
                <th>Versión</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($areas as $area)
            <tr>
                <td>
                    {{ $area->id}}
                </td>
                <td>
                    {{ $area->descripcion}}
                </td>
                <td>
                    {{ $area->id_superior}}-{{ $area->area_inferior}}
                </td>
                <td>
                    {{ $area->version}}
                </td>
            </tr>
    @endforeach
        </tbody>
    </table>

    <script src="{{asset('js/jquery-3.6.4.min.js')}}"></script>
    <script>
        $(document).ready( function () {
            
            /*$('#tabla_proyectos').DataTable({
              order: [[1, 'desc']]
            });*/
  
            let table = new DataTable('#personas', {
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

            
          });
    </script>

</x-app-layout>