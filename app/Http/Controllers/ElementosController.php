<?php

namespace App\Http\Controllers;

use App\Models\elementos;
use Illuminate\Http\Request;

class ElementosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('elementos.index');   
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
    public function show(elementos $elementos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(elementos $elementos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, elementos $elementos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(elementos $elementos)
    {
        //
    }
}
