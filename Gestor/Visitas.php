<?php
session_start();
if (empty($_SESSION['UseR'])) {
    echo"<script>document.location=('index.php');</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Feria Virtual De EducaciónFeria Virtual De Educación</title>

        <link href="css/estilos.css" rel="stylesheet" type="text/css">
            <script type="text/javascript" src="Ext/jquery-1.8.3.js"></script>
            <script>
                $(document).ready(function() {
                    //cargar fecha actual
                    var f = new Date();
                    dia = "";
                    if (f.getDate() < 10) {
                        dia = "0" + f.getDate();
                    } else {
                        dia = f.getDate();
                    }

                    mes = "";
                    if ((f.getMonth() + 1) < 10) {
                        mes = "0" + (f.getMonth() + 1);
                    } else {
                        mes = (f.getMonth() + 1);
                    }
                    $("#Final").val(f.getFullYear() + "-" + mes + "-" + dia);
                    mes = "";
                    if ((f.getMonth() + 1) < 10) {
                        mes = "0" + (f.getMonth());
                    } else {
                        mes = (f.getMonth());
                    }
                    $("#Inicio").val(f.getFullYear() + "-" + mes + "-" + dia);

                    $("#Buscar").click(Buscar);

                    function Buscar() {
                        document.location = "Reportes/Visitas.php?Inicio=" + $("#Inicio").val() + "&Final=" + $("#Final").val();

                    }


                });

            </script>

    </head>


    <body>
        <div id="Principal">

            <div style="text-align:right;font-size:14px;padding:3px;background-color:#fff;color:#333;">

                <?php
                if (!empty($_SESSION['UseR'])) {
                    echo "Identificado Como: " . $_SESSION['Name'] . " <a href='index.php' style='margin-left:7px;margin-right:10px; color: #09C;font-size:16px;font-weight:bold'>Cerrar Sesion</a>
</div>";
                    include("Partes/Opciones.html");
                }
                ?>
                <div style="margin:auto;font-size:14px;width:100%;padding-top:30px">


                    <table border="0" cellpadding="8" style="margin:auto;margin-bottom:50px;" id="TablaSinCss">  <tr>
                            <td align="right"  style="text-align:right !important;padding:8px;">Fecha Inicio</td>
                            <td align="left" style="padding:8px;"><input name="Inicio" type="date" class="box" id="Inicio" onkeydown="testForEnter();" value="" style="width:120px"/></td>
                            <td align="right"  style="text-align:right !important;padding:8px;">Fecha Final</td>
                            <td align="left" style="padding:8px;"><input name="Final" type="date" class="box" id="Final" onkeydown="testForEnter();" value="" style="width:120px"/></td>
                            <td align="left"  style="padding:8px;"> <input type="button" name="Buscar" id="Buscar" class="button" value="Generar Reporte" /> </td>
                        </tr>
                    </table>


























                </div>
            </div>

            <?php
            $variable = file_get_contents("Partes/Pie.html");
            echo $variable;
            ?>



    </body>
</html>