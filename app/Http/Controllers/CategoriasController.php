<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Categoria as categorias;
use Session;
use Redirect;
use Illuminate\Support\Facades\Validator;
use Input;

class CategoriasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items=categorias::where('estado','!=',2)->get();
        if(!isset($items)){
            $items = new categorias();
        }
        return view('categorias/index', compact('items'));
        //return "index";
    }

    public function create()
    {
        $categoria = new categorias();
        return view('categorias.create', ['item' => $categoria ]);
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
            return Redirect::to('categorias/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $categoria = new categorias();
            $categoria->titulo_categoria=$request->nombre;
            $categoria->estado=1;
            $categoria->save();
            // redirecciona
            Session::flash('message', 'Categoria Creada Satistactoriamente!');
            return Redirect::to('categorias');
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
        $item=categorias::find($id);
        return view('categorias/show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item=categorias::find($id);
        return view('categorias/edit', compact('item'));
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
            return Redirect::to('categorias/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $categoria = categorias::find($id);
            $categoria->titulo_categoria = Input::get('nombre');
            $categoria->save();
            // redirecciona
            Session::flash('message', 'Actualizado correctamente');
            return Redirect::to('categorias');
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
        $categoria = categorias::find($id);
        $categoria->estado = 2;
        $categoria->save();

        Session::flash('message', 'Eliminado satisfactoriamente');
        return Redirect::to('categorias');
    }
}