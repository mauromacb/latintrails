<script type="application/javascript">
    $(function () {
        $("#example").DataTable();
    });
</script>
<div class="panel-group" id="accordion">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(isset($dias))
        <?php $i=1;?>
        @foreach($dias as $k)
            <div class="panel panel-info">
                <div class="panel panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$i}}">{{$k->titulo}}</a>
                    </h4>
                </div>
                <div id="collapse{{$i}}" class="panel-collapse collapse">
                    <div class="panel-body"><?php echo $k->descripcion; $i++?></div>
                </div>
            </div>
        @endforeach
    @endif
</div>
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