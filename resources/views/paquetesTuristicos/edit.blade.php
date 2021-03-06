@extends('adminlte::layouts.app')
@section('htmlheader_title')
    {{ trans('Paquetes Turísticos') }}
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
@endsection


@section('main-content')
    <section class="content-header">
        <h1>
            <i class="fa fa-glass"></i>  Agregar Paquete Turístico
        </h1>

        <ol class="breadcrumb">
            <li><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Paquetes Turisticos</li>
        </ol>
    </section>

    <!-- Main content -->
    <section id="content_section" class="content">
        <!-- Your Page Content Here -->
        <div>
            <p><a title="Return" href="{{url('paquetesTuristicos')}}"><i class="fa fa-chevron-circle-left "></i> Atrás</a></p>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong><i class="fa fa-glass"></i> Agregar Paquete</strong>
                </div>

                <div class="panel-body" style="padding:20px 0px 0px 0px">

                    {{ Form::model($item, array('route'=>array('paquetesTuristicos.update',$item->id_paquete_tur),'method' => 'put','class'=>'form-horizontal')) }}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">


                    <style>
                        .select2-container--default .select2-selection--single {border-radius: 0px !important}
                        .select2-container .select2-selection--single {height: 35px}
                    </style>

                    <div class="form-group header-group-0 " id="form-group-category_id" style="">
                        <label class="control-label col-sm-2">Usuario<span class="text-danger" title="This field is required">*</span></label>

                        <div class="col-sm-10">
                            <select style="width:100%" class="form-control " id="id_user" name="id_user">
                                <option value="SELECCIONE UNO" selected>SELECCIONE UNO</option>
                                @foreach($usuarios as $k)
                                    <option value="{{$k->id}}" >{{$k->name}}</option>
                                @endforeach
                            </select>

                            <div class="text-danger"></div>
                            <p class="help-block"></p>

                        </div>
                    </div>

                    <div class="form-group header-group-0 " id="form-group-name">
                        <label class="control-label col-sm-2">Título <span class="text-danger" title="This field is required">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" title="nombre" name="titulo" id="titulo" required placeholder="" maxlength="70" class="form-control" value="{{$item->titulo}}">
                        </div>
                    </div>

                    <div class="form-group header-group-0 " id="form-group-name">
                        <label class="control-label col-sm-2">Subtítulo <span class="text-danger" title="This field is required">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" title="nombre" name="subtitulo" id="subtitulo" required="" placeholder="" maxlength="70" class="form-control" value="{{$item->dubtitulo}}">
                        </div>
                    </div>

                    <div class="form-group header-group-0 " id="form-group-description" style="">
                        <label class="control-label col-sm-2">Descripcion <span class="text-danger" title="This field is required">*</span></label>
                        <div class="col-sm-10">
                            <textarea name="descripcion" id="descripcion" rows="10" cols="80">{{$item->descripcion}}</textarea>
                            <div class="text-danger"></div>
                            <p class="help-block"></p>
                        </div>
                    </div>

                    <div class="form-group header-group-0 " id="form-group-status" style="">
                        <label class="control-label col-sm-2">Status <span class="text-danger" title="This field is required">*</span></label>

                        <div class="col-sm-10">
                            <label class="radio-inline">
                                <input type="radio" name="estado" required="" value="1" checked> Activo

                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="estado" value="0"> Inactivo
                            </label>


                            <div class="text-danger"></div>
                            <p class="help-block"></p>

                        </div>
                    </div>

                    <div class="form-group header-group-0 " id="form-group-category_id" style="">
                        <label class="control-label col-sm-2">Categoría de Itinerario <span class="text-danger" title="This field is required">*</span></label>

                        <div class="col-sm-10">
                            <select style="width:100%" class="form-control " id="id_categoria_itinerario" name="id_categoria_itinerario" onchange="getItinerario()">
                                <option value="" required>SELECCIONE UNO</option>
                                @foreach($categoriasItinerarios as $k)
                                    <option value="{{$k->id_categoria_itinerario}}" >{{$k->descripcion}}</option>
                                @endforeach
                            </select>

                            <div class="text-danger"></div>
                            <p class="help-block"></p>

                        </div>
                    </div>

                    <div class="form-group header-group-0 " id="form-group-category_id" style="">
                        <label class="control-label col-sm-2">Itinerario <span class="text-danger" title="This field is required">*</span></label>

                        <div class="col-sm-10">
                            <select style="width:100%" class="form-control " id="id_categoria" name="id_categoria" required>
                                <option value="" required>SELECCIONE UNO</option>
                                @foreach($itinerarios as $k)
                                    <option value="{{$k->id_categoria}}" >{{$k->titulo}}</option>
                                @endforeach
                            </select>
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
        </div><!--END AUTO MARGIN-->
    </section><!-- /.content -->

    <script language="javascript">
        function getItinerario(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#id_categoria_itinerario option:selected").each(function () {
                var e = document.getElementById("id_categoria_itinerario");
                var strUser = e.options[e.selectedIndex].value;
                elegido=$(this).val();
                $("#id_categoria").html('');
                $.post("{{url('/getItinerario')}}", { elegido: elegido }, function(data){
                    $.each(data, function (k, v) {
                        $("#id_categoria").append('<option value="'+data[k].id_itinerario+'" >'+data[k].titulo+'</option>');
                    });

                });
            });
        };
    </script>
@endsection