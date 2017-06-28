<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Itinerario as itinerarios;
use App\TipoItinerario as tipoItinerario;
use App\DiaItinerario as dia;

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
        $itinerarios = itinerarios::get();
        if(!isset($itinerarios)){
            $itinerarios = new itinerarios();
        }
        $tipoItinerario=tipoItinerario::all();
        if(!isset($itinerarios)){
            $tipoItinerario= new tipoItinerario();
        }
        return view('itinerario/index', compact('itinerarios','tipoItinerario'));
    }

    public function create()
    {
        $itinerarios = new itinerarios;
        $items=tipoItinerario::all();
        if(!isset($items)){
            $items = new tipoItinerario();
        }
        return view('itinerario/create', compact('itinerarios','items'));
    }

    public function store(Request $request)
    {
        $itinerario=new itinerarios();
        $itinerario->id_tipo_itinerario=$request->id_tipo_itinerario;
        $itinerario->titulo=$request->titulo;
        $itinerario->subtitulo=$request->subtitulo;
        $itinerario->descripcion=$request->descripcion;
        $itinerario->save();
        return redirect()->action('ItinerarioController@index');
    }

    public function show($id)
    {
        $dias=dia::where('id_itinerario',$id)->get();
        if(!isset($dias)){
            $dias = new dia();
        }
        $itinerario = itinerarios::where('id_itinerario',$id)->first();
        return view('itinerario/show', compact('itinerario','dias'));
    }

    public function ver($id)
    {
        $itinerario = itinerarios::where('id_itinerario',$id)->first();

        $paquete_turistico = paqueteturistico::where('estado','!=',2)->
        where('id_paquete_tur',$itinerario->id_paquete_tur)->get();

        $idpt=$paquete_turistico[0]->id_paquete_tur;
        return view('itinerario/show', compact('itinerario','paquete_turistico','idpt'));
    }

    public function edit($id)
    {
        $itinerario=itinerarios::where('id_itinerario',$id)->first();
        $items=tipoItinerario::all();
        if(!isset($items)){
            $items = new tipoItinerario();
        }
        return view('itinerario/edit', compact('itinerario','items'));
    }

    public function update(Request $request, $id)
    {
        $itinerario = itinerarios::find($id);
        $itinerario->id_tipo_itinerario=$request->id_tipo_itinerario;
        $itinerario->titulo=$request->titulo;
        $itinerario->subtitulo=$request->subtitulo;
        $itinerario->descripcion=$request->descripcion;
        $itinerario->save();
        return redirect()->action('ItinerarioController@index');
    }

    public function destroy($id)
    {
        $itinerario=itinerarios::where('id_itinerario',$id)->first();
        $itinerario->delete($id);
        return back();
    }
}