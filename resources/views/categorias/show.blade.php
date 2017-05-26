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
                        <div>

                            <p><a title="Return" href="/categorias"><i class="fa fa-chevron-circle-left "></i> &nbsp; Regresar</a></p>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <strong><i class="fa fa-archive"></i> Detalle</strong>
                                </div>

                                <div class="panel-body" style="padding:20px 0px 0px 0px">
                                    <form class="form-horizontal" method="post" id="form" enctype="multipart/form-data" action="https://crudbooster.com/demoo/public/admin/category/edit-save/7">
                                        <input type="hidden" name="_token" value="7dH0F3dhtMOUPgGxbYORsWo84ftqhqXN7WyfFjco">
                                        <div class="box-body">

                                            <style type="text/css">
                                                #table-detail tr td:first-child {
                                                    font-weight: bold;
                                                    width: 25%;
                                                }
                                            </style>
                                            <div class="table-responsive">
                                                <table id="table-detail" class="table table-striped">
                                                    <tbody>
                                                        <tr>
                                                            <td>{{$categoria->titulo_categoria}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div><!-- /.box-body -->

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
        </div>
    </div>
@endsection
