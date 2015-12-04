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
        <link href="css/estilos.css" rel="stylesheet" type="text/css">
            <script type="text/javascript" src="Ext/jquery-1.8.3.js"></script>
            <script>
                $(document).ready(function() {
                    $("#Ingresar").click(Ingresar);
                    function Ingresar() {
                        $("#Usuario").removeClass('err');
                        $("#pass").removeClass('err');
                        if ($("#Usuario").val()) {
                            if ($("#pass").val()) {
                                $("#resul").html("<blink style='color:#000;margin-bottom:-10px;'>Procesando, espere...</blink><br><br>");
                                var parametros = {
                                    "Enteruser": $("#Usuario").val(),
                                    "Enterpass": $("#pass").val()
                                };
                                console.log(parametros);
                                $.ajax({
                                    data: parametros,
                                    url: "Procesamiento/Usuarios.php",
                                    type: "POST",
                                    success: function(resp) {
                                        console.log(resp);
                                        if (resp == "s") {
                                            document.location = "Inicio.php"
                                        } else {
                                            $("#resul").html("Datos Incorrectos");
                                            $("#pass").val("");
                                        }
                                    },
                                    error: function(resp) {
                                        alert("Error Al Conectarse Al Servidor");
                                    }
                                });
                            } else {
                                $("#pass").addClass('err');
                                $("#resul").html("Complete Los Campos");
                            }
                        } else {
                            $("#Usuario").addClass('err');
                            $("#resul").html("Complete Los Campos");
                        }
                    }
                });
            </script>           
            <style>
                .err{
                    border: solid 1px #D8000C!important;
                }
            </style>
    </head>
    <body style="background-color:#09C" >
        <div style="margin:auto;margin-top:5%;font-family:letraOswald;">
            <h2 style="color:#FFF;text-align:center">
                Inicio De Sesión - Gestor De Contenido 
            </h2>
            <table  cellpadding="7" style="font-family:letraOswald;background-color:#fafafa;border-radius:10px;opacity:0.87;box-shadow:0px 0px 5px #ddd;font-family:letraOswald;margin:auto">
                <tr>
                    <td align="right">Usuario</td>
                    <td><input type="text" id="Usuario" name="Usuario"class="box"  required/></td>
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
            <div id="resul" style="font-size:14px;color:#000;text-align:center;margin-top:10px;font-family:letraOswald;" ></div>
        </div>
    </body>
</html>