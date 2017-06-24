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
        <p><a title="Return" href="{{url('/paquetesTuristicos')}}"><i class="fa fa-chevron-circle-left "></i> Regresar</a></p>
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
                        <label class="control-label col-sm-1"></label>
                        <div class="col-sm-10">
                            <h1 align="center">{{$item->titulo}}</h1>
                        </div>
                    </div>
                    <div class="form-group header-group-0 " id="form-group-description" style="">
                        <label class="control-label col-sm-1"></label>
                        <div class="col-sm-10">
                            <?php echo $item->descripcion;?>
                        </div>
                    </div>

                    <div class="form-group header-group-0 " id="form-group-price" style="">
                        <label class="control-label col-sm-1"></label>
                        <div class="col-sm-10">
                            <strong>Precio:</strong> {{$item->precio}}
                        </div>
                    </div>

                    <div class="form-group header-group-0 " id="form-group-category_id" style="">
                        <label class="control-label col-sm-1"></label>
                        <div class="col-sm-10">
                            <stron>Categoria:</stron> {{$cats->titulo_categoria}}
                        </div>
                    </div>
                    <div class="form-group header-group-0 " id="form-group-stock">

                        <label class="control-label col-sm-1"></label>
                            <div class="col-sm-10">
                                <div class="box box-default" style="box-shadow:0px 0px 5px #ccc">
                                    <div class="box-header">
                                        <h1 class="box-title">Itinerario</h1>

                                    </div>
                                    <div class="box-body" id="itinerarios">
                                        @include('layouts.scriptsPaquetesTuristicos')
                                        @include('paquetesTuristicos.itinerarioLista', ['item'=>$item, 'itinerario'=>$itinerario])
                                    </div>

                                    <!-- /.box-body -->
                                </div>
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