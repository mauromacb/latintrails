<?php

namespace App\Http\Controllers;

use App\CategoriaItinerario;
use Illuminate\Http\Request;
use App\PaqueteTuristico;
use App\Categoria;
use App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paq=PaqueteTuristico::get();
        $cat=Categoria::get();
        $catit=App\CategoriaItinerario::get();
        $paquete=App\ComoNosEncontro::get();

        /*$paquete = new App\ComoNosEncontro();
        //$paquete->id_paquete_tur=1;
        $paquete->titulo='Titulo 1';
        $paquete->save();
        dd($paquete);
        */

        //actividades

        /*$actividades=new App\Actividades();
        $actividades->titulo="Titulo Actividad";
        $actividades->descripcion="Descripcion de la actividad";
        $actividades->save();
        dd($actividades);

        $catitinerarios=new App\CategoriaItinerario();
        $catitinerarios->titulo="Totilo itinerarios";
        $catitinerarios->save();
        dd($catitinerarios);

        $mapas=new App\Mapas();
        $mapas->titulo="Totilo itinerarios";
        $mapas->save();
        dd($mapas);

        $imagenes=new App\Imagenes();
        $imagenes->imagen="images/imagen1.jpg";
        $imagenes->save();
        dd($imagenes);
        */



        return view('adminlte::home');
    }
}
