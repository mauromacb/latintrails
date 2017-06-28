@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('Paquetes Turísticos') }}
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
@endsection


@section('main-content')
    <section class="content-header">
        <h1>
            <i class="fa fa-archive"></i> {{$itinerario->titulo}} || Itinerario
            <!--START BUTTON -->
            <a href="{{url('itinerario')}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Ver todos">
                <i class="fa fa-table"></i> Ver todos
            </a>
            <a href="{{url('itinerario/create')}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Agregar nuevo">
                <i class="fa fa-plus-circle"></i> Agregar nuevo
            </a>
            <!-- END BUTTON -->
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Tipo Itinerario</li>
        </ol>
    </section>


    <div class="container-fluid spark-screen">
        <p><a title="Return" href="{{url('itinerario')}}"><i class="fa fa-chevron-circle-left "></i> Atrás</a></p>
        <div class="panel panel-default form-horizontal">
            <div class="panel-body" style="padding:20px 0px 0px 0px">
                <style>
                    .select2-container--default .select2-selection--single {border-radius: 0px !important}
                    .select2-container .select2-selection--single {height: 35px}
                </style>

                <div class="form-group header-group-0 " id="form-group-name" style="">
                    <div class="col-sm-12" align="center">
                        <h2><strong>{{$itinerario->titulo}}</strong></h2><br>
                        <span>{{$itinerario->subtitulo}}</span>
                    </div>
                </div>
                <div class="form-group header-group-0 " id="form-group-description" style="">
                    <div class="col-sm-12" align="center">
                        <?php echo $itinerario->descripcion; ?>
                    </div>
                </div>

                <div class="form-group header-group-0 " id="form-group-stock">

                    <label class="control-label col-sm-1"></label>
                    <div class="col-sm-10">
                        <div class="box box-default" style="box-shadow:0px 0px 5px #ccc">
                            <div class="box-header">
                                <h1 class="box-title">Itinerario</h1>
                            </div>
                            <div class="box-body" id="itinerarios">
                                @include('itinerario.itinerarioLista', ['item'=>$dias, 'itinerario'=>$itinerario])
                            </div>

                            <!-- /.box-body -->
                        </div>
                    </div>
                </div>

                <div class="box-footer" style="background: #F5F5F5">
                    <div class="form-group">
                        <label class="control-label col-sm-2"></label>
                        <div class="col-sm-10">
                            <a href="{{url('itinerario')}}" class="btn btn-default"><i class="fa fa-chevron-circle-left"></i> Atras</a>
                        </div>
                    </div>
                </div><!-- /.box-footer-->
            </div>
        </div>

    </div><!-- /.content -->


@endsection