<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\CategoriaItinerario as categoriaItinerario;
use Session;
use Redirect;
use Illuminate\Support\Facades\Validator;
use Input;

class CategoriaItinerarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items=categoriaItinerario::where('estado','!=',2)->get();
        if(!isset($items)){
            $items = new categoriaItinerario();
        }
        return view('categoriaItinerario/index', compact('items'));
    }


    public function create()
    {
        $item= new categoriaItinerario();
        return view('categoriaItinerario.create', ['item' => $item ]);
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
            $item = new categoriaItinerario();
            $item->descripcion=$request->descripcion;
            $item->fecha_fija=$request->fecha_fija;
            $item->estado=1;
            $item->save();
            Session::flash('message', 'Solicitud procesada exitosamente');
            return Redirect::to('categoriaItinerario');
        }
    }

    public function show($id)
    {
        $item=categoriaItinerario::find($id);
        return view('categoriaItinerario/show', compact('item'));
    }

    public function edit($id)
    {
        $item=categoriaItinerario::find($id);
        return view('categoriaItinerario/edit', compact('item'));
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
            return Redirect::to('categoriaItinerario/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $item= categoriaItinerario::find($id);
            $item->descripcion=$request->descripcion;
            $item->fecha_fija=$request->fecha_fija;
            $item->save();
            // redirecciona
            Session::flash('message', 'Actualizado correctamente');
            return Redirect::to('categoriaItinerario');
        }
    }

    public function destroy($id)
    {
        $item = categoriaItinerario::find($id);
        $item->delete();

        Session::flash('message', 'Eliminado satisfactoriamente');
        return Redirect::to('categoriaItinerario');
    }
}
