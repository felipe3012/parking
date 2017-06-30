<!DOCTYPE html>
<html>
    <head>
    </head>
    <body onload="printHTML();">
   <div>{!!Html::image('theme/plugins/images/log.png',null,['width'=>'40','style'=>'position:fixed;'])!!}</div>
        <div style="position: fixed; left:200px;"><strong>N° {{$ticket->id}}</strong></div>
        <table>
            <tr>
                <td style="text-align: center;" ><strong>{{$empresa->nombre}}</strong>   </td>
            </tr>
            <tr>
                <td  style="text-align: center;" > Nit {{$empresa->nit}} </td>
            </tr>
            <tr>
                <td>Dirección: {{$empresa->direccion}} </td>
            </tr>
            <tr>
                <td>Fecha: <?php $fecha_actual = date('Y-m-d'); echo $fecha_actual; ?> </td>
            </tr>
            <tr>
                <td>Telefono:  {{$empresa->telefono}}</td>
            </tr>
            <tr>
                <td>Servicio: Parqueo +{{$ticket->servicio}}</td>
            </tr>
        </table>
        <br/>
         <table style="border:1px dotted" width="250">
            <tr>
                <td>Tipo <br/>Vehiculo  </td>
                <td>Placa  </td>
                <td>Hora <br/> ingreso  </td>
            </tr>
             <tr>     
                <td>{{$ticket->vehiculo}}</td>
                <td style="text-transform: uppercase;">{{$ticket->placa}}</td>
                <td>{{$ticket->hora}}</td>
            </tr>
        </table>
        <br/>
        <table>
            <tr><td align="center" style="text-align: center;">{!!DNS1D::getBarcodeSVG("$ticket->cod", "CODABAR")!!}</td></tr>
        </table>
    <script type="text/javascript">
       function printHTML() {
  if (window.print) {
    window.print();
    window.location.href = "http://localhost:"+<?php echo $_SERVER['SERVER_PORT'];?>+"/parking/";
  }
}
document.addEventListener("DOMContentLoaded", function(event) {
  printHTML();
});
    </script>
    </body>
</html>