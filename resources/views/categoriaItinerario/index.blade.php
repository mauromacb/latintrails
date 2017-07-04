@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <section class="content-header">
        <h1>
            <i class="fa fa-archive"></i>  Categoría de Itinerario
            <!--START BUTTON -->
            <a href="{{url('categoriaItinerario')}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Ver todos">
                <i class="fa fa-table"></i> Ver todos
            </a>
            <a href="{{url('categoriaItinerario/create')}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Agregar nuevo">
                <i class="fa fa-plus-circle"></i> Agregar nuevo
            </a>
            <!-- END BUTTON -->
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Tipo Itinerario</li>
        </ol>
    </section>
<br>
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">

                <!-- Default box -->
                <div class="box">
                    <div class="box-body">
                        @include('layouts.scripts')
                        <table id="lista" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <td>Nombre</td>
                                <td>Fecha fija</td>
                                <td>Acción</td>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <td>Nombre</td>
                                <td>Fecha fija</td>
                                <td>Acción</td>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($items as $k)
                                <tr>
                                    <td><a href="{{url('categoriaItinerario/'.$k->id_tipo_itinerario)}}" class="small-box-footer">{{$k->descripcion}} <i class="fa fa-arrow-circle-right"></i></a></td>
                                    <td>@if($k->fecha_fija==1)
                                            <span class="btn btn-xs btn-success">Con fecha fija</span>
                                        @else
                                            <span class="btn btn-xs btn-warning">Sin fecha fija</span>
                                        @endif
                                    </td>
                                    <td><div class='' style='text-align:right'>
                                            <a class='btn btn-xs btn-primary' title='Ver' href='{{url('categoriaItinerario/'.$k->id_tipo_itinerario)}}'> <i class='fa fa-eye'></i></a>
                                            <a class='btn btn-xs btn-success' title='Editar' href='{{url('categoriaItinerario/'.$k->id_tipo_itinerario.'/edit')}}'><i class='fa fa-pencil'></i></a>
                                            <div style='float: right; margin-left: 3px'>
                                            {{ Form::open(['method' => 'DELETE', 'route' => ['categoriaItinerario.destroy', $k->id_tipo_itinerario]]) }}
                                                <fieldset class="buttons">
                                                    <button class="delete btn btn-xs btn-danger" onclick="return confirm('¿Está seguro que desea eliminar el registro?');">
                                                        <span class="fa fa-trash"></span>
                                                    </button>
                                                </fieldset>
                                            {{ Form::close() }}
                                            </div>
                                        </div></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
@endsection
