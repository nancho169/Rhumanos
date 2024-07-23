<?php

namespace App\Http\Controllers;

use App\Models\novedades;
use Illuminate\Http\Request;

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
            'personas_id' => 'required|integer',
            'fecha_desde' => 'required_if:unidad,DIA|date',
            'fecha_hasta' => 'required_if:unidad,DIA|date',
            'cantidad' => 'required_if:unidad,DIA|integer',
            'hora' => 'required_if:unidad,HORA|integer',
            'minutos' => 'required_if:unidad,MIN|integer',
        ],
        [
            'justificacion_id.required'=>'fecha desde requerida',
            'personas_id.required'=>'fecha desde requerida',
            'fecha_desde.required'=>'fecha desde requerida',
            'fecha_hasta.required'=>'fecha hasta requerida',
            'cantidad.required'=>'fecha desde requerida',
            'hora.required'=>'fecha desde requerida',
            'minutos.required'=>'fecha desde requerida',
        ]
    );
    
        if($validaciones){
            // Aquí guardas los datos en tu modelo Novedad
            /*$novedad = new Novedades();
            $novedad->justificaciones_id = $request->input('justificacion_id');
            $novedad->personas_id = $request->input('persona_id');
            if ($request->has('fecha_desde')) $novedad->fecha_desde = $request->input('fecha_desde');
            if ($request->has('fecha_hasta')) $novedad->fecha_hasta = $request->input('fecha_hasta');
            if ($request->has('cantidad')) $novedad->cantidad = $request->input('cantidad');
            if ($request->has('hora')) $novedad->hora = $request->input('hora');
            if ($request->has('minutos')) $novedad->minutos = $request->input('minutos');
            $novedad->fecha_creacion = now(); // Usamos el helper now() para la fecha actual
            
            $novedad->save();
            $request->session()->flash('css','success');
            $request->session()->flash('mensaje','Se ha creado el registro exitosamente');*/
            
            return response()->json([
                'success' => true,
                'data' => 'mensaje','Se ha creado el registro exitosamente'
            ]);
        }
        else
        {
            $request->session()->flash('css','danger');
            $request->session()->flash('mensaje','La credenciales indicadas no son válidas');
            
        }
        
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
