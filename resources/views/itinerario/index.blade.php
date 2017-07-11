<?php use App\CategoriaItinerario as categoriaItinerario;?>
@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
<section class="content-header">
    <h1>
        <i class="fa fa-glass"></i> Itinerarios
        <!--START BUTTON -->
        <a href="{{url('/itinerario')}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
            <i class="fa fa-table"></i> Ver
        </a>
        <a href="{{url('/itinerario/create')}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
            <i class="fa fa-plus-circle"></i> Agregar itinerario
        </a>
        <!-- END BUTTON -->
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Itinerario</li>
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
            <table id="lista" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Categoría de Itinerario</th>
                    <th>Itinerario</th>
                    <th>Calendario</th>
                    <th>Días</th>
                    <th>Mapa</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Categoría de Itinerario</th>
                    <th>Itinerario</th>
                    <th>Calendario</th>
                    <th>Días</th>
                    <th>Mapa</th>
                    <th>Acción</th>
                </tr>
                </tfoot>
                <tbody class="{{$i=0}}">

                @foreach($itinerarios as $k)
                <tr>
                    <td class="{{$categoriaItinerario=categoriaItinerario::where('id_categoria_itinerario',$k->id_categoria_itinerario)->first()}}">
                        <strong>{{$categoriaItinerario->descripcion}}</strong>
                    </td>
                    <td>
                        <a href="{{url('itinerario/'.$k->id_itinerario)}}" class="small-box-footer">
                            <i class="fa fa-arrow-circle-right"></i> <strong>{{$k->titulo}}</strong>
                        </a>
                    </td>
                    <td>
                        @if($categoriaItinerario->fecha_fija==1)
                            {{--<button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModal" onclick="calendario({{$k->id_itinerario}})"></button>--}}
                            <div class="btn btn-xs btn-success">
                                <span class="glyphicon glyphicon-calendar"></span>
                                <a href="{{url('calendarios/'.$k->id_itinerario)}}" style="color: #fff">
                                    Asignar/Ver Calendario
                                </a>
                            </div>
                        @else
                            <span class="btn btn-xs btn-warning">Sin Calendario</span>
                        @endif
                    </td>
                    <td>
                        <div class="btn btn-xs btn-primary">
                            <span class="glyphicon glyphicon-list"></span>
                            <a href="{{url('showItinerario/'.$k->id_itinerario)}}" style="color: #fff">
                                <strong>  Asignar/Ver Días</strong>
                            </a>
                        </div>
                    </td>
                    <td>
                        <div class="btn btn-xs btn-warning">
                            <span class="glyphicon glyphicon-map-marker"></span>
                            <a href="{{url('mapas/'.$k->id_itinerario)}}" style="color: #fff">
                                <strong>  Mapa turísttico</strong>
                            </a>
                        </div>
                    </td>
                    <td>
                        <div class='button_action' style='text-align:right' id="{{$i++}}">
                            <a class='btn btn-xs btn-primary' title='Detalles' href='{{url('/itinerario/'.$k->id_itinerario)}}'>
                                <i class='fa fa-eye'></i>
                            </a>
                            <a class='btn btn-xs btn-success' title='Editar' href='{{url('/itinerario/'.$k->id_itinerario.'/edit')}}'>
                                <i class='fa fa-pencil'></i>
                            </a>
                            <div style='float: right; margin-left: 3px'>
                                {{ Form::open(['method' => 'DELETE', 'route' => ['itinerario.destroy', $k->id_itinerario]]) }}
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

<script>
    function calendario(id){
        var url='{{url('calendarios')}}/'+id;

        $('#iframe').attr('src', url);
        $('#iframe').reload();
    }

</script>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" onclick="calendario()">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Calendario</h4>
            </div>
            <div class="modal-body" id="iframes">
                <iframe src="" style="zoom:0.60" width="99.6%" height="250" frameborder="0" id="iframe"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>
@endsection