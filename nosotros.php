<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include_once './mods/head.html'; ?>
    </head>
    <body>       
        <?php include_once './mods/nav.html'; ?> 
        <?php
        require_once("db/conectar.php");
        $consulta = "SELECT mision,vision,quienes,objetivos,producto FROM configuracion	";
        $datos = mysql_query($consulta);
        if ($row = mysql_fetch_array($datos)) {
            ?>
            <div class="contenido">
                <h2>QUIENES SOMOS</h2>
                <div class="texto">
                    <?php echo nl2br(($row[2])); ?>
                </div>
                <h2>NUESTRA MISION </h2>
                <div class="texto">
                    <?php echo nl2br(($row[0])); ?>
                </div>               
                <h2>NUESTRA VISION</h2>
                <div class="texto">
                    <?php echo nl2br(($row[1])); ?>
                </div>
                <h2>OBJETIVOS</h2>
                <div class="texto">
                    <?php echo nl2br(($row[3])); ?>
                </div>
                <h2>NUESTRO PRODUCTO</h2>
                <div class="texto">
                    <?php echo nl2br(($row[4])); ?>
                </div>
            </div>
            <?php
        }
        ?>
        <?php include_once './mods/pie.html'; ?>
    </body>
</html>
