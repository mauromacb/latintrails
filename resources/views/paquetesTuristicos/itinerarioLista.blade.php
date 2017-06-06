<script type="application/javascript">
    $(function () {
        $("#example").DataTable();
    });
</script>
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr role="row">
        <th class="sorting_asc" tabindex="0" aria-controls="table-stock" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Description: activate to sort column descending" style="width: 254px;">Día</th>
        <th class="sorting" tabindex="0" aria-controls="table-stock" rowspan="1" colspan="1" aria-label="Stock In: activate to sort column ascending" style="width: 175px;">Descripción</th>
        <th width="90px" class="sorting" tabindex="0" aria-controls="table-stock" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 90px;">Action</th></tr>
    </thead>
    <tbody>
    @foreach($itinerario as $k)
        <tr role="row" class="odd">
            <td>{{$k->dia}}</td>
            <td class="sorting_1">{{$k->descripcion}}</td>
            <td>
                <div style='float: left; margin-left: 3px'>
                    <div id="eliminarItinerario">
                        <fieldset class="buttons">
                            <input type="hidden" id="itinerario_id" value="{{$k->id_itinerario}}">
                            <div class="btn btn-sm btn-success btn-edit" data-toggle="modal" data-target="#myModal" style='float: left; margin-left: 3px' onclick="editarItinerario({{$item->id_paquete_tur}},{{$k->id_itinerario}})">
                                <i class="fa fa-pencil"></i>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div style='float: left; margin-left: 3px'>
                    <div id="eliminarItinerario">
                    <fieldset class="buttons">
                        <input type="hidden" id="itinerario_id" value="{{$k->id_itinerario}}">
                        <div class="btn btn-sm btn-warning btn-delete" onclick="eliminarItinerario({{$item->id_paquete_tur}},{{$k->id_itinerario}});">
                            <span class="fa fa-trash"></span>
                        </div>
                    </fieldset>
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<?php
/*echo "Aqui SOAP";

$servicio="http://app.segurosequinoccial.info/WebServiceSybase/Service.asmx?WSDL"; //url del servicio
$parametros=array(); //parametros de la llamada
$parametros['string']="es";
$parametros['double']=0;
$client = new SoapClient($servicio, array());
$params=new stdClass();
$params->nro_doc='es';
$params->PrimaNeta=(double) 1985.33;

$result=$client->CalcularDeudaSSC($params);
var_dump($result->CalcularDeudaSSCResult);

//$result = $client->getSoap($parametros);//llamamos al método que nos interesa con los parámetros
    */
?>