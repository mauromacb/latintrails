@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <section class="content-header">
        <h1>
            <i class="fa fa-archive"></i>  Día de Itinerario
            <!--START BUTTON -->
            <a href="{{url('showItinerario/'.$itinerario->id_itinerario)}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Ver todos">
                <i class="fa fa-table"></i> Ver todos
            </a>
            <a href="{{url('dia/createItinerario/'.$itinerario->id_itinerario)}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Agregar nuevo">
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
        <p><a title="Return" href="{{url('showItinerario/'.$itinerario->id_itinerario)}}"><i class="fa fa-chevron-circle-left "></i> Atrás</a></p>
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <!-- Default box -->
                <div class="box">
                    <div class="box-body">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                {{ Html::ul($errors->all()) }}
                            </div>
                        @endif
                        {!! Form::open(array('route' => 'dia.store','method'=>'POST', 'class' => 'form-horizontal')) !!}
                            <input type="hidden" name="conitinerario" value="1">
                        <div class="box-body">
                            <div class="form-group header-group-0 " id="form-group-category_id" style="">
                                <label class="control-label col-sm-2">Categoría de Itinerario <span class="text-danger" title="This field is required">*</span></label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="id_categoria_itinerario" value="{{$categoriaItinerario->id_categoria_itinerario}}"><strong>{{$categoriaItinerario->descripcion}}</strong>
                                </div>
                            </div>
                            <div class="form-group header-group-0 " id="form-group-category_id" style="">
                                <label class="control-label col-sm-2">Itinerario <span class="text-danger" title="This field is required">*</span></label>
                                <div class="col-sm-10">
                                        @foreach($itinerarioLista as $k)
                                            @if($itinerario->id_itinerario==$k->id_itinerario)
                                            <input type="hidden" name="id_itinerario" value="{{$k->id_itinerario}}" ><strong>{{$k->titulo}}</strong>
                                            @endif
                                        @endforeach
                                </div>
                            </div>
                            <div class="form-group header-group-0 " id="form-group-name" style="">
                                <label class="control-label col-sm-2">Día: <span class="text-danger" title="Este campo es requerido">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="Ingrese el día" maxlength="70" class="form-control" name="titulo" id="titulo" required>
                                </div>
                            </div>

                            <div class="form-group header-group-0 " id="form-group-name" style="">
                                <label class="control-label col-sm-2">Descripción: <span class="text-danger" title="Este campo es requerido">*</span></label>
                                <div class="col-sm-10">
                                    <textarea name="descripcion" id="descripcion" rows="10" cols="80"></textarea>
                                </div>
                            </div>

                        </div>

                        <div class="box-footer" style="background: #F5F5F5">
                            <div class="form-group">
                                <label class="control-label col-sm-2"></label>
                                <div class="col-sm-10">
                                    <a href="{{url('dia')}}" class="btn btn-default"><i class="fa fa-chevron-circle-left"></i> Atras</a>
                                    <input type="submit" name="submit" value="Guardar" class="btn btn-success">
                                </div>
                            </div>
                        </div><!-- /.box-footer-->

                        {!! Form::close() !!}
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
        </div>
    </div>
@endsection
