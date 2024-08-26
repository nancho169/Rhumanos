<?php

namespace App\Http\Controllers;

use App\Models\novedades;
use App\Models\personas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class NovedadesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('novedades.index');
    }
    
    public function listar()
    {
        return view('novedades.listar');
    }
    
    public function novedades_por_usuario(Request $request){

        $doc = $request->dni;
        $nov = DB::select('SELECT per.apellido_nombre,nov.justificaciones_id,jus.color,jus.descripcion,nov.fecha_desde,nov.fecha_hasta,nov.fecha_creacion,nov.dias,nov.hora,nov.minutos FROM novedades as nov inner join personas as per ON nov.personas_id=per.id inner join justificaciones as jus on nov.justificaciones_id=jus.id WHERE per.codigo='.$doc);
        
        if($nov){
            $tabla ="<thead>
            <th>Novedad</th>
            <th>Fecha desde</th>
            <th>Fecha hasta</th>
            <th>Fecha creación</th>
            <th>Días</th>
            <th>Horas</th>
            <th>Minutos</th>
            </thead><tbody >";
            for($i = 0; $i < count($nov); $i++) {
                $tabla.= "<tr>  
                            <td style='background-color: ".$nov[$i]->color.";'>".$nov[$i]->descripcion."</td>
                            <td>".$nov[$i]->fecha_desde."</td>
                            <td>".$nov[$i]->fecha_hasta."</td>
                            <td>".$nov[$i]->fecha_creacion."</td>
                            <td>".$nov[$i]->dias."</td>
                            <td>".$nov[$i]->hora."</td>
                            <td>".$nov[$i]->minutos."</td>
                        </tr>";
            }
            $tabla .= "</tbody>";
            return response()->json([
                'success' => true,
                'data' => $tabla
            ]);
        }
        else
            {
                return response()->json([
                    'success' => false,
                    'data' => 'Si novedades'
                ]);
            }
      
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ini_set('error_reporting', E_ALL);
        $validaciones = $request->validate([
            'justificacion_id' => 'required|integer',
            'persona_id' => 'required|integer',
            'fecha_desde' => 'required_if:unidad,DIA|date',
            'fecha_hasta' => 'required_if:unidad,DIA|date',
            'dias' => 'required_if:unidad,DIA|integer',
            'hora' => 'required_if:unidad,HORA|integer',
            'minutos' => 'required_if:unidad,MIN|integer',
        ],
        [
            'justificacion_id.required'=>'fecha desde requerida',
            'persona_id.required'=>'fecha desde requerida',
            'fecha_desde.required'=>'fecha desde requerida',
            'fecha_hasta.required'=>'fecha hasta requerida',
            'dias.required'=>'fecha desde requerida',
            'hora.required'=>'fecha desde requerida',
            'minutos.required'=>'fecha desde requerida',
        ]
    );
    
        if($validaciones){
            // Aquí guardas los datos en tu modelo Novedad
            $novedad = new Novedades();
            $novedad->justificaciones_id = $request->input('justificacion_id');
            $novedad->personas_id = $request->input('persona_id');
            if ($request->has('fecha_desde')) $novedad->fecha_desde = $request->input('fecha_desde');
            if ($request->has('fecha_hasta')) $novedad->fecha_hasta = $request->input('fecha_hasta');
            if ($request->has('cantidad')) $novedad->cantidad = $request->input('cantidad');
            if ($request->has('hora')) $novedad->hora = $request->input('hora');
            if ($request->has('minutos')) $novedad->minutos = $request->input('minutos');
            if ($request->has('dias')) $novedad->dias = $request->input('dias');
            if ($request->has('descripcion')) $novedad->descripcion = $request->input('descripcion');
            $novedad->fecha_creacion = now();
            $novedad->created_at = now();
            $novedad->save();
            
            //$request->session()->flash('css','success');
            //$request->session()->flash('mensaje','Se ha creado el registro exitosamente');
            
            return response()->json([
                'success' => true,
                'data' => 'Se ha creado la novedad exitosamente al agente dni','mensaje'
            ]);
        }
        else
        {
            $request->session()->flash('css','danger');
            $request->session()->flash('mensaje','La credenciales indicadas no son válidas');
            
        }
        
    }
    

    public function autocompletado(Request $request){
        
        $dni = $request->dni;
        $per = DB::select("select id, codigo,apellido_nombre from personas where apellido_nombre like '".$dni."%'    
                            or codigo like '".$dni."%' limit 10");
        $options = "";
        for($i = 0; $i < count($per); $i++) {
            $options .= "<option value='".$per[$i]->apellido_nombre."'>".$per[$i]->codigo."</option>";
        }                            
        return response()->json([
            'success' => true,
            'data' => $options
        ]);

    }
    /**
     * Display the specified resource.
     */
    public function show(novedades $novedades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(novedades $novedades)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, novedades $novedades)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(novedades $novedades)
    {
        //
    }
}
