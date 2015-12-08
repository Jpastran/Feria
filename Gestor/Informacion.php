<?php
session_start();
if (empty($_SESSION['UseR'])) {
    echo"<script>document.location=('index.php');</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Feria Virtual De EducaciónFeria Virtual De Educación</title>

        <link href="Estilos.css" rel="stylesheet" type="text/css">
            <script type="text/javascript" src="Ext/jquery-1.8.3.js"></script>
            <script>
                $(document).ready(function() {
                    function time() {
                        setTimeout(function() {
                            $(".mensajes").fadeOut(900);
                        }, 1500);
                    }

                    cargar();
                    $("#btnEditar").click(btnEditar);
                    $("#TablaSinCss").hide();

                    function btnEditar() {


                        $("#respu").html("Espere Por Favor...");
                        var parametros = {
                            "Mision": $("#Mision").val(),
                            "Vision": $("#Vision").val(),
                            "Quienes": $("#Quienes").val(),
                            "Objetivos": $("#Objetivos").val(),
                            "Producto": $("#Producto").val(),
                            "Editar": "Editar",
                            "Correos": $("#Correos").val()
                        };

                        $.ajax({
                            data: parametros,
                            url: "Procesamiento/Informacion.php",
                            type: "POST",
                            success: function(resp) {
                                if (resp == "s") {
                                    $("#respu").html("");
                                    alert("Actualizado Con Exito");
                                    document.location = "Informacion.php";
                                } else {
                                    $("#respu").html("");
                                    alert("No Se Pudo Guarda, Verifique Su Conexion");

                                }
                            },
                            error: function(resp) {
                                alert("Error Al Conectarse Al Servidor");
                            }
                        });

                    }

                    function cargar() {

                        var parametros = {
                            "Cdocentes": "X"
                        };
                        $.ajax({
                            data: parametros,
                            url: "Procesamiento/Informacion.php",
                            type: "POST",
                            success: function(resp) {
                                $("#Contenido").html(resp);
                                ;
                                $("#Editar").click(editar);

                            },
                            error: function(resp) {
                                alert("Error Al Conectarse Al Servidor");
                            }
                        });

                    }


                    function editar() {

                        var parametros = {
                            "BuscarDocente": "1"
                        };
                        $("#oculto").val($(this).val());
                        $("#Contenido").html("<center>Cargando, Espere Por Favor...</center>");
                        $.ajax({
                            data: parametros,
                            url: "Procesamiento/Informacion.php",
                            type: "POST",
                            success: function(resp) {
                                var datos = resp.split("ô");
                                $("#Mision").val(datos[0]);
                                $("#Vision").val(datos[1]);
                                $("#Quienes").val(datos[2]);
                                $("#Objetivos").val(datos[3]);
                                $("#Producto").val(datos[4]);
                                $("#Correos").val(datos[5]);
                                $("#TablaSinCss").show();


                                $("#Contenido").html("");
                            },
                            error: function(resp) {
                                alert("Error Al Conectarse Al Servidor");
                            }
                        });
                    }


                });

            </script>

    </head>


    <body>
        <div id="Principal">

            <div style="text-align:right;font-size:14px;padding:3px;background-color:#fff;color:#333;">

                <?php
                if (!empty($_SESSION['UseR'])) {
                    echo "Identificado Como: " . $_SESSION['Name'] . " <a href='index.php' style='margin-left:7px;margin-right:10px; color: #09C;font-size:16px;font-weight:bold'>Cerrar Sesion</a>
</div>";
                    include("Partes/Opciones.html");
                }
                ?>
                <div style="margin:auto;font-size:14px;width:100%;padding-top:30px">


                    <table border="0" cellpadding="8" style="margin:auto;margin-bottom:50px;" id="TablaSinCss">  <tr>
                            <td align="right"  style="text-align:right !important;padding:8px;"><h3>Mision</h3></td>
                            <td align="left" style="padding:8px;"><textarea name="Mision" rows="5" class="box" id="Mision" style="width:500px;" onkeydown="testForEnter();"></textarea></td>
                        </tr> <tr>
                            <td align="right"  style="text-align:right !important;padding:8px;"><h3>Vision</h3></td>
                            <td align="left" style="padding:8px;"><textarea name="Vision" rows="5" class="box" id="Vision" style="width:500px;" onkeydown="testForEnter();"></textarea></td>
                        </tr> <tr>
                            <td align="right"  style="text-align:right !important;padding:8px;"><h3>Quienes Somos	</h3></td>
                            <td align="left" style="padding:8px;"><textarea name="Quienes" rows="5" class="box" id="Quienes" style="width:500px;" onkeydown="testForEnter();"></textarea></td>
                        </tr> <tr>
                            <td align="right"  style="text-align:right !important;padding:8px;"><h3>Objetivos</h3></td>
                            <td align="left" style="padding:8px;"><textarea name="Objetivos" rows="5" class="box" id="Objetivos" style="width:500px;" onkeydown="testForEnter();"></textarea></td>
                        </tr> <tr>
                            <td align="right"  style="text-align:right !important;padding:8px;"><h3>Producto</h3></td>
                            <td align="left" style="padding:8px;"><textarea name="Producto" rows="5" class="box" id="Producto" style="width:500px;" onkeydown="testForEnter();"></textarea></td>
                        </tr> <tr>
                            <td align="right"  style="text-align:right !important;padding:8px;"><h3>Correos</h3></td>
                            <td align="left" style="padding:8px;"><textarea name="Correos" rows="5" class="box" id="Correos" style="width:500px;" onkeydown="testForEnter();"></textarea></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="hidden" id="oculto" name="oculto" />
                            </td>
                            <td align="left"  style="padding:8px;"><input type="button" name="btnEditar" id="btnEditar" class="button" value="Actualizar Informacion" />      <span id="respu" style="font-size:12px;margin-left:5px;"></span></td>
                        </tr>
                    </table>




                    <div id="Contenido"  style="margin:auto;font-size:14px;width:100%;padding-top:30px;text-align:center">


                        Cargando, Espere Por Favor...

                    </div>

                    <br /><br />




















                </div>
            </div>

            <?php
            $variable = file_get_contents("Partes/Pie.html");
            echo $variable;
            ?>



    </body>
</html>