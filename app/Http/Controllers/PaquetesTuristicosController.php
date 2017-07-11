<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PaqueteTuristico as paqueteturistico;
use App\categoria as categorias;
use App\Itinerario as itinerarios;
use App\CategoriaItinerario as categoriaItinerario;
use App\Mapas as mapa;
use App\CalendarioItinerario as calendarioItinerario;
use App\ItinerarioPaqueteTuristico as itinerarioPaquete;
use Illuminate\Support\Facades\Validator;
use Exception;

class PaquetesTuristicosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $paquete_turistico = paqueteturistico::where('estado','!=',2)->get();
        if(!isset($paquete_turistico)){
            $paquete_turistico = new categorias();
        }
        return view('paquetesTuristicos/index', compact('paquete_turistico'));
    }

    public function create()
    {
        $itinerarios = itinerarios::all();

        $usuarios =\App\User::all();
        $categoriasItinerarios=categoriaItinerario::all();
        return view('paquetesTuristicos/create' ,compact('categoriasItinerarios','itinerarios','usuarios'));
    }

    public function store(Request $request)
    {
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
        $paquete->id_user = $request->id_user;
        $paquete->titulo = $request->titulo;
        $paquete->subtitulo = $request->subtitulo;
        $paquete->descripcion = $request->descripcion;
        //$paquete->fecha_creacion = date('Y-m-d h:m:s');
        //$paquete->id_categoria = $request->id_categoria;
        $paquete->estado = 1;
        $paquete->save();

        return redirect()->action('PaquetesTuristicosController@index');

    }

    public function show($id)
    {
        $item=paqueteturistico::find($id);
        $categorias=categorias::where('estado','!=',2)->get();
        $cats=categorias::find($item->id_categoria);
        $itinerario=itinerarios::where('id_paquete_tur',$item->id_paquete_tur)->get();
        if(!isset($itinerario)){
            $itinerario= new itinerarios();
        }
        return view('paquetesTuristicos/show', compact('item','categorias','cats','itinerario'));
    }

    public function edit($id)
    {
        $item=paqueteturistico::find($id);
        return view('paquetesTuristicos/edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $paquete=paqueteturistico::find($id);
        $paquete->titulo = $request->titulo;
        $paquete->descripcion = $request->descripcion;
        $paquete->id_categoria = $request->id_categoria;
        $paquete->save();
        return redirect()->action('PaquetesTuristicosController@index');
    }

    public function destroy($id)
    {
        $paquete=paqueteturistico::find($id);
        $paquete->estado =2;
        $paquete->save();
        return redirect()->action('PaquetesTuristicosController@index');
    }

    public function estado(Request $request)
    {
        $paquete=paqueteturistico::find($request->idpt);
        if($paquete->estado==1){$paquete->estado=0;}elseif($paquete->estado==0){$paquete->estado=1;};
        $paquete->save();
        return redirect()->action('PaquetesTuristicosController@index');
    }

    public function itinerarios($id)
    {
        $itinerario=itinerarioPaquete::where('id_paquete_tur',$id)->get();
        $item=paqueteturistico::find($id)->first();
        return view('paquetesTuristicos/itinerarioLista', compact('item','itinerario'));
    }

    public function crearItinerario($id)
    {

        $categoriasItinerarios = categoriaItinerario::where('estado','!=',2)->get();
        $item=paqueteturistico::find($id)->first();
        $itinerarios = itinerarios::all();
        $calendarioItinerarios = calendarioItinerario::all();

        return view('paquetesTuristicos/itinerarioCreate', compact('item','categoriasItinerarios','itinerarios','calendarioItinerarios'));
    }

    public function nuevoItinerario(Request $request)
    {

        try{
        $errormsg='';
        $itinerariopaquete=new itinerarioPaquete();
        $itinerariopaquete->id_paquete_tur=$request->id_paquete_tur;
        $itinerariopaquete->id_itinerario=$request->id_itinerario;
        $itinerariopaquete->id_calendario_itinerario=$request->id_calendario_itinerario;
        $itinerariopaquete->save();
        }catch(Exception $exception)
        {
            $errormsg = 'Database error! ' . $exception->getCode();
        }
        return redirect()->action('PaquetesTuristicosController@itinerarios',['id' => $request->id_paquete_tur,'errormsg'=>$errormsg]);
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

        return redirect()->action('PaquetesTuristicosController@itinerarios',['id' => $request->idpaquetetur]);
    }

    public function destroyItinerario(Request $request)
    {
        $itinerario = itinerarioPaquete::where('id_itinerario',$request->id_itinerario)->where('id_paquete_tur',$request->idpaquetetur)->first();
        $itinerario->delete();
        $itinerario = itinerarioPaquete::where('id_paquete_tur','=',$request->idpaquetetur)->get();
        $item=paqueteturistico::find($request->idpaquetetur)->first();
        return view('paquetesTuristicos/itinerarioLista', compact('item','itinerario'));
    }

    public function dropzoneStore(Request $request)
    {
        $image = $request->file('file');
        $imageName = time().$image->getClientOriginalName();
        $image->move(public_path('uploads'),$imageName);
        return response()->json(['success'=>$imageName]);
    }

    public function getItinerario(Request $request)
    {
        $itinerarios=itinerarios::where('id_categoria_itinerario',(int)$request->elegido)->
        where('estado','!=',2)->get();
        return $itinerarios;
    }

    public function getFechas(Request $request)
    {
        $calendarios=calendarioItinerario::where('id_itinerario',(int)$request->elegido)->
        where('estado','!=',2)->get();

        $itinerario=itinerarios::where('id_itinerario',(int)$request->elegido)->
        where('estado','!=',2)->first();
        $categoriasItinerarios = categoriaItinerario::where('id_categoria_itinerario',$itinerario->id_categoria_itinerario)->first();
        return $calendarios;
    }
}