<?php
session_start();
unset($_SESSION['Nombre']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include_once './mods/head.html';?>
    </head>
    <body>
        <?php include_once './mods/nav.html';?>
        <div class="contenido">
            <div id="login">
                <div class="login">
                    <div class="login line">
                        <div class="login label">Correo Electronico</div>
                        <div class="login input">
                            <input name="Correo" type="text" class="box" id="Correo" value=""/>
                        </div>
                        <div class="clean"></div>
                    </div>
                    <div class="login line btn">
                        <input type="button" name="btnlogin" id="btnlogin" class="button" value="Iniciar Sesion"/>
                    </div>
                    <div class="login center">
                        <div class="login line" id="resp"></div>
                        <div class="login line hr">No estas registrado:                                           
                            <a href="registro.php"> Registrese Aqui</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once './mods/pie.html'; ?>
    </body>
</html>
