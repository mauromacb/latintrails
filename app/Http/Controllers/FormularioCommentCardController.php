<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FormularioCommentCard as formulario;
use Session;
use Redirect;
use Illuminate\Support\Facades\Validator;
use Input;

class FormularioCommentCardController extends Controller
{

    public function index()
    {
        $items=formulario::all();
        return view('formulariocommentcard/index', compact('items'));
    }

    public function create()
    {
        $item= new formulario();
        return view('formulariocommentcard.create', ['item' => $item]);
    }

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
            return Redirect::to('formulariocommentcard/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $item = new formulario();
            $item->pregunta=$request->pregunta;
            $item->save();
            // redirecciona
            Session::flash('message', 'Solicitud procesada exitosamente!');
            return Redirect::to('formulariocommentcard');
        }
    }
    public function show($id)
    {
        $item=formulario::where('id_formulario_comment_card',$id)->first();
        return view('formulariocommentcard/show', compact('item'));
    }
    public function edit($id)
    {
        $item=formulario::where('id_formulario_comment_card',$id)->first();
        return view('formulariocommentcard/edit', compact('item'));
    }
    public function update(Request $request, $id)
    {
        $item = formulario::where('id_formulario_comment_card',$id)->first();
        $item->pregunta = $request->pregunta;
        $item->save();
        // redirecciona
        Session::flash('message', 'Solicitud procesada exitosamente');
        return Redirect::to('formulariocommentcard');
    }
    public function destroy($id)
    {
        $item= formulario::where('id_formulario_comment_card',$id);
        $item->delete($id);
        Session::flash('message', 'Eliminado satisfactoriamente');
        return Redirect::to('formulariocommentcard');
    }
}
