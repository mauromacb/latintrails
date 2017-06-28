@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <section class="content-header">
        <h1>
            <i class="fa fa-archive"></i>  Hoteles
            <!--START BUTTON -->
            <a href="{{url('hoteles')}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Ver todos">
                <i class="fa fa-table"></i> Ver todos
            </a>
            <a href="{{url('hoteles/create')}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Agregar nuevo">
                <i class="fa fa-plus-circle"></i> Agregar nuevo
            </a>
            <!-- END BUTTON -->
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Hoteles</li>
        </ol>
    </section>


    <div class="container-fluid spark-screen">
        <p><a title="Return" href="{{url('hoteles')}}"><i class="fa fa-chevron-circle-left "></i> Atrás</a></p>
        <div class="col-md-12 col-md-offset-0">

            <!-- Default box -->
            <div class="box">
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
                            <label class="control-label col-sm-2">Nombre: <span class="text-danger" title="Este campo es requerido">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" placeholder="Ingrese el nombre" maxlength="70" class="form-control" name="nombre" id="nombre" required value="{{$item->nombre}}" disabled>
                                <div class="text-danger"></div>
                                <p class="help-block"></p>
                            </div>
                            <label class="control-label col-sm-2">Descripcion <span class="text-danger" title="This field is required">*</span></label>
                            <div class="col-sm-10">
                                <?php echo $item->descripcion;?>

                                <div class="text-danger"></div>
                                <p class="help-block"></p>
                            </div>
                            <div class="form-group header-group-0 " id="form-group-status" style="">
                                <label class="control-label col-sm-2">Status <span class="text-danger" title="This field is required">*</span></label>

                                <div class="col-sm-10">
                                    @if($item->estado==1)
                                        <label class="radio-inline">
                                            <input type="radio" name="estado" required="" value="1" checked> Activo
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="estado" value="0"> Inactivo
                                        </label>
                                    @elseif($item->estado==0)
                                        <label class="radio-inline">
                                            <input type="radio" name="estado" required="" value="1"> Activo
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="estado" value="0" checked> Inactivo
                                        </label>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </div>
    </div>
@endsection
