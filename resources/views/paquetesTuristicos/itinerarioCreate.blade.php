<?php use App\User as user;?>
<?php use App\Itinerario as it;?>
<?php use App\CategoriaItinerario as catit;?>
@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
@endsection


@section('main-content')
    <section class="content-header">
        <h1>
            <i class="fa fa-glass"></i>  Paquete Turístico: {{$item->titulo}}

            <!--START BUTTON -->

            <a href="{{url('/paquetesTuristicos')}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                <i class="fa fa-table"></i> Ver
            </a>

            <a href="{{url('/crearItinerario/'.$item->id_paquete_tur)}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
                <i class="fa fa-plus-circle"></i> Agregar
            </a>
            <!--ADD ACTIon-->
            <!-- END BUTTON -->
        </h1>


        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Itinerarios con Paquetes Turísticos</li>
        </ol>
    </section>

    <!-- Main content -->
    <section id="content_section" class="content">
        <!-- Your Page Content Here -->
<div><p><a title="Return" href="{{url('paquetesTuristicos')}}"><i class="fa fa-chevron-circle-left "></i> Atrás</a></p></div>
        <div class="box">

            <div class="box-body">
                {!! Form::open(array('route' => 'paquetesItinerarios.crear','method'=>'POST', 'class' => 'form-horizontal')) !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id_paquete_tur" value="{{$item->id_paquete_tur}}">


                <style>
                    .select2-container--default .select2-selection--single {border-radius: 0px !important}
                    .select2-container .select2-selection--single {height: 35px}
                </style>

                <div class="form-group header-group-0 " id="form-group-category_id" style="">
                    <label class="control-label col-sm-2">Categoría de Itinerario <span class="text-danger" title="This field is required">*</span></label>

                    <div class="col-sm-10">
                        <select style="width:100%" class="form-control " id="id_categoria_itinerario" name="id_categoria_itinerario" onchange="getItinerario()">
                            <option value="" required>SELECCIONE UNO</option>
                            @foreach($categoriasItinerarios as $k)
                                <option value="{{$k->id_categoria_itinerario}}" >{{$k->descripcion}}</option>
                            @endforeach
                        </select>

                        <div class="text-danger"></div>
                        <p class="help-block"></p>

                    </div>


                </div>

                <div class="form-group header-group-0 " id="form-group-category_id" style="">
                    <label class="control-label col-sm-2">Itinerario <span class="text-danger" title="This field is required">*</span></label>

                    <div class="col-sm-10">
                        <select style="width:100%" class="form-control " id="id_categoria" name="id_itinerario" onchange="getFecha()" required>
                            <option value="" required>SELECCIONE UNO</option>
                            @foreach($itinerarios as $k)
                                <option value="{{$k->id_categoria}}" >{{$k->titulo}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group header-group-0 " id="" style="">
                    <label class="control-label col-sm-2">Fechas: <span class="text-danger" title="This field is required">*</span></label>

                    <div class="col-sm-10">
                        <select style="width:100%" class="form-control " id="id_calendario_itinerario" name="id_calendario_itinerario" >
                            <option>SELECCIONE UNO</option>
                            @foreach($calendarioItinerarios as $k)
                                <option value="{{$k->id_calendario_itinerario}}" >{{$k->fecha_inicio}} - {{$k->fecha_fin}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="box-footer" style="background: #F5F5F5">
                    <div class="form-group">
                        <label class="control-label col-sm-2"></label>
                        <div class="col-sm-10">
                            <a href="{{url('paquetesTuristicos')}}" class="btn btn-default"><i class="fa fa-chevron-circle-left"></i> Atras</a>
                            <button type="submit" id="submitform" class="btn btn-success" onclick="validar();">Guardar</button>
                        </div>
                    </div>
                </div><!-- /.box-footer-->
                {!! Form::close() !!}
            </div>
        </div>
    </section><!-- /.content -->

    <script language="javascript">
        function getItinerario(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#id_categoria_itinerario option:selected").each(function () {
                var e = document.getElementById("id_categoria_itinerario");
                var strUser = e.options[e.selectedIndex].value;
                elegido=$(this).val();
                $("#id_categoria").html('');
                $.post("{{url('/getItinerario')}}", { elegido: elegido }, function(data){
                    $("#id_categoria").append('<option>SELECCIONE UNO</option>');
                    $.each(data, function (k, v) {
                        $("#id_categoria").append('<option value="'+data[k].id_itinerario+'" >'+data[k].titulo+'</option>');
                    });

                });
            });
        };
    function getFecha(){
            $("#id_categoria option:selected").each(function () {
                var e = document.getElementById("id_categoria");
                var strUser = e.options[e.selectedIndex].value;
                elegido=$(this).val();
                $("#id_calendario_itinerario").html('');
                $.post("{{url('/getFechas')}}", { elegido: elegido }, function(data){
                    $("#id_calendario_itinerario").append('<option>SELECCIONE UNO</option>');
                    $.each(data, function (k, v) {
                        $("#id_calendario_itinerario").append('<option value="'+data[k].id_calendario_itinerario+'" >'+data[k].fecha_inicio+' - '+data[k].fecha_fin+'</option>');
                    });

                });
            });
        };
    </script>
@endsection
<?php
/*echo "Aqui SOAP";

$servicio="http://app.segurosequinoccial.info/WebServiceSybase/Service.asmx?WSDL"; //url del servicio
$parametros=array(); //parametros de la llamada
$parametros['string']="es";
$parametros['double']=0;
$client = new SoapClient($servicio, array());
$params=new stdClass();
$params->nro_doc='es';
$params->PrimaNeta=(double) 1985.33;

$result=$client->CalcularDeudaSSC($params);
var_dump($result->CalcularDeudaSSCResult);

//$result = $client->getSoap($parametros);//llamamos al método que nos interesa con los parámetros
    */
?>