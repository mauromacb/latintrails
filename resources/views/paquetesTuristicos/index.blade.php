@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
<section class="content-header">
    <h1>
        <i class="fa fa-glass"></i>  Paquetes Turisticos

        <!--START BUTTON -->

        <a href="#" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
            <i class="fa fa-table"></i> Ver
        </a>


        <a href="#" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
            <i class="fa fa-plus-circle"></i> Agregar
        </a>
        <!--ADD ACTIon-->
        <!-- END BUTTON -->
    </h1>


    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Paquetes Turisticos</li>
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
                    <th>Id</th>
                    <th>Título</th>
                    <th>Status</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Título</th>
                    <th>Status</th>
                    <th>Acción</th>
                </tr>
                </tfoot>
                <tbody>

                <tr>

                    <td>Paquete Turístico</td>
                    <td>Título Paquete Turístico</td>

                    <td><span class="label label-warning">Inactivo</span></td>
                    <td><div class="button_action" style="text-align:right"><a class="btn btn-xs btn-success" title="Set Active" href="#"><i class="fa fa-check"></i> Activar</a>&nbsp;

                            <a class="btn btn-xs btn-primary" title="Detail Data" href="#"><i class="fa fa-eye"></i></a>


                            <a class="btn btn-xs btn-success" title="Edit Data" href="#"><i class="fa fa-pencil"></i></a>

                            <a class="btn btn-xs btn-warning" title="Delete" href="javascript:;" onclick="swal({
        title: &quot;Are you sure ?&quot;,
        text: &quot;You will not be able to recover this record data!&quot;,
        type: &quot;warning&quot;,
        showCancelButton: true,
        confirmButtonColor: &quot;#DD6B55&quot;,
        confirmButtonText: &quot;Yes!&quot;,
        closeOnConfirm: false },
        function(){  location.href=&quot;https://crudbooster.com/demoo/public/admin/products/delete/1250&quot; });"><i class="fa fa-trash"></i></a>

                        </div></td>
                </tr>

                @foreach($paquete_turistico as $k)
                <tr>
                    <td><a href="#" class="small-box-footer">{{$k->id_paquete_tur}}<i class="fa fa-arrow-circle-right"></i></a></td>
                    <td>{{$k->titulo}}</td>
                    <td><span class="label label-success">Activo</span></td>
                    <td>
                        <div class='button_action' style='text-align:right'>
                            <a class='btn btn-xs btn-danger' title='Set Unactive' href='#'>
                                <i class='fa fa-ban'></i> Desactivar
                            </a>&nbsp;
                            <a class='btn btn-xs btn-primary' title='Detail Data' href='/paquetesTuristicos'>
                                <i class='fa fa-eye'></i>
                            </a>

                            <a class='btn btn-xs btn-success' title='Edit Data' href='/paquetesTuristicos/{{$k->id_paquete_tur}}/edit'>
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