<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Itinerario as itinerarios;
use App\PaqueteTuristico as paqueteturistico;
use App\categoria as categorias;

class ItinerarioController extends Controller
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

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $idpt=$request->id;
        $paquete_turistico = paqueteturistico::where('estado','!=',2)->
        where('id_paquete_tur',$idpt)->get();
        return view('itinerario/create', compact('idpt','paquete_turistico'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $itinerario=new itinerarios();
        $itinerario->id_paquete_tur=$request->idpt;
        $itinerario->id_categoria_itinerario=1;
        $itinerario->dia=$request->dia;
        $itinerario->descripcion=$request->descripcion;
        $itinerario->save();

        $paquete_turistico = paqueteturistico::where('estado','!=',2)->
        where('id_paquete_tur',$request->idpt)->get();
        $itinerario=itinerarios::where('id_paquete_tur',$request->idpt)->get();
        $idpt=$request->idpt;
        return view('itinerario/index', compact('itinerario','paquete_turistico','idpt'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paquete_turistico = paqueteturistico::where('estado','!=',2)->
        where('id_paquete_tur',$id)->get();
        $idpt=$id;
        $itinerario = itinerarios::where('id_paquete_tur',$id)->get();
        return view('itinerario/index', compact('itinerario','paquete_turistico','idpt'));
    }

    public function ver($id)
    {
        $itinerario = itinerarios::where('id_itinerario',$id)->first();

        $paquete_turistico = paqueteturistico::where('estado','!=',2)->
        where('id_paquete_tur',$itinerario->id_paquete_tur)->get();

        $idpt=$paquete_turistico[0]->id_paquete_tur;
        return view('itinerario/show', compact('itinerario','paquete_turistico','idpt'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $itinerario=itinerarios::where('id_itinerario',$id)->first();
        $paquete_turistico = paqueteturistico::where('estado','!=',2)->
        where('id_paquete_tur',$itinerario->id_paquete_tur)->get();
        return view('itinerario/edit', compact('itinerario','paquete_turistico'));
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
        $itinerario = itinerarios::find($id);
        //dd($itinerario);
        $itinerario->id_categoria_itinerario=1;
        $itinerario->dia=$request->dia;
        $itinerario->descripcion=$request->descripcion;
        $itinerario->save();

        $paquete_turistico = paqueteturistico::where('estado','!=',2)->
        where('id_paquete_tur',$request->idpt)->get();
        $itinerario=itinerarios::where('id_paquete_tur',$request->idpt)->get();
        $idpt=$request->idpt;
        return view('itinerario/index', compact('itinerario','paquete_turistico','idpt'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $itinerario=itinerarios::where('id_itinerario',$id)->first();
        $itinerario->delete($id);
        return back();
    }
}
