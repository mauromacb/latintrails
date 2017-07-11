<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CalendarioItinerario as calendario;
use App\Itinerario as itinerario;
use Session;
use Redirect;
use Illuminate\Support\Facades\Validator;
use Input;
use App\Thumbnail;

class CalendarioItinerarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $items=calendario::where('id_itinerario',$id)->get();
        $itinerario = itinerario::where('id_itinerario',$id)->first();
        return view('calendarios/index', compact('items','itinerario'));
    }

    public function create($id)
    {
        $item = new calendario();
        $itinerario = itinerario::where('id_itinerario',$id)->first();
        return view('calendarios.create', compact('item','itinerario'));
    }

    public function store(Request $request)
    {
        $rules = array(
            'fecha_inicio'  => 'required',
            'fecha_fin'  => 'required',
        );
        // proceso de validacion
        $messages = [
            'required' => ':attribute es requerido.',
        ];

        $validator = Validator::make(Input::all(), $rules, $messages);
        if ($validator->fails()) {
            return Redirect::to('calendarios/'.$request->id_itinerario.'/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {

            $item = new calendario();
            $item->id_itinerario=$request->id_itinerario;
            $item->fecha_inicio=$request->fecha_inicio;
            $item->fecha_fin=$request->fecha_fin;
            $item->estado=1;
            $item->save();

            // redirecciona
            Session::flash('message', 'Solicitud procesada exitosamente');
            return Redirect::to('calendarios/'.$request->id_itinerario);
        }
    }
    public function edit($id)
    {
        $item=calendario::where('id_calendario_itinerario',$id)->first();
        $itinerario = itinerario::where('id_itinerario',$item->id_itinerario)->first();
        return view('calendarios/edit', compact('item','itinerario'));
    }

    public function update(Request $request, $id)
    {
        $rules = array(
            'fecha_inicio'  => 'required',
            'fecha_fin'  => 'required',
        );
        // proceso de validacion
        $messages = [
            'required' => ':attribute es requerido.',
        ];

        $validator = Validator::make(Input::all(), $rules, $messages);
        if ($validator->fails()) {
            return Redirect::to('calendarios/'.$request->id_itinerario.'/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {

            $item = calendario::where('id_calendario_itinerario',$id)->first();
            $item->id_itinerario=$request->id_itinerario;
            $item->fecha_inicio=$request->fecha_inicio;
            $item->fecha_fin=$request->fecha_fin;
            $item->estado=1;
            $item->save();
            // redirecciona
            Session::flash('message', 'Solicitud procesada exitosamente');
            return Redirect::to('calendarios/'.$request->id_itinerario);

        }
    }
    public function destroy(Request $request,$id)
    {
        $item = calendario::where('id_calendario_itinerario',$id)->first();
        $item->delete();
        // redirecciona
        Session::flash('message', 'Solicitud procesada exitosamente');
        return Redirect::to('calendarios/'.$request->id_itinerario);
    }
}
