<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GuiaItinerario as guia;
use Session;
use Redirect;
use Illuminate\Support\Facades\Validator;
use Input;
class GuiaItinerarioController extends Controller
{
    public function index()
    {
        $items= guia::all();
        return view('guia.index', compact('items'));
    }

    public function create()
    {
        $item = new guia();
        return view('guia.create', ['item' => $item ]);
    }
   public function store(Request $request)
    {
        $rules = array(
            'nombre'  => 'required',
            'descripcion'  => 'required'
        );
        // proceso de validacion
        $messages = [
            'required' => ':attribute es requerido.',
        ];

        $validator = Validator::make(Input::all(), $rules, $messages);
        if ($validator->fails()) {
            return Redirect::to('guia/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $item = new guia();
            $item->nombre=$request->nombre;
            $item->descripcion=$request->descripcion;
            $item->estado=$request->estado;
            $item->save();
            // redirecciona
            Session::flash('message', 'Solicitud procesada exitosamente');
            return Redirect::to('guia');
        }
    }
    public function show($id)
    {
        $item=guia::find($id);
        return view('guia/show', compact('item'));
    }
    public function edit($id)
    {
        $item=guia::find($id);
        return view('guia/edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $rules = array(
            'nombre'  => 'required',
            'descripcion'  => 'required'
        );
        // proceso de validacion
        $messages = [
            'required' => ':attribute es requerido.',
        ];

        $validator = Validator::make(Input::all(), $rules, $messages);
        if ($validator->fails()) {
            return Redirect::to('guia/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $item = guia::find($id);
            $item->nombre = $request->nombre;
            $item->descripcion = $request->descripcion;
            $item->estado = $request->estado;
            $item->save();
            // redirecciona
            Session::flash('message', 'Solicitud procesada exitosamente');
            return Redirect::to('guia');
        }
    }

    public function destroy($id)
    {
        $item=guia::find($id);
        $item->delete();
        Session::flash('message', 'Solicitud procesada exitosamente');
        return Redirect::to('guia');
    }
}