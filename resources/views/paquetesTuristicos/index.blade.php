@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
<section class="content-header">
    <h1>
        <i class="fa fa-glass"></i>  Paquetes Turisticos

        <!--START BUTTON -->

        <a href="{{url('/paquetesTuristicos')}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
            <i class="fa fa-table"></i> Ver
        </a>


        <a href="{{url('/paquetesTuristicos/create')}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
            <i class="fa fa-plus-circle"></i> Agregar
        </a>
        <!--ADD ACTIon-->
        <!-- END BUTTON -->
    </h1>


    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Paquetes Turísticos</li>
    </ol>
</section>

<!-- Main content -->
<section id="content_section" class="content">
    <!-- Your Page Content Here -->

    <div class="box">

        <div class="box-body">
            @include('layouts.scripts')
            <script type="application/javascript">
                $(document).ready(function() {
                    $('#example').DataTable();
                } );
            </script>
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Título</th>
                    <th>Status</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Título</th>
                    <th>Status</th>
                    <th>Acción</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($paquete_turistico as $k)
                <tr>
                    <td>@if($k->estado==1)
                            <span class="btn btn-xs btn-success">Activo</span>
                        @else
                            <span class="btn btn-xs btn-warning">Inactivo</span>
                        @endif
                        <a href="{{url('paquetesTuristicos/'.$k->id_paquete_tur)}}" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i> <strong>{{$k->titulo}}</strong></a></td>
                    <td>
                        <div class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-list"></span> <a href="{{url('itinerario/'.$k->id_paquete_tur)}}" style="color: #fff"><strong>  Ver Itinerario</strong></a></div>
                        || <div class="btn btn-xs btn-success"><span class="glyphicon glyphicon-map-marker"></span> <a href="{{url('mapas/')}}" style="color: #fff"><strong>  Ver Mapas</strong></a></div>
                    </td>
                    <td>
                        <div class='button_action' style='text-align:right'>

                            <div style='float: left; margin-left: 3px'>
                                @if($k->estado==1)
                                    {{ Form::open(['method' => 'POST', 'url' => ['estado']]) }}
                                    <input type="hidden" name="idpt" value="{{$k->id_paquete_tur}}">
                                    <fieldset class="buttons">
                                        <button class="btn btn-xs btn-danger">
                                            <i class='fa fa-ban'></i> Desactivar
                                        </button>
                                    </fieldset>
                                    {{ Form::close() }}
                                @elseif($k->estado==0)
                                    {{ Form::open(['method' => 'POST', 'url' => ['estado']]) }}
                                    <input type="hidden" name="idpt" value="{{$k->id_paquete_tur}}">
                                    <fieldset class="buttons">
                                        <button class="btn btn-xs btn-success">
                                            <i class='fa fa-check'></i>Activar
                                        </button>
                                    </fieldset>
                                    {{ Form::close() }}
                                @endif
                            </div>

                            <a class='btn btn-xs btn-primary' title='Detalles' href='{{url('/paquetesTuristicos/'.$k->id_paquete_tur)}}'>
                                <i class='fa fa-eye'></i>
                            </a>

                            <a class='btn btn-xs btn-success' title='Editar' href='{{url('/paquetesTuristicos/'.$k->id_paquete_tur.'/edit')}}'>
                                <i class='fa fa-pencil'></i>
                            </a>

                            <div style='float: right; margin-left: 3px'>
                                {{ Form::open(['method' => 'DELETE', 'route' => ['paquetesTuristicos.destroy', $k->id_paquete_tur]]) }}
                                <fieldset class="buttons">
                                    <button class="delete btn btn-xs btn-danger" onclick="return confirm('¿Está seguro que desea eliminar el registro?');">
                                        <span class="fa fa-trash"></span>
                                    </button>
                                </fieldset>
                                {{ Form::close() }}
                            </div>

                        </div></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
        </div>
    </div>
</section><!-- /.content -->
@endsection