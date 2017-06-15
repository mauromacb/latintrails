<?php

namespace App\Http\Controllers;

use App\CommentCard;
use Illuminate\Http\Request;
use App\CommentCard as formulario;
use Session;
use Redirect;
use Illuminate\Support\Facades\Validator;
use Input;

class CommentCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=formulario::all();
        return view('commentcard/index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item= new formulario();
        return view('commentcard.create', ['item' => $item]);
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
            'pregunta'  => 'required'
        );
        // proceso de validacion
        $messages = [
            'required' => ':attribute es requerido.',
        ];

        $validator = Validator::make(Input::all(), $rules, $messages);
        if ($validator->fails()) {
            return Redirect::to('commentcard/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $item = new formulario();
            $item->pregunta=$request->pregunta;
            $item->estado=1;
            $item->save();
            // redirecciona
            Session::flash('message', 'Solicitud procesada exitosamente!');
            return Redirect::to('commentcard');
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
        $item=formulario::find($id);

        return view('commentcard/edit', compact('item'));
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
        $item = formulario::find($id);
        $item->pregunta = $request->pregunta;
        $item->save();
        // redirecciona
        Session::flash('message', 'Solicitud procesada exitosamente');
        return Redirect::to('commentcard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item= formulario::find($id);
        $item->delete($id);

        Session::flash('message', 'Eliminado satisfactoriamente');
        return Redirect::to('commentcard');
    }
}
