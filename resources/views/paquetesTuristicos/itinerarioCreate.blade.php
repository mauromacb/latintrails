<?php use App\User as user;?>
<?php use App\Itinerario as it;?>
<?php use App\CategoriaItinerario as catit;?>
@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
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
                @include('layouts.scripts')
                <script type="application/javascript">
                    $(document).ready(function() {
                        $('#example').DataTable();
                    } );
                </script>
                <script type="application/javascript">
                    $(function () {
                        $("#example").DataTable();
                    });
                </script>
                <table id="lista" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Categoría</th>
                        <th>Itinerario</th>
                        <th>Acción</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Categoría</th>
                        <th>Itinerario</th>
                        <th>Acción</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($itinerario as $k)
                        <tr>
                            <td>
                                <?php
                                $cat=it::where('id_itinerario',$k->id_itinerario)->first();
                                ?>
                                <i class="fa fa-arrow-circle-right"></i> <strong>{{catit::where('id_categoria_itinerario',$cat->id_categoria_itinerario)->first()->descripcion}}</strong>
                            </td>
                            <td>
                                <i class="fa fa-arrow-circle-right"></i> <strong>{{it::where('id_itinerario',$k->id_itinerario)->first()->titulo}}</strong>
                            </td>
                            <td>
                                <div class='button_action' style='text-align:right'>
                                    <div style='float: right; margin-left: 3px'>
                                        {{ Form::open(['method' => 'POST', 'route' => ['paquetesItinerarios.destroy', $k->id_itinerario]]) }}
                                        <input type="hidden" name="idpaquetetur" value="{{$item->id_paquete_tur}}">
                                        <input type="hidden" name="id_itinerario" value="{{$k->id_itinerario}}">
                                        <fieldset class="buttons">
                                            <button class="delete btn btn-xs btn-danger" onclick="return confirm('¿Está seguro que desea eliminar el registro?');">
                                                <span class="fa fa-trash"></span>
                                            </button>
                                        </fieldset>
                                        {{ Form::close() }}
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </section><!-- /.content -->
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