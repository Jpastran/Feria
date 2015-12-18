<?php
session_start();
if (empty($_SESSION['UseR'])) {
    header('Location: index.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include_once './mods/head.html'; ?>
    </head>
    <body>
        <?php include_once './mods/nav.html'; ?>
        <div id="principal">
            <div class="logo">
                <h1><img src="../img/Logo.png" /><br/>Bienvenido</h1>
                <?php echo "Hora actual " . date("r");?><br/>
                <?php echo "Usuario de Sesion " . $_SESSION['UseR'];?><br/> 
                <?php echo "Nombre de Sesion " . $_SESSION['Name'];?>            
            </div>
        </div>
        <?php include_once './mods/pie.html'; ?>
    </body>
</html>