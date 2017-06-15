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
                            <i class="fa fa-archive"></i>  Página Web
                        </h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            
                        </div>
                    </div>
                    <div class="box-body">
                        @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            {{ Html::ul($errors->all()) }}
                        </div>
                        @endif


                        @foreach($items as $item)
                            {{ Form::model($item, array('route' => array('pagina.update', $item->id), 'method' => 'PUT')) }}
                            <div class="box-body">
                                <div class="form-group header-group-0 " id="form-group-name">
                                    <label class="control-label col-sm-2">Título de la página: <span class="text-danger" title="Este campo es requerido">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" maxlength="70" class="form-control" name="titulo" id="titulo" value="{{$item->titulo}}" required>
                                        <div class="text-danger"></div>
                                        <p class="help-block"></p>
                                    </div>
                                    <label class="control-label col-sm-2">Pie de página: <span class="text-danger" title="This field is required">*</span></label>
                                    <div class="col-sm-10">
                                        <textarea class="ckeditor" name="pie" id="pie" rows="2" cols="80">{{$item->pie}}</textarea>

                                        <div class="text-danger"></div>
                                        <p class="help-block"></p>
                                    </div>
                                    <label class="control-label col-sm-2">Links de interes: <span class="text-danger" title="This field is required">*</span></label>
                                    <div class="col-sm-10">
                                        <textarea class="ckeditor" name="links_interes" id="links_interes" rows="2" cols="80">{{$item->links_interes}}</textarea>

                                        <div class="text-danger"></div>
                                        <p class="help-block"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer" style="background: #F5F5F5">
                                <div class="form-group">
                                    <label class="control-label col-sm-2"></label>
                                    <div class="col-sm-10">
                                        <a href="javascript:history.back(1)" class="btn btn-default"><i class="fa fa-chevron-circle-left"></i> Atras</a>
                                        <input type="submit" name="submit" value="Guardar" class="btn btn-success">
                                    </div>
                                </div>
                            </div><!-- /.box-footer-->
                            {{ Form::close() }}
                        @endforeach
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
        </div>
    </div>
@endsection
