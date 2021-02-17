<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Profesores;
use Illuminate\Http\Request;

class ProfesoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Devuelve el nombre de un profesor según el NIU
    public function profesor($niu){
        $profesor = DB::table('Profesores as p')
        ->where('p.niu', '=', $niu)
        ->select('p.nombre as Nom', 'p.apellido as Cognoms')
        ->get();

        return $profesor;
    }

    //Devuelve los cargos en función del NIU
    public static function cargos($niu) 
    {
        $cargos = DB::table('profesores as p')
        ->join('Cargos_has_Profesores as chp', 'chp.Profesores_niu', '=', 'p.niu')
        ->join('Cargos as c', 'c.idCargos', '=', 'chp.Cargos_idCargos')
        
        ->where('p.niu', '=', $niu)

        ->select('c.descripcion as NomCarrec')
        ->get();

        return $cargos;
    }

    //Devuelve los departamentos en función del NIU
    public function departamentos($niu){
        $departamentos = DB::table('profesores as p')
        ->join('Departamentos_has_Profesores as dhp', 'p.niu', '=', 'dhp.Profesores_niu')
        ->join('Departamentos as d', 'd.idDepartamentos', '=', 'dhp.Departamentos_idDepartamentos')
        ->where('p.niu', '=', $niu)
        ->select('d.idDepartamentos', 'd.nombre', 'd.acronimo')
        ->get();
        return $departamentos;
    }

    //Devuelve las asignaturas, ocupación y grupos por curso de un NIU
    public static function asignaturas($niu){
        $info = DB::table('profesores as p')
        ->join('profesores_has_asignaturas as pha', 'pha.profesores_niu', '=', 'p.niu')
        ->join('asignaturas as a', 'a.idAsignaturas', '=', 'pha.asignaturas_idAsignaturas')
        ->join('grupo_has_asignaturas as gha', 'gha.Asignaturas_idAsignaturas', '=', 'a.idAsignaturas')
        //->join('profesores_has_grupo as phg', 'phg.Profesores_niu', '=', 'p.niu')

        ->join('profesores_has_grupo as phg', function($join){
            $join->on([
                ['phg.Profesores_niu', '=', 'p.niu'],
                ['phg.Grupo_idGrupo', '=', 'gha.Grupo_idGrupo']
            ]);
        })

        ->join('anio as an', 'an.inicio', '=', 'pha.anio_inicio')
        ->where('p.niu', '=', $niu)
        //->select('p.nombre as Nom', 'p.apellido as Cognoms','an.inicio as Curs', 'a.nombre as Assignatura', 'gha.Grupo_idGrupo as Grup', 'gha.ocupacion as Ocupació')
        ->select('an.inicio as Curs', 'a.nombre as Assignatura', 'gha.Grupo_idGrupo as Grup', 'gha.ocupacion as Ocupació')
        ->get();

        
        return $info;
    }

    //Devuelve los permisos de un objeto en función del NIU que pregunte.
    public function niuObjeto($niu, $objeto){
        $infoAsignaturas = ProfesoresController::asignaturas($niu);
        $infoObjeto = ObjetoController::permisosObjeto($objeto);
        $infoCargos = DB::table('profesores as p')
        ->join('Cargos_has_Profesores as chp', 'chp.Profesores_niu', '=', 'p.niu')
        ->join('Cargos as c', 'c.idCargos', '=', 'chp.Cargos_idCargos')
        ->join('Ambitos as a', 'a.idAmbitos', '=', 'c.Ambitos_idAmbitos')
        
        ->where('p.niu', '=', $niu)

        ->select('c.descripcion as NomCarrec', 'a.Nombre as Ambit')
        ->get();

        $asignatura = false;

        $resultado = array();

        if($infoAsignaturas != "[]"){
            $asignatura = true;
        }

        $arrayJson = json_decode($infoCargos, true);
        $listaCargos = array();
        
        if($infoCargos != "[]"){
            foreach($arrayJson as $elemento => $contenido){
                array_push($listaCargos, $contenido['Ambit']);
            }
        }
        

        $arrayJson = json_decode($infoObjeto, true);

        foreach($arrayJson as $elemento => $contenido){
            if($asignatura && $contenido['Permiso'] == "Profesores"){
                array_push($resultado, $contenido);
            }
            
            if($contenido['Permiso'] == "Estudiante"){
                array_push($resultado, $contenido);
            }

            foreach($listaCargos as $elementoCargo){
                if($contenido['Permiso'] == $elementoCargo){
                    array_push($resultado, $contenido);
                }
            }
        }

        $resultado = json_encode($resultado);
        return $resultado;
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profesores  $profesores
     * @return \Illuminate\Http\Response
     */
    public function show(Profesores $profesores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profesores  $profesores
     * @return \Illuminate\Http\Response
     */
    public function edit(Profesores $profesores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profesores  $profesores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profesores $profesores)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profesores  $profesores
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profesores $profesores)
    {
        //
    }
}
