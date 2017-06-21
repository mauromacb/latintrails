@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection
@section('main-content')
<section class="content-header">
    <h1>
        <i class="fa fa-glass"></i>  Mostrar &nbsp;&nbsp;

        <!--START BUTTON -->
        <!--ADD ACTIon-->
        <!-- END BUTTON -->
    </h1>


    <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Paquetes Turisticos</li>
    </ol>
</section>


<!-- Main content -->
<section id="content_section" class="content">
    <!-- Your Page Content Here -->
    <div>
        <p><a title="Return" href="{{url('/paquetesTuristicos')}}"><i class="fa fa-chevron-circle-left "></i> Regresar</a></p>
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong><i class="fa fa-glass"></i> Ver Paquete Turístico</strong>
            </div>

            <link href="{{ asset('/css/dropzone.css') }}" rel="stylesheet">
            <script src="{{ asset('/js/dropzone.js') }}"></script>
            <div class="col-lg-12">
                {{--<form method="POST" action="/ficheros" accept-charset="UTF-8" enctype="multipart/form-data" class="dropzone" id="image-upload">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="dz-message">

                    </div>

                    <div class="fallback">
                        <input name="file" type="file" multiple />
                    </div>

                    <div class="dropzone-previews" id="dropzonePreview"></div>

                    <h4 style="text-align: center;color:#428bca;">Mueve las imágenes a esta área<span class="glyphicon glyphicon-hand-down"></span></h4>

                </form>--}}
                <script type="text/javascript">
                    Dropzone.options.imageUpload = {
                        maxFilesize         :       1,
                        acceptedFiles: ".jpeg,.jpg,.png,.gif"
                    };
                </script>
            </div>


            <div class="panel-body form-horizontal" style="padding:20px 0px 0px 0px">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <style>
                        .select2-container--default .select2-selection--single {border-radius: 0px !important}
                        .select2-container .select2-selection--single {height: 35px}
                    </style>

                    <div class="form-group header-group-0 " id="form-group-name" style="">
                        <label class="control-label col-sm-1"></label>
                        <div class="col-sm-10">
                            <h3>{{$item->titulo}}</h3>
                        </div>
                    </div>
                    <div class="form-group header-group-0 " id="form-group-description" style="">
                        <label class="control-label col-sm-1"></label>
                        <div class="col-sm-10">
                            <label style="border: 1px dashed #9e9e9e; padding: 10px;"><?php echo $item->descripcion;?></label>
                        </div>
                    </div>

                    <div class="form-group header-group-0 " id="form-group-price" style="">
                        <label class="control-label col-sm-2">Precio <span class="text-danger" title="This field is required">*</span></label>
                        <div class="col-sm-10">
                            ${{$item->precio}}
                        </div>
                    </div>
                    <div class="form-group header-group-0 " id="form-group-category_id" style="">
                        <label class="control-label col-sm-2">Categoria <span class="text-danger" title="This field is required">*</span></label>

                        <div class="col-sm-10">
                            <strong>{{$cats->titulo_categoria}}</strong>
                        </div>
                    </div>
                    <div class="form-group header-group-0 " id="form-group-stock">

                            <label class="control-label col-sm-1"></label>
                            <div class="col-sm-10">

                                <div class="box box-default" style="box-shadow:0px 0px 5px #ccc">
                                    <div class="box-header">
                                        <h1 class="box-title">Itinerario</h1>
                                        <div class="box-tools">
                                            {{--<a class="btn btn-primary btn-sm btn-add" data-toggle="modal" data-target="#myModal" onclick="agregar()"><i class="fa fa-plus"></i> Ver Itinerarios</a>--}}
                                        </div>
                                    </div>
                                    <div class="box-body" id="itinerarios">
                                        @include('layouts.scriptsPaquetesTuristicos')
                                        @include('paquetesTuristicos.itinerarioLista', ['item'=>$item, 'itinerario'=>$itinerario])
                                    </div>

                                    <!-- /.box-body -->
                                </div>


                                <div id="modal_add_stock" class="modal" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                <h4 class="modal-title">Agregar</h4>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <div class="form-content"></div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                <button type="button" class="btn btn-primary btn-save">Guardar cambios</button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->

                                <div id="modal_edit_stock" class="modal" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                <h4 class="modal-title">Editar</h4>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <div class="form-content">

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                <button type="button" data-url="" class="btn btn-primary btn-save">Guardar Cambios</button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                            </div>
                    </div>
            </div>
        </div>
    </div><!--END AUTO MARGIN-->
</section><!-- /.content -->
@endsection