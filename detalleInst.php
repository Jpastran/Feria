<?php
session_start();
if (empty($_SESSION['Nombre'])) {
    header('Location: login.php');
} else {
    require_once("db/conectar.php");
    $consulta = "insert visitas(fecha,codestudiante,codprograma) values(
	curdate(),
	'" . mysql_real_escape_string($_SESSION['Correo']) . "',
	'" . mysql_real_escape_string($_GET['cod']) . "')";
    $datos = mysql_query($consulta);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include_once './mods/head.html'; ?>
    </head>
    <body>
        <?php include_once './mods/nav.html'; ?>     
        <?php include_once './mods/detalle.html'; ?>   
        <?php include_once './mods/pie.html'; ?>     
    </body>
</html>
