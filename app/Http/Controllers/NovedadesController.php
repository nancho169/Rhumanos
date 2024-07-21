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
        //
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
