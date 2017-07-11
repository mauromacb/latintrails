@extends('adminlte::layouts.app')
@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection
@section('main-content')
<section class="content-header">
<h3>
    <i class="fa fa-archive"></i> {{$itinerario->titulo}} >> Calendario
    <!--START BUTTON -->
    <a href="{{url('calendarios/'.$itinerario->id_itinerario)}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Ver todos">
        <i class="fa fa-table"></i> Ver todos
    </a>
    <a href="{{url('calendarios/'.$itinerario->id_itinerario.'/create')}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Agregar nuevo">
        <i class="fa fa-plus-circle"></i> Agregar nuevo
    </a>
    <!--ADD ACTIon-->
    <!-- END BUTTON -->
</h3>
<ol class="breadcrumb">
    <li><a href="/"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Calendarios</li>
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
                    <td>Calendario</td>
                    <td>Acción</td>

                </tr>
                </thead>
                <tfoot>
                <tr>
                    <td>Calendario</td>
                    <td>Acción</td>

                </tr>
                </tfoot>
                <tbody>
                @if(isset($items))
                @foreach($items as $k)
                    <tr>
                        <td>
                            <strong>{{$k->fecha_inicio}} || {{$k->fecha_fin}}</strong>
                        </td>
                        <td>
                            <div class='' style='text-align:right'>
                                <a class='btn btn-xs btn-success' title='Editar' href='{{url('calendarios/'.$k->id_calendario_itinerario.'/edit')}}'><i class='fa fa-pencil'></i></a>
                                <div style='float: right; margin-left: 3px'>
                                </div>
                                <div style='float: right; margin-left: 3px'>
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['calendarios.destroy', $k->id_calendario_itinerario]]) }}
                                    <fieldset class="buttons">
                                        <input type="hidden" name="id_itinerario" value="{{$itinerario->id_itinerario}}">
                                        <button class="delete btn btn-xs btn-danger" onclick="return confirm('¿Está seguro que desea eliminar el registro?');">
                                            <span class="fa fa-trash"></span>
                                        </button>
                                    </fieldset>
                                    {{ Form::close() }}
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
