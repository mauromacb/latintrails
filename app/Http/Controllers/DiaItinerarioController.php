<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\DiaItinerario as dia;
use App\TipoItinerario as tipoItinerario;
use App\Itinerario as itinerario;
use Session;
use Redirect;
use Illuminate\Support\Facades\Validator;
use Input;

class DiaItinerarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showItinerario($id)
    {
        $itinerario=itinerario::where('id_itinerario',$id)->first();
        $itinerarioLista=itinerario::all();
        $items=dia::where('id_itinerario',$id)->get();
        if(!isset($items)){
            $items = new dia();
        }
        return view('dia/index2',compact('items','itinerario','itinerarioLista'));
    }

    public function editItinerario($id)
    {

        $itinerarioLista=itinerario::all();
        $item=dia::find($id);
        return view('dia/edit2', compact('item','itinerarioLista'));
    }

    public function verDia($id)
    {
        $itinerarioLista=itinerario::all();
        $item=dia::find($id);
        return view('dia/verDia', compact('item','itinerarioLista'));
    }

    public function createItinerario($id)
    {
        $itinerario=itinerario::where('id_itinerario',$id)->first();
        $itinerarioLista=itinerario::all();
        $item= new dia();

        return view('dia/create2',compact('item','itinerario','itinerarioLista'));
    }

    public function index()
    {
        $items=dia::all();
        if(!isset($items)){
            $items = new dia();
        }
        return view('dia/index', compact('items'));
    }


    public function create()
    {
        $item= new dia();
        return view('dia.create', ['item' => $item ]);
    }

    public function store(Request $request)
    {
        $item = new dia();
        $item->id_itinerario=$request->id_itinerario;
        $item->titulo=$request->titulo;
        $item->descripcion=$request->descripcion;
        $item->save();
        Session::flash('message', 'Solicitud procesada exitosamente');
        if (isset($request->conitinerario)){return Redirect::to('showItinerario/'.$request->id_itinerario);}
        else{return Redirect::to('dia');}
    }

    public function show($id)
    {
        $item=dia::find($id);
        return view('dia/show', compact('item'));
    }

    public function edit($id)
    {
        $item=dia::find($id);
        return view('dia/edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item= dia::where('id_dia',$id)->first();
        $item->id_itinerario=$request->id_itinerario;
        $item->titulo=$request->titulo;
        $item->descripcion=$request->descripcion;
        $item->save();
        Session::flash('message', 'Solicitud procesada exitosamente');
        if (isset($request->conitinerario)){return Redirect::to('showItinerario/'.$request->id_itinerario);}
        else{return Redirect::to('dia');}
    }

    public function destroy(Request $request,$id)
    {
        $item = dia::find($id);
        $item->delete();

        Session::flash('message', 'Eliminado satisfactoriamente');
        if (isset($request->conitinerario)){return Redirect::to('showItinerario/'.$request->id_itinerario);}
        else{return Redirect::to('dia');}
    }
}
