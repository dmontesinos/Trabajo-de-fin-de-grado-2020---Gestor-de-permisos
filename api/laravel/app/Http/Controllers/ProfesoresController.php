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

    //Devuelve los datos de un profesor concreto según el NIU
    public function profesor($niu){
        $profesor = DB::table('Profesores as p')
        ->where('p.niu', '=', $niu)
        ->select('p.nombre as Nom', 'p.apellido as Cognoms')
        ->get();

        return $profesor;



        //return Profesores::find($niu)->where('profesor.niu', '=', $niu);
    }

    //Devuelve los cargos en función del NIU
    public function cargos($niu) 
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
