@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('Paquetes Turísticos') }}
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
@endsection


@section('main-content')
    <section class="content-header">
        <h1>
            <i class="fa fa-archive"></i>  Itinerario
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
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong><i class="fa fa-glass"></i> Agregar Itinerario</strong>
                </div>

                <div class="panel-body" style="padding:20px 0px 0px 0px">


                    {{ Form::model($itinerario, array('route' => array('itinerario.update', $itinerario->id_itinerario), 'method' => 'PUT','class' => 'form-horizontal')) }}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <style>
                        .select2-container--default .select2-selection--single {border-radius: 0px !important}
                        .select2-container .select2-selection--single {height: 35px}
                    </style>

                    <div class="form-group header-group-0 " id="form-group-name">
                        <label class="control-label col-sm-2">Título<span class="text-danger" title="This field is required">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" maxlength="70" class="form-control" name="titulo" id="titulo" value="{{$itinerario->titulo}}" required>
                        </div>
                    </div>
                    <div class="form-group header-group-0 " id="form-group-name">
                        <label class="control-label col-sm-2">Subtítulo<span class="text-danger" title="This field is required">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" maxlength="70" class="form-control" name="subtitulo" id="subtitulo" value="{{$itinerario->subtitulo}}" required>
                        </div>
                    </div>

                    <div class="form-group header-group-0 " id="form-group-category_id" style="">
                        <label class="control-label col-sm-2">Categoria <span class="text-danger" title="This field is required">*</span></label>

                        <div class="col-sm-10">
                            <select style="width:100%" class="form-control " id="id_tipo_itinerario" name="id_tipo_itinerario">
                                <option value="SELECCIONE UNO">SELECCIONE UNO</option>
                                @foreach($items as $k)
                                    <option value="{{$k->id_tipo_itinerario}}" <?php if($itinerario->id_tipo_itinerario==$k->id_tipo_itinerario){echo 'selected';}?>>{{$k->descripcion}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group header-group-0 " id="form-group-description" style="">
                        <label class="control-label col-sm-2">Descripción Itinerario <span class="text-danger" title="This field is required">*</span></label>
                        <div class="col-sm-10">
                            <textarea name="descripcion" id="descripcion" rows="10" cols="80">{{$itinerario->descripcion}}</textarea>
                        </div>
                    </div>


                    <div class="box-footer" style="background: #F5F5F5">

                        <div class="form-group">
                            <label class="control-label col-sm-2"></label>
                            <div class="col-sm-10">
                                <a href="{{url('itinerario')}}" class="btn btn-default"><i class="fa fa-chevron-circle-left"></i> Atras</a>
                                <button type="submit" id="submitform" class="btn btn-success" onclick="validar();">Guardar</button>
                            </div>
                        </div>



                    </div><!-- /.box-footer-->
                    {!! Form::close() !!}

                </div>
            </div>

    </div><!-- /.content -->


@endsection