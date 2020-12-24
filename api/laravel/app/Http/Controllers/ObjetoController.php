<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Objeto;
use Illuminate\Support\Facades\DB;


class ObjetoController extends Controller
{
    function addObjeto(Request $req){
        if($req->input('nom') && $req->input('descripcio')){
            $id = DB::table('Objeto')->insertGetId( //Mediante inserGetId sacamos el id auto-incremental después de añadirlo.
                ['nombre' => $req->input('nom'),
                'descripcion' => $req->input('descripcio')]
            );

            if($id){
                return ["resultat" => "Objecte afegit a la base de dades correctament.", "id"=>$id];
            } else {
                return ["resultat" => "L'objecte no s'ha pogut afegir a la base de dades."];
            }

        } else {
            return ["resultat" => "L'objecte no s'ha pogut afegir a la base de dades."];
        }
    }
}
