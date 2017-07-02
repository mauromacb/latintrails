@extends('adminlte::layouts.app')
@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">

                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3>
                            <i class="fa fa-archive"></i>  Tipo de Itinerario
                            <!--START BUTTON -->
                            <a href="{{url('categoriaItinerario')}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Ver todos">
                                <i class="fa fa-table"></i> Ver todos
                            </a>
                            <a href="{{url('categoriaItinerario/create')}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Agregar nuevo">
                                <i class="fa fa-plus-circle"></i> Agregar nuevo
                            </a>
                            <!--ADD ACTIon-->
                            <!-- END BUTTON -->
                        </h3>

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

                        {{ Form::model($item, array('route' => array('categoriaItinerario.update', $item->id_tipo_itinerario), 'method' => 'PUT')) }}
                            <div class="box-body">
                                <div class="form-group header-group-0 " id="form-group-name">
                                    <label class="control-label col-sm-2">Nombre: <span class="text-danger" title="Este campo es requerido">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" maxlength="70" class="form-control" name="descripcion" id="descripcion" value="{{$item->descripcion}}" required>
                                    </div>
                                </div>
                                <div class="form-group header-group-0 " id="form-group-name">
                                    <label class="control-label col-sm-2">Fecha Fija <span class="text-danger" title="This field is required">*</span></label>

                                    <div class="col-sm-10">
                                        <label class="radio-inline">
                                            @if($item->fecha_fija==1)
                                                <label class="radio-inline">
                                                <input type="radio" name="fecha_fija" required value="1" checked> Con fecha fija
                                                </label>
                                                <label class="radio-inline">
                                                <input type="radio" name="fecha_fija" required value="0"> Sin fecha fija
                                                </label>
                                            @else
                                                <label class="radio-inline">
                                                <input type="radio" name="fecha_fija" required value="1" > Con fecha fija
                                                </label>
                                                <label class="radio-inline">
                                                <input type="radio" name="fecha_fija" required value="0" checked> Sin fecha fija
                                                </label>
                                            @endif
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer" style="background: #F5F5F5">
                                <div class="form-group">
                                    <label class="control-label col-sm-2"></label>
                                    <div class="col-sm-10">
                                        <a href="{{url('categoriaItinerario')}}" class="btn btn-default"><i class="fa fa-chevron-circle-left"></i> Atras</a>
                                        <input type="submit" name="submit" value="Guardar" class="btn btn-success">
                                    </div>
                                </div>
                            </div><!-- /.box-footer-->
                        {{ Form::close() }}
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
        </div>
    </div>
@endsection
