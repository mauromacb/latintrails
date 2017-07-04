<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mapas as mapas;
use App\Itinerario as itinerario;
use Session;
use Redirect;
use Illuminate\Support\Facades\Validator;
use Input;
use App\Thumbnail;

class MapasController extends Controller
{
    public function index($id)
    {
        $items=mapas::where('id_itinerario',$id)->get();
        $itinerario = itinerario::where('id_itinerario',$id)->first();
        return view('mapas/index', compact('items','itinerario'));
    }

    public function create($id)
    {
        $item = new mapas();
        $itinerario = itinerario::where('id_itinerario',$id)->first();
        return view('mapas.create', compact('item','itinerario'));
    }

    public function store(Request $request)
    {
        $rules = array(
            'nombre_mapa'  => 'required',
            'id_itinerario'  => 'required',
        );
        // proceso de validacion
        $messages = [
            'required' => ':attribute es requerido.',
        ];

        $validator = Validator::make(Input::all(), $rules, $messages);
        if ($validator->fails()) {
            return Redirect::to('mapas/'.$request->id_itinerario.'/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {

            $file = Input::file('file');
            //Creamos una instancia de la libreria instalada
            $image = \Image::make(\Input::file('file'));
            $extension= explode(".", $file->getClientOriginalName());
            //Ruta donde queremos guardar las imagenes
            $path = public_path() . '/uploads/thumbnails/'.$request->id_itinerario.'/';
            $ipath = '/uploads/thumbnails/'.$request->id_itinerario.'/';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $nombre_mapa=str_replace(' ', '_',$request->nombre_mapa);

            $item = new mapas();
            $item->nombre_mapa=$request->nombre_mapa;
            $item->id_itinerario=$request->id_itinerario;
            $item->imagen=$nombre_mapa.'.'.$extension[1];
            $item->path=$ipath;
            $item->descripcion=$request->descripcion;
            $item->save();

            // Guardar Original
            $image->save($path.$item->id_mapa.'_'.$nombre_mapa.'.'.$extension[1]);
            // Cambiar de tamaño
            $image->resize(240,200);
            // Guardar
            $image->save($path.'thumb_'.$item->id_mapa.'_'.$nombre_mapa.'.'.$extension[1]);
            //Guardamos nombre y nombreOriginal en la BD

            // redirecciona
            Session::flash('message', 'Solicitud procesada exitosamente');
            return Redirect::to('mapas/'.$request->id_itinerario);
        }
    }

    public function show($id)
    {
        $item=mapas::where('id_mapa',$id)->first();
        $itinerario = itinerario::where('id_itinerario',$item->id_itinerario)->first();
        return view('mapas/show', compact('item','itinerario'));
    }

    public function edit($id)
    {
        $item=mapas::where('id_mapa',$id)->first();
        $itinerario = itinerario::where('id_itinerario',$item->id_itinerario)->first();
        return view('mapas/edit', compact('item','itinerario'));
    }

    public function update(Request $request, $id)
    {
        $rules = array(
            'nombre_mapa'  => 'required',
            'id_itinerario'  => 'required',
        );
        // proceso de validacion
        $messages = [
            'required' => ':attribute es requerido.',
        ];

        $validator = Validator::make(Input::all(), $rules, $messages);
        if ($validator->fails()) {
            return Redirect::to('mapas/'.$request->id_itinerario.'/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $file = Input::file('file');
            //Creamos una instancia de la libreria instalada
            try
            {
                $image = \Image::make(\Input::file('file'));
            }
            catch(NotReadableException $e)
            {
                return $e;
            }

            $extension= explode(".", $file->getClientOriginalName());
            //Ruta donde queremos guardar las imagenes
            $path = public_path() . '/uploads/thumbnails/'.$request->id_itinerario.'/';
            $ipath = '/uploads/thumbnails/'.$request->id_itinerario.'/';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $nombre_mapa=str_replace(' ', '_',$request->nombre_mapa);
            $item = mapas::where('id_mapa',$id)->first();
            $item->nombre_mapa=$request->nombre_mapa;
            $item->imagen=$nombre_mapa.'.'.$extension[1];
            $item->descripcion=$request->descripcion;
            $item->save();

            // Guardar Original
            $image->save($path.$item->id_mapa.'_'.$nombre_mapa.'.'.$extension[1]);
            // Cambiar de tamaño
            $image->resize(240,200);
            // Guardar
            $image->save($path.'thumb_'.$item->id_mapa.'_'.$nombre_mapa.'.'.$extension[1]);
            //Guardamos nombre y nombreOriginal en la BD

            // redirecciona
            Session::flash('message', 'Solicitud procesada exitosamente');
            return Redirect::to('mapas/'.$request->id_itinerario);
        }
    }

    public function destroy($id)
    {
        $item=mapas::find($id);
        $item->delete();
        Session::flash('message', 'Solicitud procesada exitosamente');
        return Redirect::to('mapas');
    }
}