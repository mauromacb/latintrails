@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <section class="content-header">
        <h1>
            <i class="fa fa-archive"></i> <strong>{{$item->titulo}}</strong><br>
            <!--START BUTTON -->
            <a href="{{url('showItinerario/'.$item->id_itinerario)}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Ver todos">
                <i class="fa fa-table"></i> Ver todos
            </a>
            <a href="{{url('dia/createItinerario/'.$item->id_itinerario)}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Agregar nuevo">
                <i class="fa fa-plus-circle"></i> Agregar nuevo
            </a>
            <!-- END BUTTON -->
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Día Itinerario</li>
        </ol>
    </section>


    <div class="container-fluid spark-screen">
        <p><a title="Return" href="{{url('showItinerario/'.$item->id_itinerario)}}"><i class="fa fa-chevron-circle-left "></i> Atrás</a></p>
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
                        <div class="form-horizontal">
                            <div class="box-body">
                            <div class="form-group header-group-0 " id="form-group-category_id" style="">
                                <label class="control-label col-sm-2">Categoría de Itinerario <span class="text-danger" title="This field is required">*</span></label>
                                <div class="col-sm-10">
                                    <select style="width:100%" class="form-control " id="id_categoria_itinerario" name="id_categoria_itinerario" disabled>
                                        <option value="{{$categoriaItinerario->id_categoria_itinerario}}" selected>{{$categoriaItinerario->descripcion}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group header-group-0 " id="form-group-category_id" style="">
                                <label class="control-label col-sm-2">Itinerario <span class="text-danger" title="This field is required">*</span></label>
                                <div class="col-sm-10">
                                    <select style="width:100%" class="form-control " id="id_itinerario" name="id_itinerario" disabled>
                                        <option value="SELECCIONE UNO">SELECCIONE UNO</option>
                                        @foreach($itinerarioLista as $k)
                                            @if($item->id_itinerario==$k->id_itinerario)
                                                <option value="{{$k->id_itinerario}}" selected>{{$k->titulo}}</option>
                                            @else
                                                <option value="{{$k->id_itinerario}}">{{$k->titulo}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group header-group-0 " id="form-group-name" style="">
                                <label class="control-label col-sm-2">Día: <span class="text-danger" title="Este campo es requerido">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" maxlength="70" class="form-control" name="titulo" id="titulo" value="{{$item->titulo}}" required disabled>
                                </div>
                            </div>
                            <div class="form-group header-group-0 " id="form-group-name" style="">
                                <label class="control-label col-sm-2">Descripción: <span class="text-danger" title="Este campo es requerido">*</span></label>
                                <div class="col-sm-10">
                                    <?php echo $item->descripcion;?>
                                </div>
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
