<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ObjetoController extends Controller
{
    //Añade un objeto nuevo a la base de datos.
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

    //Búsqueda de objetos por ID
    function searchObjetoID($busqueda){
        if($busqueda){
            return DB::table('Objeto')->where('idObjeto', $busqueda)->get();
        } else {
            return ["resultat" => "L'objecte no s'ha trobat a la base de dades."];
        }
    }

    //Búsqueda de objetos por nombre
    function searchObjetoNombre($busqueda){
        if($busqueda){
            return DB::table('Objeto')->where('nombre', 'like', '%'.$busqueda.'%')->get();
        } else {
            return ["resultat" => "L'objecte no s'ha trobat a la base de dades."];
        }
    }

    //Busca en la DB los objetos que contengan en la descripción el String dado.
    function searchObjetoDesc($busqueda){
        if($busqueda){
            return DB::table('Objeto')->where('descripcion', 'like', '%'.$busqueda.'%')->get();
        } else {
            return ["resultat" => "L'objecte no s'ha trobat a la base de dades."];
        }
    }    


    function eliminarObjeto($id){
        if($id){
            DB::table('Permisos')->where('Objeto_idObjeto', $id)->delete();
            DB::table('Objeto')->where('idObjeto', $id)->delete();
            return["resultat"=>"Objecte amb id $id eliminar correctament."];
        } else {
            return["resultat"=>"L'objecte no s'ha pogut eliminar."];
        }
        
    }
}
