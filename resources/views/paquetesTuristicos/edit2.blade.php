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
                    <input type="hidden" name="return_url" value="https://crudbooster.com/demoo/public/admin/products?m=13">
                    <input type="hidden" name="ref_mainpath" value="https://crudbooster.com/demoo/public/admin/products">
                    <input type="hidden" name="ref_parameter" value="return_url=https://crudbooster.com/demoo/public/admin/products?m=13&amp;parent_id=&amp;parent_field=">
                    <div class="box-body">

                        <link rel="stylesheet" href="https://crudbooster.com/demoo/public/vendor/crudbooster/assets/select2/dist/css/select2.min.css">
                        <script src="https://crudbooster.com/demoo/public/vendor/crudbooster/assets/select2/dist/js/select2.full.min.js"></script>
                        <style>
                            .select2-container--default .select2-selection--single {border-radius: 0px !important}
                            .select2-container .select2-selection--single {height: 35px}
                        </style>

                        <div class="form-group header-group-0 " id="form-group-name" style="">
                            <label class="control-label col-sm-2">Nombre <span class="text-danger" title="This field is required">*</span></label>

                            <div class="col-sm-10">
                                <input type="text" title="nombre" required="" placeholder="You can only enter the letter only" maxlength="70" class="form-control" name="name" id="name" value="Andes & Amazon Tour 14 days - 13 nights">

                                <div class="text-danger"></div>
                                <p class="help-block"></p>

                            </div>
                        </div>								<div class="form-group header-group-0 " id="form-group-description" style="">
                            <label class="control-label col-sm-2">Descripcion <span class="text-danger" title="This field is required">*</span></label>
                            <div class="col-sm-10">
                                <textarea name="descripcion" id="descripcion" required="" maxlength="5000" class="form-control" rows="5">The best of the Andes region in Ecuador, and the magic of the Amazon in one tour. Visit the snow-capped volcanoes, taste the traditional cuisine, perceive the aromas of the Andean culture, travel in of the most difficult train of the world. And, of course, visit two of the most beautiful colonial cities in the country, Cuenca and Quito
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
                                <input type="text" title="Precio" required="" class="form-control inputMoney" name="precio" id="precio" value="$1500">
                                <div class="text-danger"></div>
                                <p class="help-block"></p>
                            </div>
                        </div>								<div class="form-group header-group-0 " id="form-group-status" style="">
                            <label class="control-label col-sm-2">Status <span class="text-danger" title="This field is required">*</span></label>

                            <div class="col-sm-10">

                                <label class="radio-inline">
                                    <input type="radio" name="status" required="" value="Active"> Active
                                </label>


                                <label class="radio-inline">
                                    <input type="radio" checked="" name="status" value="Unactive"> Unactive
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
                                    <option value="1" selected="">Amazons</option>
                                    <option value="2" >Galapagos</option>
                                    <option value="3" >Pacific Coast</option>
                                    <option value="4" >The Andes</option>
                                </select>

                                <div class="text-danger"></div>
                                <p class="help-block"></p>

                            </div>
                        </div>								<div class="form-group header-group-0 " id="form-group-stock">

                            <label class="control-label col-sm-2">Itinerario</label>
                            <div class="col-sm-10">

                                <div class="box box-default" style="box-shadow:0px 0px 5px #ccc">
                                    <div class="box-header">
                                        <h1 class="box-title">Itinerario</h1>
                                        <div class="box-tools">
                                            <a class="btn btn-primary btn-sm btn-add" href="javascript:void(0)"><i class="fa fa-plus"></i> Agregar</a>
                                        </div>
                                    </div>
                                    <div class="box-body">

                                        <input type="hidden" name="subtable[stock][fk]" value="products_id">
                                        <input type="hidden" name="subtable[stock][table]" value="stock">

                                        <div id="table-stock_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="table-stock_length"><label>Ver <select name="table-stock_length" aria-controls="table-stock" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> resultados</label></div></div><div class="col-sm-6"><div id="table-stock_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="table-stock"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="table-stock" class="table table-striped dataTable no-footer" role="grid" aria-describedby="table-stock_info">
                                                        <thead>
                                                        <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="table-stock" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Description: activate to sort column descending" style="width: 254px;">Descripcion</th><th class="sorting" tabindex="0" aria-controls="table-stock" rowspan="1" colspan="1" aria-label="Stock In: activate to sort column ascending" style="width: 175px;">Dia</th>
                                                            <th width="90px" class="sorting" tabindex="0" aria-controls="table-stock" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 90px;">Action</th></tr>
                                                        </thead>
                                                        <tbody>



                                                        <tr role="row" class="odd">

                                                            <td class="sorting_1">Bienvenida.</td>

                                                            <td>1</td>


                                                            <td>
                                                                <a href="javascript:void(0)" data-id="3740" class="btn btn-sm btn-success btn-edit"><i class="fa fa-pencil"></i></a>
                                                                <a href="javascript:void(0)" data-id="3740" class="btn btn-sm btn-warning btn-delete"><i class="fa fa-trash"></i></a>
                                                            </td>
                                                        </tr><tr role="row" class="even">

                                                            <td class="sorting_1">Initerario 1.</td>

                                                            <td>5</td>


                                                            <td>
                                                                <a href="javascript:void(0)" data-id="3741" class="btn btn-sm btn-success btn-edit"><i class="fa fa-pencil"></i></a>
                                                                <a href="javascript:void(0)" data-id="3741" class="btn btn-sm btn-warning btn-delete"><i class="fa fa-trash"></i></a>
                                                            </td>
                                                        </tr><tr role="row" class="odd">

                                                            <td class="sorting_1">Itinerario 2.</td>

                                                            <td>4</td>


                                                            <td>
                                                                <a href="javascript:void(0)" data-id="3739" class="btn btn-sm btn-success btn-edit"><i class="fa fa-pencil"></i></a>
                                                                <a href="javascript:void(0)" data-id="3739" class="btn btn-sm btn-warning btn-delete"><i class="fa fa-trash"></i></a>
                                                            </td>
                                                        </tr></tbody>
                                                    </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="table-stock_info" role="status" aria-live="polite">Viendo 1 a 3 de 3 resultados</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="table-stock_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="table-stock_previous"><a href="#" aria-controls="table-stock" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="table-stock" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button next disabled" id="table-stock_next"><a href="#" aria-controls="table-stock" data-dt-idx="2" tabindex="0">Next</a></li></ul></div></div></div></div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>


                                <div id="modal_add_stock" class="modal" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">�</span></button>
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
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">�</span></button>
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


                                <script type="text/javascript">
                                    $(function() {
                                        var parent_field = "products_id";
                                        var parent_id = "1246";

                                        $("#table-stock").DataTable();

                                        $('#form-group-stock .modal').on('hidden.bs.modal', function () {
                                            $(this).find('.form-content').empty();
                                        })

                                        $(document).on('click','#form-group-stock .btn-add',function() {
                                            var url = 'https://crudbooster.com/demoo/public/admin/stock/add-save';
                                            $('#modal_add_stock .btn-save').attr('data-url',url);
                                            $('#modal_add_stock').modal("show");
                                            $('#modal_add_stock .form-content').html("<p class='loading'><i class='fa fa-spin fa-spinner'></i> Please wait loading...</p>");
                                            $.get('https://crudbooster.com/demoo/public/admin/stock/add-raw?parent_field='+parent_field+'&parent_id='+parent_id,function(response) {
                                                $('#modal_add_stock .form-content').html(response);
                                            })
                                        })

                                        $(document).on('click','#table-stock .btn-edit',function() {
                                            var id = $(this).data('id');
                                            var url = 'https://crudbooster.com/demoo/public/admin/stock/edit-save/'+id;
                                            $('#modal_edit_stock .btn-save').attr('data-url',url);
                                            $('#modal_edit_stock').modal("show");
                                            $('#modal_edit_stock .form-content').html("<p class='loading'><i class='fa fa-spin fa-spinner'></i> Please wait loading...</p>");
                                            var is_temporary = '0';
                                            $.get('https://crudbooster.com/demoo/public/admin/stock/edit-raw/'+id+'?parent_field='+parent_field+'&parent_id='+parent_id+'&temporary='+is_temporary,function(response) {
                                                $('#modal_edit_stock .form-content').html(response);
                                            })
                                        })

                                        $(document).on('click','#table-stock .btn-delete',function() {
                                            var id = $(this).data('id');

                                            swal({
                                                        title: "Are you sure ?",
                                                        text: "You will not be able to recover this record data!",
                                                        type: "warning",
                                                        showCancelButton: true,
                                                        confirmButtonColor: "#DD6B55",
                                                        confirmButtonText: "Yes, delete it!",
                                                        closeOnConfirm: false
                                                    },
                                                    function(){
                                                        var url = 'https://crudbooster.com/demoo/public/admin/stock/delete/'+id;
                                                        $.get(url,function(response) {
                                                            sweetAlert("Oops..",response.message,response.message_type);
                                                            $("#table-stock").DataTable().destroy();
                                                            $.get("https://crudbooster.com/demoo/public/admin/products/edit/1246?parent_field=&amp;parent_id=&amp;return_url=https%3A%2F%2Fcrudbooster.com%2Fdemoo%2Fpublic%2Fadmin%2Fproducts%3Fm%3D13",function(html) {
                                                                var tableHtml = $(html).find("#table-stock").html();
                                                                $('#table-stock').html(tableHtml);
                                                                $("#table-stock").DataTable();
                                                            })
                                                        })
                                                    });


                                        });

                                        $('#form-group-stock .btn-save').click(function() {
                                            var data = new FormData();
                                            var url = $(this).data('url');
                                            var modal_handel = $(this).parent().parent().parent().parent();

                                            var required_error = false;
                                            modal_handel.find("input,select,textarea,radio").each(function() {
                                                var v = $(this).val();
                                                var key = $(this).attr('name');
                                                var type = $(this).attr('type');

                                                if($(this).prop('required')) {
                                                    if(v == '') {
                                                        $(this).parent().parent().addClass('has-error');
                                                        required_error = true;
                                                        return true;
                                                    }else{
                                                        $(this).parent().parent().removeClass('has-error');
                                                    }
                                                }

                                                if(type == 'file') {
                                                    data.append(key,$(this)[0].files[0]);
                                                }else{
                                                    data.append(key,v);
                                                }
                                            })

                                            if(required_error==false) {
                                                modal_handel.find("input,select,textarea,radio").not("[type=hidden]").val("");
                                                $.ajax({
                                                    url: url,
                                                    data: data,
                                                    async: false,
                                                    cache: false,
                                                    contentType: false,
                                                    processData: false,
                                                    type: 'POST',
                                                    success: function ( data ) {
                                                        if(data.message_type == 'success') {
                                                            sweetAlert("Stock", data.message, data.message_type);

                                                            $("#table-stock").DataTable().destroy();

                                                            $.get("https://crudbooster.com/demoo/public/admin/products/edit/1246?parent_field=&amp;parent_id=&amp;return_url=https%3A%2F%2Fcrudbooster.com%2Fdemoo%2Fpublic%2Fadmin%2Fproducts%3Fm%3D13",function(html) {
                                                                var tableHtml = $(html).find("#table-stock").html();
                                                                $('#table-stock').html(tableHtml);
                                                                $("#table-stock").DataTable();
                                                            })
                                                            modal_handel.modal('hide');
                                                        }else{
                                                            sweetAlert("Stock", data.message, data.message_type);
                                                        }

                                                    },
                                                    error:function() {
                                                        sweetAlert("Stock",'Okay, It is embarasing, something went wrong, we will fix it soon !','error');
                                                    }
                                                })
                                            }else{
                                                sweetAlert("Oops...", "Please make sure to fill out all the required fields correctly", "error");
                                            }

                                        })
                                    })
                                </script>

                            </div>
                        </div>
                    </div><!-- /.box-body -->

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

            </div>
        </div>
    </div><!--END AUTO MARGIN-->

</section><!-- /.content -->
@endsection