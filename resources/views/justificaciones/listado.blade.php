<x-app-layout>
    <link href="{{asset('css/datatables.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/dataTables.dataTables.css')}}" rel="stylesheet">
    <link href="{{asset('css/buttons.dataTables.css')}}" rel="stylesheet">
    <link href="https://cdn.datatables.net/searchbuilder/1.7.1/css/searchBuilder.dataTables.css" rel="stylesheet">
    
    
        <br>
        <h2>Justificaciones</h2>
        <hr>
    
        <table id="personas" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Color</th>
                    <th>Unidad</th>
                    <th>Sigla</th>
                    <th>Cantidad</th>
                    <th>Descuento</th>
                    <th>Referencia</th>
    
                </tr>
            </thead>
            <tbody>
                @foreach ($justificaciones as $jus)
                <tr>
                    <td>
                        {{ $jus->id}}
                    </td>
                    <td style="background-color: {{ $jus->color}}; color: white;">
                        {{ $jus->descripcion}}
                    </td>
                    <td>
                        {{ $jus->color}}
                    </td>
                    <td>
                        {{ $jus->unidad}}
                    </td>
                    <td>
                        {{ $jus->sigla}}
                    </td>
                    <td>
                        {{ $jus->cantidad}}
                    </td>
                    <td>
                        {{ $jus->descuento}}
                    </td>
                    <td>
                        {{ $jus->referencia}}
                    </td>
                </tr>
        @endforeach
            </tbody>
        </table>
    
      
    
        <script src="{{asset('js/jquery-3.6.4.min.js')}}"></script>
    <!-- datatable-->
    <script src="{{asset('js/jszip.js')}}"></script>
    <script src="{{asset('js/pdfmake.js')}}"></script>
    <script src="{{asset('js/vfs_fonts.js')}}"></script>
    <script src="{{asset('js/dataTables.js')}}"></script>
    <script src="{{asset('js/dataTables.buttons.js')}}"></script>
    <script src="{{asset('js/buttons.colVis.js')}}"></script>
    <script src="{{asset('js/buttons.html5.js')}}"></script>
    <script src="{{asset('js/buttons.print.js')}}"></script>
    <script src="https://cdn.datatables.net/searchbuilder/1.7.1/js/dataTables.searchBuilder.js"></script>
    
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