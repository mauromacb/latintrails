<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ComoNosEncontro as comonosencontro;
use Session;
use Redirect;
use Illuminate\Support\Facades\Validator;
use Input;

class ComoNosEncontroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=comonosencontro::all();
        return view('comoNosEncontro.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new comonosencontro();
        return view('comonosencontro.create', ['item' => $item]);
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
            'nombre'  => 'required'
        );
        // proceso de validacion
        $messages = [
            'required' => ':attribute es requerido.',
        ];

        $validator = Validator::make(Input::all(), $rules, $messages);
        if ($validator->fails()) {
            return Redirect::to('comonosencontro/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $item = new comonosencontro();
            $item->titulo=$request->nombre;
            $item->save();
            // redirecciona
            Session::flash('message', 'Creado Satistactoriamente!');
            return Redirect::to('comonosencontro');
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
        $item=comonosencontro::find($id);
        return view('comoNosEncontro.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item=comonosencontro::find($id);
        return view('comoNosEncontro.edit', compact('item'));
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
            'nombre'  => 'required'
        );
        // proceso de validacion
        $messages = [
            'required' => ':attribute es requerido.',
        ];

        $validator = Validator::make(Input::all(), $rules, $messages);
        if ($validator->fails()) {
            return Redirect::to('comonosencontro/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $item = comonosencontro::find($id);
            $item->titulo = Input::get('nombre');
            $item->save();
            // redirecciona
            Session::flash('message', 'Actualizado correctamente');
            return Redirect::to('comonosencontro');
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
        $item = comonosencontro::find($id);
        $item->delete($id);

        Session::flash('message', 'Eliminado satisfactoriamente');
        return Redirect::to('comonosencontro');
    }
}