@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">

                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3>
                            <i class="fa fa-archive"></i>  Categorías &nbsp;&nbsp;
                            <!--START BUTTON -->

                            <a href="/categorias" id="btn_show_data" class="btn btn-sm btn-primary" title="Ver todos">
                                <i class="fa fa-table"></i> Ver todos
                            </a>


                            <a href="/categorias/create" id="btn_add_new_data" class="btn btn-sm btn-success" title="Agregar nuevo">
                                <i class="fa fa-plus-circle"></i> Agregar nuevo
                            </a>
                            <!--ADD ACTIon-->
                            <!-- END BUTTON -->
                        </h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i></button>

                        </div>
                    </div>
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
                                <td>Nombre</td>
                                <td>Acción</td>

                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <td>Nombre</td>
                                <td>Acción</td>

                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($categorias as $k)
                                <tr>
                                    <td><a href="categorias/{{$k->id_categoria}}" class="small-box-footer">{{$k->titulo_categoria}} <i class="fa fa-arrow-circle-right"></i></a></td>
                                    <td><div class='button_action' style='text-align:right'>&nbsp;

                                            <a class='btn btn-xs btn-primary' title='Ver' href='/categorias/{{$k->id_categoria}}'> <i class='fa fa-eye'></i></a>

                                            <a class='btn btn-xs btn-success' title='Editar' href='/categorias/{{$k->id_categoria}}/edit'><i class='fa fa-pencil'></i></a>

                                            {{ Form::open(['method' => 'DELETE', 'route' => ['categorias.destroy', $k->id_categoria]],array('style'=>'float: right; margin-left: 3px')) }}

                                                <fieldset class="buttons">
                                                    <button class="delete btn btn-xs btn-danger" onclick="return confirm('¿Está seguro que desea eliminar el registro?');">
                                                        <span class="fa fa-trash"></span>
                                                    </button>
                                                </fieldset>

                                            {{ Form::close() }}

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
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
        </div>
    </div>
@endsection
