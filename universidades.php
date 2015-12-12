<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include_once './mods/head.html';?>
    </head>
    <body>
        <?php include_once './mods/nav.html';?>
        <div class="contenido">
            <div class="center">
                <?php
                if (!empty($_GET['cod'])) {
                    require_once("db/conectar.php");
                    $consulta = "SELECT codigo,imagen FROM ofertas WHERE categoria='Universidades' AND departamento='" . mysql_real_escape_string($_GET['cod']) . "'";
                    $datos = mysql_query($consulta);
                    $sw = FALSE;
                    while ($row = mysql_fetch_array($datos)) { ?>
                        <a href="detalleUniv.php?cod=<?php echo $row[0] ?>">
                            <img src="img/<?php echo $row[1] ?>"  class="late"/></a>
                        <?php 
                        if (!$sw) { $sw = TRUE; }
                    }
                    if (!$sw) {
                        include_once 'mods/error.html';
                    }
                } else {
                    header('Location: oferta.php');
                }?>
            </div>
            <div class="clean"></div>
        </div>
        <?php include_once 'mods/pie.html'; ?>
    </body>
</html>
