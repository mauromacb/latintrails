@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
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


            <div class="panel-body" style="padding:20px 0px 0px 0px">

                {{ Form::model($item, array('route'=>array('paquetesTuristicos.update',$item->id_paquete_tur),'method' => 'put','class'=>'form-horizontal')) }}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <style>
                            .select2-container--default .select2-selection--single {border-radius: 0px !important}
                            .select2-container .select2-selection--single {height: 35px}
                        </style>

                        <div class="form-group header-group-0 " id="form-group-name" style="">
                            <label class="control-label col-sm-2">Nombre <span class="text-danger" title="This field is required">*</span></label>

                            <div class="col-sm-10">
                                <input type="text" title="nombre" required="" placeholder="" maxlength="70" class="form-control" name="titulo" id="titulo" value="{{$item->titulo}}">

                                <div class="text-danger"></div>
                                <p class="help-block"></p>

                            </div>
                        </div>
                        <div class="form-group header-group-0 " id="form-group-description" style="">
                            <label class="control-label col-sm-2">Descripcion <span class="text-danger" title="This field is required">*</span></label>
                            <div class="col-sm-10">
                                <textarea class="ckeditor" name="descripcion" id="descripcion" rows="10" cols="80">{{$item->descripcion}}</textarea>

                                <div class="text-danger"></div>
                                <p class="help-block"></p>
                            </div>
                        </div>

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
                                <input type="text" title="Precio" required="" class="form-control inputMoney" name="precio" id="precio" value="${{$item->precio}}">
                                <div class="text-danger"></div>
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="form-group header-group-0 " id="form-group-status" style="">
                            <label class="control-label col-sm-2">Status <span class="text-danger" title="This field is required">*</span></label>

                            <div class="col-sm-10">

                                <label class="radio-inline">
                                    <input type="radio" name="estado" required="" value="Activo" @if($item->estado==1)checked @endif> Activo

                                </label>


                                <label class="radio-inline">
                                    <input type="radio" name="estado" value="Inactivo" @if($item->estado==0)checked @endif> Inactivo
                                </label>


                                <div class="text-danger"></div>
                                <p class="help-block"></p>

                            </div>
                        </div>

                        <div class="form-group header-group-0 " id="form-group-category_id" style="">
                            <label class="control-label col-sm-2">Categoria <span class="text-danger" title="This field is required">*</span></label>

                            <div class="col-sm-10">
                                <select style="width:100%" class="form-control " id="id_categoria" required="" name="id_categoria" tabindex="-1" aria-hidden="true">
                                    <option value="SELECCIONE UNO">SELECCIONE UNO</option>
                                    <option value="{{$cats->id_categoria}}" selected="">{{$cats->titulo_categoria}}</option>
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

<script language="javascript">
    function agregarItinerario() {
        $("#form1").submit(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '/nuevoItinerario',
                data: $(this).serialize(),
                success: function (data) {
                    $('#resultado').html('<div class="alert alert-success" align="center"><strong>Itinerario Agregado Exitosamente!</strong></div>');
                    $('#itinerarios').html(data);
                }
            })
            return false;
        });
    }
    function agregar() {
        $('#resultado').html('<form name="form1" id="form1">                {{ csrf_field() }}            <div class="box-body">            <div class="form-group header-group-0 " id="form-group-name" style="">            <label class="control-label col-sm-2">Dia: <span class="text-danger" title="Este campo es requerido">*</span></label>            <div class="col-sm-10">            <input type="hidden" name="idpaquetetur" id="idpaquetetur" value="{{$item->id_paquete_tur}}">            <input type="text" maxlength="70" class="form-control" name="dia" id="dia" required>        </div>        </div>        <div class="form-group header-group-0 " id="form-group-name" style="">            <label class="control-label col-sm-2">Descripción: <span class="text-danger" title="Este campo es requerido">*</span></label>            <div class="col-sm-10">            <textarea name="descripcion" id="descripcion" required="" maxlength="5000" class="form-control" rows="5"></textarea>            </div>            </div>            </div>            <div class="modal-footer" style="background: #F5F5F5">            <div class="form-group">            <div class="col-sm-10">            <button type="submit" name="submit" class="btn btn-primary" onclick="agregarItinerario()">Guardar</button>            <button type="submit" data-dismiss="modal" class="btn btn-danger">Cerrar</button>            </div>            </div>            </div><!-- /.box-footer-->            </form>');
    }
    function editarItinerario(pqtr,itinerario) {
            $.ajax({
                type: 'GET',
                url: '/editarItinerario',
                data: 'idpt=' + pqtr + '&idit=' + itinerario,
                success: function (data) {
                    $('#resultado').html('<form name="forms1" id="forms1">                {{ csrf_field() }}            <div class="box-body">            <div class="form-group header-group-0 " id="form-group-name" style="">            <label class="control-label col-sm-2">Dia: <span class="text-danger" title="Este campo es requerido">*</span></label>            <div class="col-sm-10">            <input type="hidden" name="idpaquetetur" id="idpaquetetur" value="{{$item->id_paquete_tur}}">            <input type="hidden" name="idit" id="idit" value="'+data.id_itinerario+'"> <input type="text" maxlength="70" class="form-control" name="dia" id="dia" required value="'+data.dia+'">        </div>        </div>        <div class="form-group header-group-0 " id="form-group-name" style="">            <label class="control-label col-sm-2">Descripción: <span class="text-danger" title="Este campo es requerido">*</span></label>            <div class="col-sm-10">            <textarea name="descripcion" id="descripcion" required="" maxlength="5000" class="form-control" rows="5">'+data.descripcion+'</textarea>            </div>            </div>            </div>            <div class="modal-footer" style="background: #F5F5F5">            <div class="form-group">            <div class="col-sm-10">            <button type="submit" name="submit" class="btn btn-primary" onclick="guardarItinerario()">Guardar</button>            <button type="submit" data-dismiss="modal" class="btn btn-danger">Cerrar</button>            </div>            </div>            </div><!-- /.box-footer-->            </form>');
                }
            })
            return false;

    }
    function guardarItinerario(pqtr,itinerario) {
        $("#forms1").submit(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '/guardarItinerario',
                data: $(this).serialize(),
                success: function (data) {
                    $('#resultado').html('<div class="alert alert-success" align="center"><strong>Itinerario Actualizado Exitosamente!</strong></div>');
                    $('#itinerarios').html(data);
                }
            })
            return false;
        });
    }
    function eliminarItinerario(pqtr,itinerario) {
        if (confirm('¿Está seguro que desea eliminar el registro?')){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: '/destroyItinerario',
                data: 'idpt='+pqtr+'&idit='+itinerario,
                success: function (data) {
                    $('#itinerarios').html(data);
                }
            })
            return false;
        }
    }
</script>
@endsection