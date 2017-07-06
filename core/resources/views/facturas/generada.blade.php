 <!DOCTYPE html>
 <html>
 <head>
 </head>
 <body>
 	<div>{!!Html::image('theme/plugins/images/log.png',null,['width'=>'40','style'=>'position:fixed;'])!!}</div>
 	<table>
 		<tr>
 			<td style="text-align: center;" ><strong> {{$empresa->nombre}}</strong>   </td>
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
 			<td>Atendio: {{$factura->cajero}}</td>
 		</tr>
 		<tr>
 			<td>Factura de Venta N°{{$factura->id}}</td>
 		</tr>
 	</table>
 	<br/>
 	Información General<hr align="left" size="1" width="100%"/>
 	<table> 
 		<tr>
 			<td><strong>Tipo Vehiculo:</strong> {{$factura->tipo_vehiculo}}</td>
 		</tr>

 		<tr>
 			<td><strong>Placa: </strong>{{$factura->placa}} </td>
 		</tr>

 		<tr>
 			<td><strong>Hora de Entrada:</strong> {{$factura->fecha_entrada}}</td>
 		</tr>

 		<tr>
 			<td><strong>Hora de Salida:</strong> {{$factura->fecha_salida}}</td>
 		</tr>

 	</table>
 	<hr align="left" size="1" width="100%"/>
 	<table> 

 		<tr>
 			<td>Servicio</td><td>Tiempo</td><td>Valor</td>
 		</tr>
 	
 		<tr>
 			<td>Parqueo</td><td>{{$factura->tiempo}} Min</td><td>$ {{$factura->tiempo_valor}}</td>
 		</tr>

 		@if($factura->servicio!="Ninguno" || $factura->servicio!="")
 		<tr>
 			<td>{{$factura->servicio}}</td><td>---</td><td>$ {{$factura->valor_servicio}}</td>
 		</tr>
 		@endif

 		<tr>
 		<td></td>
 		<td></td>
 			<td><strong>Subtotal:</strong>$ {{$factura->subtotal}}</td>
 		</tr>

 		<tr>
 		<td></td>
 		<td></td>
 			<td><strong>IVA:</strong>$  {{$factura->iva}}</td>
 		</tr>

 		<tr>
 		<td></td>
 		<td></td>
 			<td><strong>Total:</strong>$  {{$factura->total}}</td>
 		</tr>
 		
 	</table>
 	<hr align="left" size="1" width="100%"/>
 	<div style="text-align: center;">
 	<table>
 		<tr>
 			<td style="text-align: center;">Deisy Anaya 315 423 4863 </td>
 		</tr>
 	</table>
 	</div>
    <script type="text/javascript">
       function printHTML() {
  if (window.print) {
    window.print();
    window.parent.location.href = "http://localhost:"+<?php echo $_SERVER['SERVER_PORT'];?>+"/parkinglot/";
  }
}
document.addEventListener("DOMContentLoaded", function(event) {
  printHTML();
});
    </script>
 </body>
 </html>
 