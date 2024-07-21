<?php

namespace App\Http\Controllers;

use App\Models\personas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cat_per = DB::select("select count(*) as cant from personas");
        $cat_org = DB::select("select count(*) as cant from organigramas");
        return view('personas.index', compact('cat_per','cat_org'));
        //return response()->json($estructura);
    }

    public function padron()
    {
        //$table = 'rrhh.persona';
        $personas = DB::select("select codigo,apellido_nombre,o.descripcion
                                    from personas as p, organigramas as o 
                                    where p.organigrama_id=o.id");

        //$personas = Persona::orderBy('id','desc')->get();
        return view('personas.padron', compact('personas'));
        //return response()->json($estructura);
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
    public function show(personas $personas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(personas $personas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, personas $personas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(personas $personas)
    {
        //
    }
}
