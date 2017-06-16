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
                            <i class="fa fa-archive"></i>  Mapas Turísticos
                            <!--START BUTTON -->

                            <a href="<?php echo $_SERVER['REQUEST_URI'];?>" id="btn_show_data" class="btn btn-sm btn-primary" title="Ver todos">
                                <i class="fa fa-table"></i> Ver todos
                            </a>


                            <a href="<?php echo $_SERVER['REQUEST_URI'];?>/create" id="btn_add_new_data" class="btn btn-sm btn-success" title="Agregar nuevo">
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

                        {{ Form::model($item, array('route' => array('mapas.update', $item->id_mapa), 'method' => 'PUT')) }}
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group header-group-0 " id="form-group-name">
                                    <label class="control-label col-sm-2">Nombre: <span class="text-danger" title="Este campo es requerido">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" maxlength="70" class="form-control" name="nombre" id="nombre" value="{{$item->nombre_mapa}}" required>
                                        <div class="text-danger"></div>
                                        <p class="help-block"></p>
                                    </div>
                                    <label class="control-label col-sm-2">Descripcion <span class="text-danger" title="This field is required">*</span></label>
                                    <div class="col-sm-10">
                                        <textarea class="ckeditor" name="descripcion" id="descripcion" rows="10" cols="80">{{$item->descripcion}}</textarea>

                                        <div class="text-danger"></div>
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="form-group header-group-0 " id="form-group-status" style="">
                                        <label class="control-label col-sm-2">Status <span class="text-danger" title="This field is required">*</span></label>

                                        <div class="col-sm-10">

                                            <label class="radio-inline">
                                                <input type="radio" name="estado" required="" value="1" @if($item->estado==1)checked @endif> Activo

                                            </label>


                                            <label class="radio-inline">
                                                <input type="radio" name="estado" value="0" @if($item->estado==0)checked @endif> Inactivo
                                            </label>


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
                                        <a href="javascript:history.back(1)" class="btn btn-default"><i class="fa fa-chevron-circle-left"></i> Atras</a>
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
