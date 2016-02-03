<?php
session_start();
unset($_SESSION['Name']);
unset($_SESSION['UseR']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, user-scalable=none" />
        <link href="../css/estilos-gestor.css" rel="stylesheet" type="text/css"/>      
        <script src="../js/jquery-1.11.3.js"></script> 
        <script src="../js/scripts-gestor.js"></script>
    </head>
    <body id="login">
        <div class="contenido">
            <h2>
                Inicio De Sesión - Gestor De Contenido 
            </h2>
            <table  cellpadding="7">
                <tr>
                    <td align="right">Usuario</td>
                    <td><input type="text" id="Usuario" name="Usuario" class="box" required/></td>
                </tr>
                <tr>
                    <td align="right">Contraseña</td>
                    <td><input type="password" id="pass" name="pass" class="box" data-theme="d" required/></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="button"  id="Ingresar"  name="Ingresar" class="button" value="Ingresar"  /></td>
                </tr>
            </table>
            <div id="resul"></div>
        </div>
    </body>
</html>