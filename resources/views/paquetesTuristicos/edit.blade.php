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

            <div class="panel-body" style="padding:20px 0px 0px 0px">
                <form class="form-horizontal" method="post" id="form" enctype="multipart/form-data" action="https://crudbooster.com/demoo/public/admin/products/edit-save/1246">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">


                        <style>
                            .select2-container--default .select2-selection--single {border-radius: 0px !important}
                            .select2-container .select2-selection--single {height: 35px}
                        </style>

                        <div class="form-group header-group-0 " id="form-group-name" style="">
                            <label class="control-label col-sm-2">Nombre <span class="text-danger" title="This field is required">*</span></label>

                            <div class="col-sm-10">
                                <input type="text" title="nombre" required="" placeholder="" maxlength="70" class="form-control" name="name" id="name" value="{{$item->titulo}}">

                                <div class="text-danger"></div>
                                <p class="help-block"></p>

                            </div>
                        </div>								<div class="form-group header-group-0 " id="form-group-description" style="">
                            <label class="control-label col-sm-2">Descripcion <span class="text-danger" title="This field is required">*</span></label>
                            <div class="col-sm-10">
                                <textarea name="descripcion" id="descripcion" required="" maxlength="5000" class="form-control" rows="5">
                                    {{$item->descripcion}}
                                </textarea>
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
                                <input type="text" title="Precio" required="" class="form-control inputMoney" name="precio" id="precio" value="${{$item->precio}}">
                                <div class="text-danger"></div>
                                <p class="help-block"></p>
                            </div>
                        </div>								<div class="form-group header-group-0 " id="form-group-status" style="">
                            <label class="control-label col-sm-2">Status <span class="text-danger" title="This field is required">*</span></label>

                            <div class="col-sm-10">

                                <label class="radio-inline">
                                    <input type="radio" name="status" required="" value="Active" @if($item->status==1)checked @endif> Active

                                </label>


                                <label class="radio-inline">
                                    <input type="radio" name="status" value="Unactive" @if($item->status==0)checked @endif> Unactive
                                </label>


                                <div class="text-danger"></div>
                                <p class="help-block"></p>

                            </div>
                        </div>								<script>
                            $(function() {
                                $('#category_id').select2({
                                    placeholder: {
                                        id: '-1',
                                        text: '** Please select a Category'
                                    },
                                    allowClear: true,
                                    ajax: {
                                        url: 'https://crudbooster.com/demoo/public/admin/products/find-data',
                                        delay: 250,
                                        data: function (params) {
                                            var query = {
                                                q: params.term,
                                                format: "",
                                                table1: "category",
                                                column1: "name",
                                                table2: "",
                                                column2: "",
                                                table3: "",
                                                column3: "",
                                                where: ""
                                            }
                                            return query;
                                        },
                                        processResults: function (data) {
                                            return {
                                                results: data.items
                                            };
                                        }
                                    },
                                    escapeMarkup: function (markup) { return markup; },
                                    minimumInputLength: 1,
                                    initSelection: function(element, callback) {
                                        var id = $(element).val()?$(element).val():"6";
                                        if(id!=='') {
                                            $.ajax('https://crudbooster.com/demoo/public/admin/products/find-data', {
                                                data: {
                                                    id: id,
                                                    format: "",
                                                    table1: "category",
                                                    column1: "name",
                                                    table2: "",
                                                    column2: "",
                                                    table3: "",
                                                    column3: ""
                                                },
                                                dataType: "json"
                                            }).done(function(data) {
                                                callback(data.items[0]);
                                                $('#category_id').html("<option value='"+data.items[0].id+"' selected >"+data.items[0].text+"</option>");
                                            });
                                        }
                                    }


                                });

                            })
                        </script>


                        <div class="form-group header-group-0 " id="form-group-category_id" style="">
                            <label class="control-label col-sm-2">Categoria <span class="text-danger" title="This field is required">*</span></label>

                            <div class="col-sm-10">
                                <select style="width:100%" class="form-control " id="categoria_id" required="" name="categoria_id" tabindex="-1" aria-hidden="true">
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
                                            <a class="btn btn-primary btn-sm btn-add" href="javascript:void(0)" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Agregar</a>
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
                                            <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="table-stock" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Description: activate to sort column descending" style="width: 254px;">Descripcion</th><th class="sorting" tabindex="0" aria-controls="table-stock" rowspan="1" colspan="1" aria-label="Stock In: activate to sort column ascending" style="width: 175px;">Dia</th>
                                                <th width="90px" class="sorting" tabindex="0" aria-controls="table-stock" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 90px;">Action</th></tr>
                                            </thead>
                                            <tbody>

                                            @foreach($itinerario as $k)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">{{$k->descripcion}}</td>
                                                    <td>{{$k->dia}}</td>
                                                    <td>
                                                        <a href="javascript:void(0)" data-id="3739" class="btn btn-sm btn-success btn-edit"><i class="fa fa-pencil"></i></a>
                                                        <a href="javascript:void(0)" data-id="3739" class="btn btn-sm btn-warning btn-delete"><i class="fa fa-trash"></i></a>
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


                                <input type="submit" name="submit" value="Guardar" class="btn btn-success">

                            </div>
                        </div>



                    </div><!-- /.box-footer-->

                </form>

            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                            <h4 class="modal-title" id="myModalLabel">Itinerarios</h4>
                        </div>
                        <div class="modal-body" id="resultado">
                            <form method="POST" name="form1" id="form1" action="/nuevoItinerario">
                                {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group header-group-0 " id="form-group-name" style="">
                                    <label class="control-label col-sm-2">Dia: <span class="text-danger" title="Este campo es requerido">*</span></label>
                                    <div class="col-sm-10">

                                        <input type="hidden" name="idpaquetetur" id="idpaquetetur" value="{{$item->id_paquete_tur}}">
                                        <input type="text" maxlength="70" class="form-control" name="dia" id="dia" required>
                                    </div>
                                </div>
                                <div class="form-group header-group-0 " id="form-group-name" style="">
                                    <label class="control-label col-sm-2">Descripción: <span class="text-danger" title="Este campo es requerido">*</span></label>
                                    <div class="col-sm-10">
                                        <textarea name="descripcion" id="descripcion" required="" maxlength="5000" class="form-control" rows="5">
                                        </textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer" style="background: #F5F5F5">
                                <div class="form-group">
                                    <div class="col-sm-10">
                                        <input type="submit" name="submit" value="Guardar" class="btn btn-primary" >
                                        <button type="button" data-dismiss="modal" class="btn btn-danger">Cerrar</button>
                                    </div>
                                </div>
                            </div><!-- /.box-footer-->
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            </div>
        </div>
    </div><!--END AUTO MARGIN-->

</section><!-- /.content -->

<script language="javascript">

    function myFunction() {
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
                    $('#resultado').html('<form method="POST" name="form2" id="form2"><input type="hidden" name="idpaquetetur" id="idpaquetetur" value="<?php echo $item->id_paquete_tur;?>"><h1 align="center" style="color:#008011">'+data+'</h1><br><input type="submit" name="submit" value="Cerrar" class="btn btn-danger" onclick="cerrarItinerario()" ></form>');
                }
            })

            return false;
        });
    }

    function cerrarItinerario() {
        alert();
        $("#form2").submit(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            alert($(this).attr('action'));
            $.ajax({
                type: 'POST',
                url: '/mostrarItinerario',
                data: $(this).serialize(),
                success: function (data) {
                    $('#myModal').modal('hide');
                    $('#result').html(data);
                }
            })

            return false;
        });
    }


</script>
@endsection