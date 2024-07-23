<?php

namespace App\Http\Controllers;

use App\Models\organigrama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class OrganigramaController extends Controller
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
        $areas = DB::select("SELECT o.id, o.descripcion, o.id_superior,o.version, ga.descripcion as area_inferior from organigramas as o,
                                (select id, descripcion, id_superior a,version from organigramas) as ga
                                    where o.id_superior=ga.id or o.id_superior=0; ");
        //$areas = Organigrama::orderBy('id','desc')->get();
        return view('organigramas.listado', compact('areas'));
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
    public function show(organigrama $organigrama)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(organigrama $organigrama)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, organigrama $organigrama)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(organigrama $organigrama)
    {
        //
    }
}
