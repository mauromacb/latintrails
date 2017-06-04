<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria as categorias;
use Session;
use Redirect;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categorias=categorias::all();

        return view('categorias/index', compact('categorias'));
        //return "index";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria = new categorias();
        return view('categorias.create', ['categoria' => $categoria ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->titulo_categoria);
        $categoria = new categorias();
        $categoria->titulo_categoria=$request->titulo_categoria;
        $categoria->save();

        Session::flash('message', 'Categoria Creada Satistactoriamente!');
        return Redirect::to('categorias');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria=categorias::where('id_categoria','=',$id)->first();
        //dd($categoria);
        return view('categorias/show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria=categorias::where('id_categoria','=',$id)->first();
        return view('categorias/edit', compact('categoria'));
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
        //
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
        $categoria->delete($id);
        //dd($categoria);

        return Redirect::to('categorias');
    }
}
