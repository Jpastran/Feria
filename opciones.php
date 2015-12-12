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
                <?php if (!empty($_GET['cod'])) { ?>                
                <a href="universidades.php?cod=<?php echo $_GET['cod'] ?>">
                    <img src="img/Univ.jpg" class="late2"/></a>
                <a href="instituciones.php?cod=<?php echo $_GET['cod'] ?>">
                    <img src="img/Univ2.jpg" class="late2"/></a>
                <a href="idiomas.php?cod=<?php echo $_GET['cod'] ?>">
                    <img src="img/Univ3.jpg" class="late2"/></a>
                <?php
                } else {
                    header('Location: oferta.php');
                }
                ?>
            </div>
        </div>
        <?php include_once 'mods/pie.html'; ?>
    </body>
</html>
