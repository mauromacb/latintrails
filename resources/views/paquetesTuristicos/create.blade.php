@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('Paquetes Turísticos') }}
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
@endsection


@section('main-content')
    <section class="content-header">
        <h1>
            <i class="fa fa-glass"></i>  Editar &nbsp;&nbsp;

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
            <p><a title="Return" href="https://crudbooster.com/demoo/public/admin/products?m=13"><i class="fa fa-chevron-circle-left "></i> &nbsp; Back To List Data Product Data</a></p>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong><i class="fa fa-glass"></i> Editar Paquete</strong>
                </div>

                <div class="panel-body" style="padding:20px 0px 0px 0px">

                        {!! Form::open(array('route' => 'paquetesTuristicos.store','method'=>'POST', 'class' => 'form-horizontal')) !!}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">


                        <style>
                            .select2-container--default .select2-selection--single {border-radius: 0px !important}
                            .select2-container .select2-selection--single {height: 35px}
                        </style>

                        <div class="form-group header-group-0 " id="form-group-name" style="">
                            <label class="control-label col-sm-2">Nombre <span class="text-danger" title="This field is required">*</span></label>

                            <div class="col-sm-10">
                                <input type="text" title="nombre" name="titulo" id="titulo" required="" placeholder="" maxlength="70" class="form-control" name="name" id="name" value="">

                                <div class="text-danger"></div>
                                <p class="help-block"></p>

                            </div>
                        </div>								<div class="form-group header-group-0 " id="form-group-description" style="">
                            <label class="control-label col-sm-2">Descripcion <span class="text-danger" title="This field is required">*</span></label>
                            <div class="col-sm-10">
                                <textarea name="descripcion" id="descripcion" required="" maxlength="5000" class="form-control" rows="5"></textarea>
                                <div class="text-danger"></div>
                                <p class="help-block"></p>
                            </div>
                        </div>								<div class="form-group header-group-0 " id="form-group-photo" style="">
                            <label class="col-sm-2 control-label">Foto <span class="text-danger" title="This field is required">*</span></label>

                            <div class="col-sm-10">
                                <p><a class="fancybox" href="#"><img style="max-width:160px" title="" src="{{url('images/1.jpg')}}"></a></p>
                                <p><a class="fancybox" href="#"><img style="max-width:160px" title="" src="{{url('images/2.jpg')}}"></a></p>
                                <p><a class="fancybox" href="#"><img style="max-width:160px" title="" src="{{url('images/3.jpg')}}"></a></p>
                                <p><a class="btn btn-danger btn-delete btn-sm" onclick="if(!confirm('Esta seguro ?')) return false" href="#"><i class="fa fa-ban"></i> Delete </a></p>

                                <p class="text-muted"><em>* If you want to upload other file, please first delete the file.</em></p>
                                <div class="text-danger"></div>

                            </div>

                        </div>
                        <div class="form-group header-group-0 " id="form-group-price" style="">
                            <label class="control-label col-sm-2">Precio <span class="text-danger" title="This field is required">*</span></label>


                            <div class="col-sm-10">
                                <input type="text" title="Precio" required="" class="form-control inputMoney" name="precio" id="precio" value="">
                                <div class="text-danger"></div>
                                <p class="help-block"></p>
                            </div>
                        </div>								<div class="form-group header-group-0 " id="form-group-status" style="">
                            <label class="control-label col-sm-2">Status <span class="text-danger" title="This field is required">*</span></label>

                            <div class="col-sm-10">

                                <label class="radio-inline">
                                    <input type="radio" name="estado" required="" value="1" checked> Activo

                                </label>


                                <label class="radio-inline">
                                    <input type="radio" name="estado" value="0"> Inactivo
                                </label>


                                <div class="text-danger"></div>
                                <p class="help-block"></p>

                            </div>
                        </div>

                        <div class="form-group header-group-0 " id="form-group-category_id" style="">
                            <label class="control-label col-sm-2">Categoria <span class="text-danger" title="This field is required">*</span></label>

                            <div class="col-sm-10">
                                <select style="width:100%" class="form-control " id="id_categoria" name="id_categoria">
                                    <option value="SELECCIONE UNO" selected>SELECCIONE UNO</option>
                                    @foreach($categorias as $k)
                                        <option value="{{$k->id_categoria}}" >{{$k->titulo_categoria}}</option>
                                    @endforeach
                                </select>

                                <div class="text-danger"></div>
                                <p class="help-block"></p>

                            </div>
                        </div>
                        <div class="form-group header-group-0 " id="form-group-stock">

                            <label class="control-label col-sm-2">Itinerario</label>
                            <div class="col-sm-10">

                                <div class="box box-default" style="box-shadow:0px 0px 5px #ccc">
                                    <div class="box-header">
                                        <h1 class="box-title">Itinerario</h1>
                                        <div class="box-tools">
                                            <a class="btn btn-primary btn-sm btn-add" data-toggle="modal" data-target="#myModal" onclick="agregar()"><i class="fa fa-plus"></i> Agregar</a>
                                        </div>
                                    </div>
                                    <div class="box-body" id="itinerarios">
                                        @include('layouts.scripts')
                                        @include('paquetesTuristicos.itinerarioLista')
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
                        <!-- /.box-body -->

                        <div class="box-footer" style="background: #F5F5F5">

                            <div class="form-group">
                                <label class="control-label col-sm-2"></label>
                                <div class="col-sm-10">

                                    <a href="/paquetesTuristicos" class="btn btn-default"><i class="fa fa-chevron-circle-left"></i> Atras</a>


                                    <button type="submit" id="submitform" class="btn btn-success" onclick="validar();">Guardar</button>


                                </div>
                            </div>



                        </div><!-- /.box-footer-->
                    {!! Form::close() !!}

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Itinerarios</h4>
                                </div>

                                <div class="modal-body" id="resultado"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--END AUTO MARGIN-->

    </section><!-- /.content -->


@endsection