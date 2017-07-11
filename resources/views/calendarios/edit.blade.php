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
            <p><a title="Return" href="{{url('calendarios/'.$itinerario->id_itinerario)}}"><i class="fa fa-chevron-circle-left "></i> Atrás</a></p>
            <!-- Default box -->
            <div class="panel panel-default">
                <div class="box-header with-border">
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            {{ Html::ul($errors->all()) }}
                        </div>
                    @endif
                    {{ Form::model($item, array('route' => array('calendarios.update', $item->id_calendario_itinerario), 'method' => 'PUT','files' => true)) }}
                    <div class="box-body">
                        <div class="form-group header-group-0 " id="form-group-name" style="">
                            <div class="col-lg-12">
                                <label class="control-label col-sm-2">Itinerario: <span class="text-danger" title="Este campo es requerido">*</span></label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="id_itinerario" id="id_itinerario" value="{{$itinerario->id_itinerario}}">
                                    <strong>{{$itinerario->titulo}} || {{$itinerario->subtitulo}}</strong>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <label class="control-label col-sm-2">Fecha de inicio: <span class="text-danger" title="Este campo es requerido">*</span></label>
                                <div class="col-sm-10">
                                    <div class="input-group date" data-provide="datepicker">
                                        <input type="date" class="form-control" name="fecha_inicio" value="{{$item->fecha_inicio}}" required>
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <label class="control-label col-sm-2">Fecha de fin: <span class="text-danger" title="Este campo es requerido">*</span></label>
                                <div class="col-sm-10">
                                    <div class="input-group date" data-provide="datepicker">
                                        <input type="date" class="form-control" name="fecha_fin" value="{{$item->fecha_fin}}" required>
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="box-footer" style="background: #F5F5F5">
                        <div class="form-group">
                            <label class="control-label col-sm-2"></label>
                            <div class="col-sm-10">

                                <a href="{{url('calendarios/'.$itinerario->id_itinerario)}}" class="btn btn-default"><i class="fa fa-chevron-circle-left"></i> Atras</a>

                                <input type="submit" name="submit" value="Guardar" class="btn btn-success">

                            </div>
                        </div>
                    </div><!-- /.box-footer-->

                    {!! Form::close() !!}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </section>
    <script>
        $('#Date').datepicker({
            autoclose: true,
            todayHighlight: true
        });
    </script>
@endsection