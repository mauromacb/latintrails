<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\TipoItinerario as tipoItinerario;
use Session;
use Redirect;
use Illuminate\Support\Facades\Validator;
use Input;

class TipoItinerarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items=tipoItinerario::all();
        if(!isset($items)){
            $items = new tipoItinerario();
        }
        return view('tipoItinerario/index', compact('items'));
    }


    public function create()
    {
        $item= new tipoItinerario();
        return view('tipoItinerario.create', ['item' => $item ]);
    }

    public function store(Request $request)
    {
        $rules = array(
            'descripcion'  => 'required'
        );
        // proceso de validacion
        $messages = [
            'required' => ':attribute es requerido.',
        ];
        $validator = Validator::make(Input::all(), $rules, $messages);
        if ($validator->fails()) {
            return Redirect::to('tipoCategoria/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $item = new tipoItinerario();
            $item->descripcion=$request->descripcion;
            $item->fecha_fija=$request->fecha_fija;
            $item->save();
            Session::flash('message', 'Solicitud procesada exitosamente');
            return Redirect::to('tipoItinerario');
        }
    }

    public function show($id)
    {
        $item=tipoItinerario::find($id);
        return view('tipoItinerario/show', compact('item'));
    }

    public function edit($id)
    {
        $item=tipoItinerario::find($id);
        return view('tipoItinerario/edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $rules = array(
            'descripcion'  => 'required'
        );
        // proceso de validacion
        $messages = [
            'required' => ':attribute es requerido.',
        ];

        $validator = Validator::make(Input::all(), $rules, $messages);
        if ($validator->fails()) {
            return Redirect::to('tipoItinerario/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $item= tipoItinerario::find($id);
            $item->descripcion=$request->descripcion;
            $item->fecha_fija=$request->fecha_fija;
            $item->save();
            // redirecciona
            Session::flash('message', 'Actualizado correctamente');
            return Redirect::to('tipoItinerario');
        }
    }

    public function destroy($id)
    {
        $item = tipoItinerario::find($id);
        $item->delete();

        Session::flash('message', 'Eliminado satisfactoriamente');
        return Redirect::to('tipoItinerario');
    }
}
