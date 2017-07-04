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
            <p><a title="Return" href="{{url('mapas/'.$itinerario->id_itinerario)}}"><i class="fa fa-chevron-circle-left "></i> Atrás</a></p>
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
                                <label class="control-label col-sm-2">Nombre mapa: <span class="text-danger" title="Este campo es requerido">*</span></label>
                                <div class="col-sm-10">
                                    {{$item->nombre_mapa}}
                                    <div class="text-danger"></div>
                                    <p class="help-block"></p>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <label class="col-sm-2 control-label">Imagen actual</label>
                                <div class="col-sm-10">
                                    <img src="{{asset($item->path.'thumb_'.$item->id_mapa.'_'.$item->imagen)}}" alt="{{$item->nombre_mapa}}">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <label class="control-label col-sm-2">Descripción <span class="text-danger" title="This field is required">*</span></label>
                                <div class="col-sm-10">
                                    <?php echo $item->descripcion;?>
                                    <div class="text-danger"></div>
                                    <p class="help-block"></p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="box-footer" style="background: #F5F5F5">
                        <div class="form-group">
                            <label class="control-label col-sm-2"></label>
                            <div class="col-sm-10">
                                <a href="{{url('mapas/'.$itinerario->id_itinerario)}}" class="btn btn-default"><i class="fa fa-chevron-circle-left"></i> Atras</a>
                            </div>
                        </div>
                    </div><!-- /.box-footer-->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </section>
@endsection