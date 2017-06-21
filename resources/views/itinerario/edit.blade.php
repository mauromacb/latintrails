@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('Paquetes Turísticos') }}
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
@endsection


@section('main-content')
    <section class="content-header">
        <h1>
            <i class="fa fa-glass"></i><a href="{{url('paquetesTuristicos')}}">{{$paquete_turistico[0]->titulo}}</a> > Editar Itinerario
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Itinerario</li>
        </ol>
    </section>


    <!-- Main content -->
    <section id="content_section" class="content">
        <!-- Your Page Content Here -->
            <p><a title="Return" href="{{url('/itinerario/'.$paquete_turistico[0]->id_paquete_tur)}}"><i class="fa fa-chevron-circle-left "></i> Atrás</a></p>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong><i class="fa fa-glass"></i> Agregar Itinerario</strong>
                </div>

                <div class="panel-body" style="padding:20px 0px 0px 0px">


                    {{ Form::model($itinerario, array('route' => array('itinerario.update', $itinerario->id_itinerario), 'method' => 'PUT','class' => 'form-horizontal')) }}


                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="idpt" value="{{$itinerario->id_paquete_tur}}">

                    <style>
                        .select2-container--default .select2-selection--single {border-radius: 0px !important}
                        .select2-container .select2-selection--single {height: 35px}
                    </style>

                    <div class="form-group header-group-0 " id="form-group-name" style="">
                        <label class="control-label col-sm-2">Día <span class="text-danger" title="This field is required">*</span></label>

                        <div class="col-sm-10">
                            <input type="text" required="" placeholder="" maxlength="70" class="form-control" name="dia" id="dia" value="{{$itinerario->dia}}">

                        </div>
                    </div>
                    <div class="form-group header-group-0 " id="form-group-description" style="">
                        <label class="control-label col-sm-2">Descripción <span class="text-danger" title="This field is required">*</span></label>
                        <div class="col-sm-10">
                            <textarea name="descripcion" id="descripcion" rows="10" cols="80">{{$itinerario->descripcion}}</textarea>
                        </div>
                    </div>


                    <div class="box-footer" style="background: #F5F5F5">

                        <div class="form-group">
                            <label class="control-label col-sm-2"></label>
                            <div class="col-sm-10">
                                <a href="{{url('paquetesTuristicos')}}" class="btn btn-default"><i class="fa fa-chevron-circle-left"></i> Atras</a>
                                <button type="submit" id="submitform" class="btn btn-success" onclick="validar();">Guardar</button>
                            </div>
                        </div>



                    </div><!-- /.box-footer-->
                    {!! Form::close() !!}

                </div>
            </div>

    </section><!-- /.content -->


@endsection