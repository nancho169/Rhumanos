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

    public function dni(Request $request){

        $jus = DB::select("select * from justificaciones");
        $select = "<select id='justificaciones' class='form-control' onchange='habilita_campos()'>
                <option value='666'>Seleccione</option>
        ";
        for($i = 0; $i < count($jus); $i++) {
             $select.= "<option value='".$jus[$i]->id."' style='background-color: ".$jus[$i]->color.";'>".$jus[$i]->descripcion."</option>";
        }
        $select.= "</select>";

        $dni = $request->input('dni');
        $persona = Personas::where('codigo', $dni)->first();
       
        if ($persona) {
            $cod = '
                <div class="card" style="">
                    <div class="row">
                        <h1 style="text-align:center;">Carga novedad <small>'.$persona->codigo.'</small></h1>

                        <div class="col-2">
                            <div class="card-body">
                            <img src="http://localhost:8000/img/dipu.png"  style="width: 100%;"  class="img-thumbnail" alt="...">
                            </div>
                        </div>
                        <div class="col-10">
                            <div class="card-body">
                            <h5 class="card-title">'.$persona->apellido_nombre.' <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Ficha</a></h5>
                            <input type="hidden" name="persona_id" id="persona_id" value="' . $persona->id . '">
                            <br>
                            '.$select.'
                            <br>
                            <div id="justificacion"></div>
                        </div>
                </div>
                 
                        <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel"><b>'.$persona->apellido_nombre.'</b></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div style="margin: 0px auto;">
                                        <img src="http://localhost:8000/img/dipu.png"  style="width: 60%; margin: 0px auto;"  class="img-thumbnail" alt="...">
                                        </div>
                                        <hr>
                                        Código: '.$persona->codigo.'<br>
                                        Apellido y Nombre : '.$persona->apellido_nombre.'<br>
                                        Área de revista: '.$persona->descripcion.'
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-primary">Ficha completa</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                ';
            return response()->json([
                'success' => true,
                'data' => $cod
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Persona no encontrada'
            ]);
        }
    }

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
        $personas = DB::select("select p.id,codigo,apellido_nombre,o.descripcion
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
