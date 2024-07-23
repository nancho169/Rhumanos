<x-app-layout>
<!-- datatable -->


    <br>
    <h2>Padrón personas</h2>
    <hr>

  
  

    <table id="personas" class="display">
        <thead>
            <tr>
                <th>Código</th>
                <th>Apellido Nombre</th>
                <th>Organigrama</th>
                <th>Acciones</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($personas as $per)
            <tr>
                <td>
                    {{ $per->codigo}}
                </td>
                <td>
                    {{ $per->apellido_nombre}}
                </td>
                <td>
                    {{ $per->descripcion}}
                </td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $per->id}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-badge-fill" viewBox="0 0 16 16">
                                <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zm4.5 0a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zM8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6m5 2.755C12.146 12.825 10.623 12 8 12s-4.146.826-5 1.755V14a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1z"/>
                              </svg>Ver ficha 
                        </button>
                        <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $per->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel"><b>{{ $per->apellido_nombre}}</b></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div style="margin: 0px auto;">
                                        <img src="http://localhost:8000/img/dipu.png"  style="width: 60%; margin: 0px auto;"  class="img-thumbnail" alt="...">
                                        </div>
                                        <hr>
                                        Código: {{ $per->codigo}}<br>
                                        Apellido y Nombre : {{ $per->apellido_nombre}}<br>
                                        Área de revista: {{ $per->descripcion}}
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-primary">Ficha completa</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        <button type="button" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"/>
                          </svg>Modificar</button>
                        <button type="button" class="btn btn-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-x" viewBox="0 0 16 16">
                                <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m.256 7a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
                                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m-.646-4.854.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 0 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 .708-.708"/>
                              </svg>Eliminar </button>
                        
                        
                      </div>
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

