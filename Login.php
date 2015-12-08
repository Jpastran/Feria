<?php
session_start();
unset($_SESSION['Nombre']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include_once './mods/head.html'; ?>
    </head>
    <body style="margin:0px;background-color:#f2f2f2"  onLoad="scroll();">
        <?php include_once './mods/nav.html'; ?>
        <div style="max-width:500px;margin:auto;width:100%;margin-top:50px;margin-bottom:150px;border: solid 1px #ccc;background-color:#fff;box-shadow:0px 0px 5px #999;border-radius:5px;">
            <table style="max-width:400px;margin:auto;width:100%;margin-top:40px;margin-bottom:40px;" cellpadding="6">
                <tr>
                    <td align="right" width="50%">Correo Electronico</td>
                    <td><input name="Correo" type="text" class="box" id="Correo" onkeydown="testForEnter();" value="" /></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="button" name="btnentrar" id="btnentrar" class="button" value="Iniciar Sesion" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center" style="color:#555;">
                        <div id="Resp" style="text-align:center;font-size:14px;color:#06C;"></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center" style="color:#555;"><hr />
                        ¿Aun No Te HasRegistrado?<br />
                        <a style="color:#06C;text-decoration:none;" href="Registro.php"> Registrese Aqui!</a>
                    </td>
                </tr>
            </table>
        </div>
        <?php include_once 'mods/pie.html'; ?>
    </body>
</html>
