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
                            <i class="fa fa-archive"></i>  Hoteles &nbsp;&nbsp;
                            <!--START BUTTON -->
                            <a href="<?php echo $_SERVER['REQUEST_URI'];?>" id="btn_show_data" class="btn btn-sm btn-primary" title="Ver todos">
                                <i class="fa fa-table"></i> Ver todos
                            </a>
                            <a href="<?php echo $_SERVER['REQUEST_URI'];?>/create" id="btn_add_new_data" class="btn btn-sm btn-success" title="Agregar nuevo">
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
                        <table id="lista" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
                            @foreach($items as $k)
                                <tr>
                                    <td><a href="{{url('hoteles/'.$k->id_hotel)}}" class="small-box-footer">{{$k->nombre}} <i class="fa fa-arrow-circle-right"></i></a></td>
                                    <td>
                                        <div class='' style='text-align:right'>
                                            <a class='btn btn-xs btn-primary' title='Ver' href='{{url('hoteles/'.$k->id_hotel)}}'> <i class='fa fa-eye'></i></a>
                                            <a class='btn btn-xs btn-success' title='Editar' href='{{url('hoteles/'.$k->id_hotel.'/edit')}}'><i class='fa fa-pencil'></i></a>
                                            <div style='float: right; margin-left: 3px'>
                                            {{ Form::open(['method' => 'DELETE', 'route' => ['hoteles.destroy', $k->id_hotel]]) }}
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
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
        </div>
    </div>
@endsection
