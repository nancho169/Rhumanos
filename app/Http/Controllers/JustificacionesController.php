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
