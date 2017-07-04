<script src="{{ asset('plugins/jquery.dataTables.min.js')}}" type="application/javascript"></script>
<script src="{{ asset('plugins/dataTables.bootstrap.min.js')}}'" type="application/javascript"></script>
<link href="{{ asset('plugins/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
<script type="application/javascript">
    $(document).ready(function() {
        $('#lista').DataTable( {
            "language": {
                "url": "{{ asset('/js/Spanish.json') }}"
            }
        } );
    } );
</script>

<script language="javascript">
    function agregarItinerario() {
        $("#form1").submit(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '{{url('/nuevoItinerario')}}',
                data: $(this).serialize(),
                success: function (data) {
                    $('#resultado').html('<div class="alert alert-success" align="center"><strong>Itinerario Agregado Exitosamente!</strong></div>');
                    $('#itinerarios').html(data);
                }
            })
            return false;
        });
    }
    function agregar() {
        $('#resultado').html('<form name="form1" id="form1">                {{ csrf_field() }}            <div class="box-body">            <div class="form-group header-group-0 " id="form-group-name" style="">            <label class="control-label col-sm-2">Dia: <span class="text-danger" title="Este campo es requerido">*</span></label>            <div class="col-sm-10">            <input type="hidden" name="idpaquetetur" id="idpaquetetur" value="{{$item->id_paquete_tur}}">            <input type="text" maxlength="70" class="form-control" name="dia" id="dia" required>        </div>        </div>        <div class="form-group header-group-0 " id="form-group-name" style="">            <label class="control-label col-sm-2">Descripción: <span class="text-danger" title="Este campo es requerido">*</span></label>            <div class="col-sm-10">            <textarea name="descripcion" id="descripcion" required="" maxlength="5000" class="form-control" rows="5"></textarea>            </div>            </div>            </div>            <div class="modal-footer" style="background: #F5F5F5">            <div class="form-group">            <div class="col-sm-10">            <button type="submit" name="submit" class="btn btn-primary" onclick="agregarItinerario()">Guardar</button>            <button type="submit" data-dismiss="modal" class="btn btn-danger">Cerrar</button>            </div>            </div>            </div><!-- /.box-footer-->            </form>');
    }
    function editarItinerario(pqtr,itinerario) {
        $.ajax({
            type: 'GET',
            url: '{{url('/editarItinerario')}}',
            data: 'idpt=' + pqtr + '&idit=' + itinerario,
            success: function (data) {
                $('#resultado').html('<form name="forms1" id="forms1">                {{ csrf_field() }}            <div class="box-body">            <div class="form-group header-group-0 " id="form-group-name" style="">            <label class="control-label col-sm-2">Dia: <span class="text-danger" title="Este campo es requerido">*</span></label>            <div class="col-sm-10">            <input type="hidden" name="idpaquetetur" id="idpaquetetur" value="{{$item->id_paquete_tur}}">            <input type="hidden" name="idit" id="idit" value="'+data.id_itinerario+'"> <input type="text" maxlength="70" class="form-control" name="dia" id="dia" required value="'+data.dia+'">        </div>        </div>        <div class="form-group header-group-0 " id="form-group-name" style="">            <label class="control-label col-sm-2">Descripción: <span class="text-danger" title="Este campo es requerido">*</span></label>            <div class="col-sm-10">            <textarea name="descripcion" id="descripcion" required="" maxlength="5000" class="form-control" rows="5">'+data.descripcion+'</textarea>            </div>            </div>            </div>            <div class="modal-footer" style="background: #F5F5F5">            <div class="form-group">            <div class="col-sm-10">            <button type="submit" name="submit" class="btn btn-primary" onclick="guardarItinerario()">Guardar</button>            <button type="submit" data-dismiss="modal" class="btn btn-danger">Cerrar</button>            </div>            </div>            </div><!-- /.box-footer-->            </form>');
            }
        })
        return false;

    }
    function guardarItinerario(pqtr,itinerario) {
        $("#forms1").submit(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '{{url('/guardarItinerario')}}',
                data: $(this).serialize(),
                success: function (data) {
                    $('#resultado').html('<div class="alert alert-success" align="center"><strong>Itinerario Actualizado Exitosamente!</strong></div>');
                    $('#itinerarios').html(data);
                }
            })
            return false;
        });
    }
    function eliminarItinerario(pqtr,itinerario) {
        if (confirm('¿Está seguro que desea eliminar el registro?')){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: '{{url('/destroyItinerario')}}',
                data: 'idpt='+pqtr+'&idit='+itinerario,
                success: function (data) {
                    $('#itinerarios').html(data);
                }
            })
            return false;
        }
    }
</script>