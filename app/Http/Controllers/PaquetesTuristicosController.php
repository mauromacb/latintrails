<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PaqueteTuristico as paqueteturistico;
use App\categoria as categorias;
use App\Itinerario as itinerarios;

class PaquetesTuristicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        /*$paquete = new PaqueteTuristico();
       //$paquete->id_paquete_tur=1;
       $paquete->id=4;
       $paquete->id_categoria=1;
       $paquete->titulo='Titulo';
       $paquete->descripcion='Descripcion' ;
       $paquete->fecha_creacion=date("Y-m-d h:m:s");
       $paquete->precio="22";
       $paquete->save();
       dd($paquete);
       dd($paq);
        */
        $paquete_turistico = paqueteturistico::get();
       return view('paquetesTuristicos/index', compact('paquete_turistico'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item=paqueteturistico::find($id);
        $categorias=categorias::get();
        $cats=categorias::find($item->id_categoria);
        $itinerario=itinerarios::find($item->id_paquete_tur)->get();
        //dd($itinerario);
        return view('paquetesTuristicos/edit', compact('item','categorias','cats','itinerario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        return view('paquetesTuristicos/update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function nuevoItinerario(Request $request)
    {
        $itinerario=new itinerarios();
        $itinerario->id_paquete_tur=$request->idpaquetetur;
        $itinerario->id_categoria_itinerario=1;
        $itinerario->dia=$request->dia;
        $itinerario->descripcion=$request->descripcion;
        $itinerario->save();

        $item=paqueteturistico::find($request->idpaquetetur);
        //dd($item);
        $categorias=categorias::get();
        $cats=categorias::find($item->id_categoria);
        $itinerario=itinerarios::find($item->id_paquete_tur)->get();

        return view('paquetesTuristicos/edit', compact('item','categorias','cats','itinerario'));
        //return "Itinerario agregado correctamente";
    }

    public function mostrarItinerario(Request $request)
    {

        $itinerario=itinerarios::where('id_paquete_tur',$request->idpaquetetur)->get();
dd($itinerario);
        return $itinerario;
    }

}
