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

                    <td>Paquete Turistico</td>
                    <td>Titulo Paquete Turistico</td>

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

                @for($i=1; $i<=20; $i++)
                <tr>
                        <td><a href="#" class="small-box-footer">171717{{$i}}<i class="fa fa-arrow-circle-right"></i></a></td>
                        <td>Paquete Turistico {{$i+1}}</td>
                    <td><span class="label label-success">Activo</span></td>
                    <td><div class='button_action' style='text-align:right'><a class='btn btn-xs btn-danger' title='Set Unactive' href='https://crudbooster.com/demoo/public/admin/products/set-unactive/1249'><i class='fa fa-ban'></i> Set Unactive</a>&nbsp;



                            <a class='btn btn-xs btn-primary' title='Detail Data' href='/paquetesTuristicos'><i class='fa fa-eye'></i></a>


                            <a class='btn btn-xs btn-success' title='Edit Data' href='/paquetesTuristicos/{{$i+1}}/edit'><i class='fa fa-pencil'></i></a>

                            <a class='btn btn-xs btn-warning' title='Delete' href='javascript:;' onclick='swal({
				title: "Are you sure ?",
				text: "You will not be able to recover this record data!",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes!",
				closeOnConfirm: false },
				function(){  location.href="#" });'><i class='fa fa-trash'></i></a>

                        </div></td>
                    </tr>
                    @endfor
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