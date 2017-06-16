<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mapas as mapas;
use App\PaqueteTuristico as paqueteturistico;
use Session;
use Redirect;
use Illuminate\Support\Facades\Validator;
use Input;
use App\Thumbnail;

class MapasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=mapas::all();
        return view('mapas/index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new mapas();
        $paqueteturistico = paqueteturistico::get();
        return view('mapas.create', compact('item','paqueteturistico'));
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
            'nombre_mapa'  => 'required',
            'descripcion'  => 'required',
            'id_paquete_tur'  => 'required'
        );
        // proceso de validacion
        $messages = [
            'required' => ':attribute es requerido.',
        ];

        $validator = Validator::make(Input::all(), $rules, $messages);
        if ($validator->fails()) {
            return Redirect::to('mapas/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {


            $file = Input::file('file');
            //Creamos una instancia de la libreria instalada
            $image = \Image::make(\Input::file('file'));
            //Ruta donde queremos guardar las imagenes
            $path = public_path().'/thumbnails/';

            // Guardar Original
            $image->save($path.$file->getClientOriginalName());
            // Cambiar de tamaño
            $image->resize(240,200);
            // Guardar
            $image->save($path.'thumb_'.$file->getClientOriginalName());

            //Guardamos nombre y nombreOriginal en la BD

            $item = new mapas();
            $item->id_paquete_tur=$request->id_paquete_tur;
            $item->descripcion=$request->descripcion;
            $item->nombre_mapa=$request->nombre_mapa;
            $item->imagen=$file->getClientOriginalName();
            $item->thumbnail='thumb_'.$file->getClientOriginalName();
            $item->estado=$request->estado;
            $item->save();
            // redirecciona
            Session::flash('message', 'Solicitud procesada exitosamente');
            return Redirect::to('mapas');
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
        $item=mapas::find($id);
        return view('mapas/edit', compact('item'));
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
            'descripcion'  => 'required',
            'nombre_mapa'  => 'required'
        );
        // proceso de validacion
        $messages = [
            'required' => ':attribute es requerido.',
        ];

        $validator = Validator::make(Input::all(), $rules, $messages);
        if ($validator->fails()) {
            return Redirect::to('mapas/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $item = mapas::find($id);
            $item->id_categoria=$request->id_categoria;
            $item->descripcion=$request->descripcion;
            $item->nombre_mapa=$request->nombre_mapa;
            $item->save();
            // redirecciona
            Session::flash('message', 'Solicitud procesada exitosamente');
            return Redirect::to('mapas');
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
        $item=mapas::find($id);
        $item->delete();
        Session::flash('message', 'Solicitud procesada exitosamente');
        return Redirect::to('mapas');
    }
}
