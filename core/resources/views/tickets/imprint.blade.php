<!DOCTYPE html>
<html>
    <head>
    </head>
    <body onload="printHTML();">
   <div>{!!Html::image('theme/plugins/images/log.png',null,['width'=>'40','style'=>'position:fixed;'])!!}</div>
   @foreach($ticket as $data)
        <div style="position: fixed; left:200px;"><strong>N° {{$data->id}}</strong></div>
        <table>
            <tr>
                <td style="text-align: center;" ><strong>La 57</strong>   </td>
            </tr>
            <tr>
                <td  style="text-align: center;" > Nit 123456789-1 </td>
            </tr>
            <tr>
                <td>Dirección: calle 11 # 23 - 22 </td>
            </tr>
            <tr>
                <td>Fecha: <?php $fecha_actual = date('Y-m-d'); echo $fecha_actual; ?> </td>
            </tr>
            <tr>
                <td>Telefono:  6459871 - 3186551032</td>
            </tr>
            <tr>
                <td>Servicio: Parqueo +{{$data->servicio}}</td>
            </tr>
        </table>
    @endforeach
        <br/>
         <table style="border:1px dotted" width="250">
            <tr>
                <td>Tipo <br/>Vehiculo  </td>
                <td>Placa  </td>
                <td>Hora <br/> ingreso  </td>
            </tr>
             <tr>
             @foreach($ticket as $data)       
                <td>{{$data->vehiculo}}</td>
                <td>{{$data->placa}}</td>
                <td>{{$data->hora}}</td>
             @endforeach      
            </tr>
        </table>
        <br/>
        <table>
            @foreach($cod as $data2) 
            <tr><td align="center" style="text-align: center;">{!!DNS1D::getBarcodeSVG("$data2->lpad", "CODABAR")!!}</td></tr>
             @endforeach
        </table>
    <script type="text/javascript">
       function printHTML() {
  if (window.print) {
    window.print();
    window.location.href = "http://localhost/parking/";
  }
}
document.addEventListener("DOMContentLoaded", function(event) {
  printHTML();
});
    </script>
    </body>
</html>
 