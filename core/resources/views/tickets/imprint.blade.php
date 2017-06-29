<!DOCTYPE html>
<html>
    <head>
    </head>
    <body onload="printHTML();">
   <div>{!!Html::image('theme/plugins/images/log.png',null,['width'=>'40','style'=>'position:fixed;'])!!}</div>
   <div style="position: fixed;left: 200px;"><strong>N° 104</strong></div>
        <table>
            <tr>
                <td style="text-align: center;" ><strong>La 57</strong></td>
            </tr>
            <tr>
                <td  style="text-align: center;" > Nit 123456789-1</td>
            </tr>
            <tr>
                <td>Dirección: calle 11 # 23 - 22 </td>
            </tr>
            <tr>
                <td>Telefono: 6459871 - 3186551032</td>
            </tr>
            <tr>
                <td>Servicio: Parqueo + Lavado</td>
            </tr>
        </table>
        <br/>
         <table style="border:1px dotted" width="250">
            <tr>
                <td style="text-align: center;">Tipo<br/>Vehiculo</td>
                <td style="text-align: center;">Placa</td>
                <td style="text-align: center;">Hora<br/> ingreso</td>
            </tr>
             <tr>
                <td style="text-align: center;">Carro</td>
                <td style="text-align: center;text-transform: uppercase;">  xhl-125</td>
                <td style="text-align: center;">08:00 </td>
            </tr>
        </table>
        <br/>
        <table>
            <tr><td align="center" style="text-align: center;">{!!DNS1D::getBarcodeSVG("4445645656", "CODABAR")!!}</td></tr>

        </table>
    <script type="text/javascript">
       function printHTML() {
  if (window.print) {
    window.print();
    window.location.href = "http://localhost:83/parking/";
                    }
                            }
    document.addEventListener("DOMContentLoaded", function(event) {
  printHTML();
});
    </script>
    </body>
</html>
