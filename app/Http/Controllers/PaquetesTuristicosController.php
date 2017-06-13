<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PaqueteTuristico as paqueteturistico;
use App\categoria as categorias;
use App\Itinerario as itinerarios;
use Illuminate\Support\Facades\Validator;

class PaquetesTuristicosController extends Controller
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

        /*$paquete = new PaqueteTuristico();
       //$paquete->id_paquete_tur=1;
       $paquete->id=4;
       $paquete->id_categoria=1;
       $paquete->titulo='Titulo';
       $paquete->descripcion='Descripcion' ;
       $paquete->fecha_creacion=date("Y-m-d h:m:s");
       $paquete->precio="22";
       $paquete->save();
       dd($paquete);
       dd($paq);
        */
        $paquete_turistico = paqueteturistico::get();
       return view('paquetesTuristicos/index', compact('paquete_turistico'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $itinerario = new itinerarios();
        $categorias=categorias::get();
        return view('paquetesTuristicos/create' ,compact('categorias', 'itinerario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$paquete = new paqueteturistico();
        //$paquete->create($request->all());
        //paqueteturistico::created($request->all());
        //dd($request->all());
        $validator = Validator::make(
            array(
                'titulo' => $request->titulo,
                'descripcion' => $request->descripcion,
                'id_categoria' => $request->categoria_id
            ),
            array(
                'titulo' => 'required',
                'descripcion' => 'required',
                'id_categoria' => 'required'
            )
        );
        $paquete = new paqueteturistico();
        $paquete->titulo = $request->titulo;
        $paquete->descripcion = $request->descripcion;
        $paquete->precio = $request->precio;
        $paquete->fecha_creacion = date('Y-m-d h:m:s');
        $paquete->id_categoria = $request->id_categoria;
        $paquete->save();

        return redirect()->action('PaquetesTuristicosController@index');

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
        $item=paqueteturistico::find($id);
        $categorias=categorias::get();
        $cats=categorias::find($item->id_categoria);
        $itinerario=itinerarios::where('id_paquete_tur',$item->id_paquete_tur)->get();
        //dd($itinerario);
        return view('paquetesTuristicos/edit', compact('item','categorias','cats','itinerario'));
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
        $paquete=paqueteturistico::find($id);
        $paquete->titulo = $request->titulo;
        $paquete->descripcion = $request->descripcion;
        $paquete->precio = $request->precio;
        $paquete->id_categoria = $request->id_categoria;
        $paquete->save();
        return redirect()->action('PaquetesTuristicosController@index');
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

    public function nuevoItinerario(Request $request)
    {
        $itinerario=new itinerarios();
        $itinerario->id_paquete_tur=$request->idpaquetetur;
        $itinerario->id_categoria_itinerario=1;
        $itinerario->dia=$request->dia;
        $itinerario->descripcion=$request->descripcion;
        $itinerario->save();

        $item=paqueteturistico::find($request->idpaquetetur);
        $categorias=categorias::get();
        //$cats=categorias::find($item->id_categoria);

        //return view('paquetesTuristicos/edit', compact('item','categorias','cats','itinerario'));
        $itinerario=itinerarios::where('id_paquete_tur',$request->idpaquetetur)->get();
        return view('paquetesTuristicos/itinerarioLista', compact('item','itinerario'));
        //return "Itinerario agregado correctamente";
    }
    public function editarItinerario(Request $request)
    {
        $itinerarios=itinerarios::where('id_itinerario',$request->idit)->first();
        return $itinerarios;
    }
    public function guardarItinerario(Request $request)
    {
        $itinerario=itinerarios::find($request->idit);
        $itinerario->dia=$request->dia;
        $itinerario->descripcion=$request->descripcion;
        $itinerario->save();

        $itinerario = itinerarios::where('id_paquete_tur','=',$request->idpaquetetur)->get();
        $item=paqueteturistico::find($request->idpaquetetur)->first();
        return view('paquetesTuristicos/itinerarioLista', compact('item','itinerario'));
    }

    public function destroyItinerario(Request $request)
    {
        $itinerario = itinerarios::find($request->idit)->first();
        $itinerario->delete($request->idit);
        $itinerario = itinerarios::where('id_paquete_tur','=',$request->idpt)->get();
        $item=paqueteturistico::find($request->idpt)->first();
        return view('paquetesTuristicos/itinerarioLista', compact('item','itinerario'));
    }

    public function dropzoneStore(Request $request)
    {
        $image = $request->file('file');
        $imageName = time().$image->getClientOriginalName();
        $image->move(public_path('uploads'),$imageName);
        return response()->json(['success'=>$imageName]);
    }

}
