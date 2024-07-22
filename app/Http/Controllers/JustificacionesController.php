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
        //return response()->json($estructura);
    }

    public function justificacion(Request $request)
    {
        $id = $request->input('id');
        $justificacion = Justificaciones::where('id', $id)->first();
        $campo ="<form>"; 
        


        if($justificacion){

            switch ($justificacion->unidad) {
                case 'DIA':
                    $campo .= '<label>Fecha desde</label><input type="date" class="form-control" id="fecha_desde" name="fecha_desde">';
                    $campo .= '<label>Fecha hasta</label><input type="date" class="form-control" id="fecha_hasta" name="fecha_hasta">';
                    $campo .= '<label>Cantidad</label><input type="number" onclick="calculo_dias()" class="form-control" id="cantidad" name="cantidad"><br>';
                    break;
                case 'HORA':
                    $campo .= '<label>Horas</label><input type="number" class="form-control" id="hora" name="hora">';
                    break;
                case 'MIN':
                    $campo .= '<label>Minutos</label><input type="number" class="form-control" id="minutos" name="minutos">';
                    break;
                default:
                    $campo = 'Selecciona una magnitud válida.';
                    break;
            }
        $campo.="<button class='btn btn-primary' type='submit'>Guardar</button></form>";
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
        //return response()->json($estructura);
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
