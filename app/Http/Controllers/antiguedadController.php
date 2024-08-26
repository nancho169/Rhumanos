<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\personas;
class antiguedadController extends Controller
{
    public function index(){
        return view('antiguedad.index');
    }

    public function opciones(Request $request){
        $dni = $request->input('dni');
        /*$persona = DB::select("select p.id,codigo,apellido_nombre,o.descripcion
                                    from personas as p, organigramas as o 
                                    where p.organigrama_id=o.id and codigo='".$dni."'");*/
        $persona = Personas::where('codigo', $dni)->first();
        if($persona){                            
        $menu_persona = '
        <div class="card" style="">
            <div class="row">
                <h1 style="text-align:center;">Carga antiguedad <small>'.$persona->codigo.'</small></h1>

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
                    <div class="alert alert-primary">
                    <h2>Cap. IX Remuneraciones - Art. 24 inciso 2</h2><br>
                    2. ANTIGÜEDAD: Para cada año de servicios o fracción mayor de seis (6) meses que registren al 31 de
                    diciembre del año inmediato anterior, de acuerdo a la legislación vigente por la que se rigen los empleados
                    públicos de la Administración Central del Poder Ejecutivo. Para la determinación de la antigüedad, se tomarán
                    en consideración trabajos en organismos nacionales, provinciales o municipales. Pero no se computarán
                    aquellos años que devenguen beneficios de cualesquiera de los sistemas de seguridad social.
                    </div>
                    
                    
                </div>
          
                <div class="col">
                    <h2>Ente</h2>
                    <select class="form-control">
                        <option value="nacional">Seleccione</option>
                        <option value="estatal">Estatal</option>
                        <option value="privado">Privado</option>
                    </select>
                </div>
                <div class="col">
                    <h2>Lugar</h2>
                    <input type="text" class="form-control" placeholder="lugar" required>
                </div>
                <div class="row">
                    <div class="col">
                        <h2>Año</h2>
                        <input type="number" id="anio" class="form-control" >
                    </div>
                    <div class="col">
                        <h2>Mes</h2>
                        <input type="number" id="mes" class="form-control"  required>
                    </div>
                    <div class="col">
                        <h2>Día</h2>
                        <input type="number" id="dia" class="form-control" required>
                    </div>
                </div>
                <br>
            </div>
            <br>
        </div>
            
        ';
        return response()->json([
            'success' => true,
            'data' => $menu_persona
        ]);
        }
        else
        return response()->json([
            'success' => false,
            'message' => 'Persona no encontrada'
        ]);
      
    }

}
