<?php
session_start();
if (empty($_SESSION['UseR'])) {
    echo"<script>document.location=('index.php');</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include_once './mods/head.html'; ?>
    </head>
    <body>
        <div id="Principal">
            <?php include_once './mods/nav.html'; ?>
            <table border="0" cellpadding="8" style="margin:auto;margin-bottom:50px;" id="TablaSinCss"> 
                <tr>
                    <td align="right"  style="text-align:right !important;padding:8px;">Fecha Inicio</td>
                    <td align="left" style="padding:8px;"><input name="Inicio" type="date" class="box" id="Inicio" value="" style="width:120px"/></td>
                    <td align="right"  style="text-align:right !important;padding:8px;">Fecha Final</td>
                    <td align="left" style="padding:8px;"><input name="Final" type="date" class="box" id="Final" value="" style="width:120px"/></td>
                    <td align="left"  style="padding:8px;"> <input type="button" name="Buscar" id="Buscar" class="button" value="Generar Reporte" /> </td>
                </tr>
            </table>
        </div>
        <?php include_once './mods/pie.html'; ?>
    </body>
</html>