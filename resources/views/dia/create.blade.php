@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <section class="content-header">
        <h1>
            <i class="fa fa-archive"></i>  Días
            <!--START BUTTON -->
            <a href="{{url('categoriaItinerario')}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Ver todos">
                <i class="fa fa-table"></i> Ver todos
            </a>
            <a href="{{url('categoriaItinerario/create')}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Agregar nuevo">
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
        <p><a title="Return" href="{{url('categoriaItinerario')}}"><i class="fa fa-chevron-circle-left "></i> Atrás</a></p>
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
                        {!! Form::model($item, ['action' => 'DiaItinerarioController@store']) !!}
                        <div class="box-body">
                            <div class="form-group header-group-0 " id="form-group-name" style="">
                                <label class="control-label col-sm-2">Día: <span class="text-danger" title="Este campo es requerido">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="Ingrese el día" maxlength="70" class="form-control" name="dia" id="dia" required>
                                </div>
                            </div>
                            <div class="form-group header-group-0 " id="form-group-category_id" style="">
                                <label class="control-label col-sm-2">Itinerario <span class="text-danger" title="This field is required">*</span></label>

                                <div class="col-sm-10">
                                    <select style="width:100%" class="form-control " id="id_itinerario" name="id_itinerario">
                                        <option value="SELECCIONE UNO" selected>SELECCIONE UNO</option>
                                        @foreach($itinerarioLista as $k)
                                            <option value="{{$k->id_itinerario}}" >{{$k->titulo}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group header-group-0 " id="form-group-name" style="">
                                <label class="control-label col-sm-2">Descripción: <span class="text-danger" title="Este campo es requerido">*</span></label>
                                <div class="col-sm-10">
                                    <textarea placeholder="Ingrese la descripción" name="descripcion" id="descripcion" required></textarea>
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
