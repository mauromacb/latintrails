@extends('adminlte::layouts.app')
@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection
@section('main-content')
<section class="content-header">
<h3>
    <i class="fa fa-archive"></i> Mapas Zonas Turísticas
    <!--START BUTTON -->
    <a href="{{url('mapas/'.$itinerario->id_itinerario)}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Ver todos">
        <i class="fa fa-table"></i> Ver todos
    </a>
    @if(!isset($items[0]->id_mapa))
    <a href="{{url('mapas/'.$itinerario->id_itinerario.'/create')}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Agregar nuevo">
        <i class="fa fa-plus-circle"></i> Agregar nuevo
    </a>
    @endif
    <!--ADD ACTIon-->
    <!-- END BUTTON -->
</h3>
<ol class="breadcrumb">
    <li><a href="/"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Mapas Zonas turísticas</li>
</ol>
</section>
<section id="content_section" class="content">
<div>
    <p><a title="Return" href="{{url('itinerario')}}"><i class="fa fa-chevron-circle-left "></i> Atrás</a></p>
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            @include('layouts.scripts')
            <table id="lista" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <td>Nombre</td>
                    <td>Acción</td>

                </tr>
                </thead>
                <tfoot>
                <tr>
                    <td>Nombre</td>
                    <td>Acción</td>

                </tr>
                </tfoot>
                <tbody>
                @if(isset($items))
                @foreach($items as $k)
                    <tr>
                        <td>
                            <a href="{{url('mapas/'.$k->id_mapa.'/show')}}" class="small-box-footer">
                                <img src="{{asset($k->path.'thumb_'.$k->id_mapa.'_'.$k->imagen)}}" alt="{{$k->nombre_mapa}}">
                                <div class="caption">
                                    <h3>{{$k->nombre_mapa}}</h3>
                                </div>
                            </a>
                        </td>
                        <td>
                            <div class='' style='text-align:right'>
                                <a class='btn btn-xs btn-primary' title='Ver' href='{{url('mapas/'.$k->id_mapa.'/show')}}'> <i class='fa fa-eye'></i></a>
                                <a class='btn btn-xs btn-success' title='Editar' href='{{url('mapas/'.$k->id_mapa.'/edit')}}'><i class='fa fa-pencil'></i></a>
                                <div style='float: right; margin-left: 3px'>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                @endif
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

</div>
</section>
@endsection
