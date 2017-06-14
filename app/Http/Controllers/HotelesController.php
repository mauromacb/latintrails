<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hoteles as hoteles;
use Session;
use Redirect;
use Illuminate\Support\Facades\Validator;
use Input;
class HotelesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=hoteles::all();
        return view('hoteles/index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new hoteles();
        return view('hoteles.create', ['item' => $item ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            return Redirect::to('hoteles/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $item = new hoteles();
            $item->nombre=$request->nombre;
            $item->descripcion=$request->descripcion;
            $item->estado=$request->estado;
            $item->save();
            // redirecciona
            Session::flash('message', 'Solicitud procesada exitosamente');
            return Redirect::to('hoteles');
        }
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
        $item=hoteles::find($id);
        return view('hoteles/edit', compact('item'));
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
            return Redirect::to('hoteles/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $item = hoteles::find($id);
            $item->nombre = $request->nombre;
            $item->descripcion = $request->descripcion;
            $item->estado = $request->estado;
            $item->save();
            // redirecciona
            Session::flash('message', 'Solicitud procesada exitosamente');
            return Redirect::to('hoteles');
        }
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
}
