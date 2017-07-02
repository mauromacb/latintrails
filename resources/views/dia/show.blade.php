@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <section class="content-header">
        <h1>
            <i class="fa fa-archive"></i>  Tipo de Itinerario
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


    <div class="container-fluid spark-screen">
        <p><a title="Return" href="{{url('categoriaItinerario')}}"><i class="fa fa-chevron-circle-left "></i> Atrás</a></p>
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <!-- Default box -->
                <div class="box">
                    <div class="box-body">
                        <div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <strong><i class="fa fa-archive"></i> Detalle</strong>
                                </div>
                                <div class="panel-body" style="padding:20px 0px 0px 0px">
                                        <div class="box-body">
                                            <div class="table-responsive">
                                                <table id="table-detail" class="table table-striped">
                                                    <tbody>
                                                        <tr>
                                                            <td><h3>{{$item->descripcion}}</h3></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                @if($item->fecha_fija==1)
                                                                    <span class="btn btn-xs btn-success">Con fecha fija</span>
                                                                @else
                                                                    <span class="btn btn-xs btn-warning">Sin fecha fija</span>
                                                                @endif
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div><!-- /.box-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
@endsection