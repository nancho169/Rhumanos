<?php

namespace App\Http\Controllers;

use App\Models\justificaciones;
use Illuminate\Http\Request;

class JustificacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function listado()
    {
        $justificaciones = Justificaciones::orderBy('id','desc')->get();
        return view('justificaciones.listado', compact('justificaciones'));
    }

    public function justificacion(Request $request)
{
    $id = $request->input('id');
    $persona_id = $request->input('persona_id');
    $justificacion = Justificaciones::where('id', $id)->first();

    if ($justificacion) {
        $campo = "";
        $campo .= csrf_field(); // Para añadir el token CSRF

        // Agregamos campos ocultos para id de justificación y id de usuario
        $campo .= '<input type="hidden" name="justificacion_id" value="' . $justificacion->id . '">';
        

        

        switch ($justificacion->unidad) {
            case 'DIA':
                $campo .= '
                    <div class="row">
                        <div class="col-6">
                            <label>Fecha desde</label>
                            <input type="date" class="form-control" id="fecha_desde" name="fecha_desde">
                        </div>
                        <div class="col-6">
                            <label>Fecha hasta</label>
                            <input type="date" class="form-control" id="fecha_hasta" name="fecha_hasta">
                        </div>
    
                    </div>
                    <hr>
                     <div class="row">
                        <div class="col-6">
                            <label>Cantidad<small> solo click para calculo de cantidad de días</small></label>  
                            <input class="btn btn-secondary" onclick="calculo_dias()" type="button" value="Cantidad días">
                        </div>
                        <div class="col-6">
                            <input type="number"  class="form-control" id="dias" name="dias" >
                        </div>
                    </div>
                    <hr>
                ';
                break;
            case 'HORA':
                $campo .= '
                    <label>Fecha </label>
                    <input type="date" class="form-control" id="fecha_desde" name="fecha_desde">
                    <label>Horas</label>
                    <input type="number" class="form-control" id="hora" name="hora">
                ';
                break;
            case 'MIN':
                $campo .= '
                    <label>Fecha </label>
                    <input type="date" class="form-control" id="fecha_desde" name="fecha_desde">
                    <label>Minutos</label>
                    <input type="number" class="form-control" id="minutos" name="minutos">
                ';
                break;
            default:
                $campo = 'Selecciona una magnitud válida.';
                break;
        }
        $campo .= "<label>Descripción<small> Campo opcional</small></label>
                    <input type='text' class='form-control' id='descripcion' name='descripcion'><hr>";
        $campo .= "<a class='btn btn-success' id='boton_guardar' onclick='guarda_novedad()' disabled>Guardar</a>";

        return response()->json([
            'success' => true,
            'data' => $campo
        ]);
    } else {
        return response()->json([
            'success' => false,
            'message' => 'Persona no encontrada'
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(justificaciones $justificaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(justificaciones $justificaciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, justificaciones $justificaciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(justificaciones $justificaciones)
    {
        //
    }
}
