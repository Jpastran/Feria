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

        <link href="../css/estilos-gestor.css" rel="stylesheet" type="text/css">
            <script type="text/javascript" src="../js/jquery-1.11.3.js"></script>
            <script>
                $(document).ready(function() {
                    function time() {
                        setTimeout(function() {
                            $(".mensajes").fadeOut(900);
                        }, 1500);
                    }
                    $("#mensajesError").hide();
                    $("#mensajesExito").hide();
                    $("#btnEditar").hide();
                    $("#Cancelar").hide();
                    cargar();
                    $(".delet").click(eliminar);
                    $(".edit").click(editar);
                    $("#btnentrar").click(Nuevo);
                    $("#btnEditar").click(btnEditar);
                    $("#Cancelar").click(Cancelar);

                    function btnEditar() {

                        if ($("#Nombre").val() != "" && $("#Oferta").val() != "-1") {
                            $("#respu").html("Espere Por Favor...");
                            var parametros = {
                                "Eoculto": $("#oculto").val(),
                                "ENombre": $("#Nombre").val(),
                                "EOferta": $("#Oferta").val()
                            };
                            $.ajax({
                                data: parametros,
                                url: "Procesamiento/Areas.php",
                                type: "POST",
                                success: function(resp) {
                                    if (resp == "s") {
                                        $("#respu").html("");
                                        alert("Actualizado Con Exito");
                                        Cancelar();
                                    } else {
                                        $("#respu").html("");
                                        alert("No Se Pudo Guarda, Verifique Su Conexion");

                                    }
                                },
                                error: function(resp) {
                                    alert("Error Al Conectarse Al Servidor");
                                }
                            });
                        } else {
                            alert("Complete Todos Los Campos");
                        }
                    }

                    function Cancelar() {
                        $("#btnEditar").hide();
                        $("#Cancelar").hide();
                        $("#btnentrar").show();
                        $("#Nombre").val("");
                        $("#Oferta option[value='-1']").attr("selected", true);
                        $("#Contenido").html("<center>Cargando, Espere Por Favor...</center>");
                        cargar();
                    }

                    function cargar() {

                        var parametros = {
                            "Cdocentes": "X"
                        };
                        $.ajax({
                            data: parametros,
                            url: "Procesamiento/Areas.php",
                            type: "POST",
                            success: function(resp) {
                                $("#Contenido").html(resp);
                                $(".delet").click(eliminar);
                                $(".edit").click(editar);
                            },
                            error: function(resp) {
                                alert("Error Al Conectarse Al Servidor");
                            }
                        });

                    }

                    function Nuevo() {
                        if ($("#Nombre").val() != "" && $("#Oferta").val() != "-1") {
                            $("#respu").html("Espere Por Favor...");
                            var parametros = {
                                "NNombre": $("#Nombre").val(),
                                "NOferta": $("#Oferta").val()
                            };
                            $.ajax({
                                data: parametros,
                                url: "Procesamiento/Areas.php",
                                type: "POST",
                                success: function(resp) {
                                    if (resp == "s") {
                                        $("#respu").html("");
                                        alert("Guardado Con Exito");
                                        $("#Nombre").val("");
                                        $("#Oferta option[value='-1']").attr("selected", true);

                                        cargar();
                                    } else {
                                        $("#respu").html("");
                                        alert("No Se Pudo Guarda, Verifique Su Conexion");

                                    }
                                },
                                error: function(resp) {
                                    alert("Error Al Conectarse Al Servidor");
                                }
                            });
                        } else {
                            alert("Complete Todos Los Campos");

                        }
                    }

                    function editar() {

                        var parametros = {
                            "BuscarDocente": $(this).val()
                        };
                        $("#oculto").val($(this).val());
                        $("#Contenido").html("<center>Cargando, Espere Por Favor...</center>");
                        $.ajax({
                            data: parametros,
                            url: "Procesamiento/Areas.php",
                            type: "POST",
                            success: function(resp) {
                                var datos = resp.split("ô");
                                $("#Nombre").val(datos[0]);
                                $("#Oferta option[value='" + datos[1] + "']").attr("selected", true);


                                $("#btnEditar").show();
                                $("#Cancelar").show();

                                $("#btnentrar").hide();
                                $("#Contenido").html("");
                            },
                            error: function(resp) {
                                alert("Error Al Conectarse Al Servidor");
                            }
                        });
                    }

                    function eliminar() {
                        if (confirm("¿Esta Seguro Que Desea Eliminar Esta Area?")) {

                            var parametros = {
                                "CodDocente": $(this).val()
                            };
                            $.ajax({
                                data: parametros,
                                url: "Procesamiento/Areas.php",
                                type: "POST",
                                success: function(resp) {
                                    if (resp == "s") {

                                        alert("Eliminado Con Exito");

                                        $("#Contenido").html("<center>Cargando, Espere Por Favor...</center>");
                                        cargar();
                                    } else {
                                        alert("No Se Pudo Eliminar");

                                    }
                                },
                                error: function(resp) {
                                    alert("Error Al Conectarse Al Servidor");
                                }
                            });
                        }
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
                            <td align="right"  style="text-align:right !important;padding:8px;">Nombre Area</td>
                            <td align="left" style="padding:8px;"><input name="Nombre" type="text" class="box" id="Nombre" onkeydown="testForEnter();" value="" style="width:300px;"/></td>
                        </tr> 
                        <tr>
                            <td align="right"  style="text-align:right !important;padding:8px;">Oferta</td>
                            <td align="left" style="padding:8px;">

                                <?php
                                require_once("Procesamiento/Conexion.php");

                                $consulta = 'SELECT codigo,departamento,categoria,nombre FROM ofertas ORDER BY departamento,categoria,nombre';
                                $datos = mysql_query($consulta);
                                echo"<select name='Oferta' id='Oferta' style='width:300px;font-size:14px;padding:3px' >
					<option value='-1' selected='selected'>Seleccionar...</option>";

                                while ($row = mysql_fetch_array($datos)) {
                                    echo"<option value='" . $row[0] . "'>" . $row[1] . " / " . $row[2] . " / " . $row[3] . "</option>";
                                }
                                echo"</select>";
                                ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="hidden" id="oculto" name="oculto" />
                            </td>
                            <td align="left"  style="padding:8px;"><input type="button" name="btnentrar" id="btnentrar" class="button" value="Guardar" />
                                <input type="button" name="btnEditar" id="btnEditar" class="button" value="Editar" />
                                <input type="button" name="Cancelar" id="Cancelar" class="button" value="Cancelar" />      <span id="respu" style="font-size:12px;margin-left:5px;"></span></td>
                        </tr>
                    </table>




                    <div id="Contenido"  style="margin:auto;font-size:14px;width:100%;padding-top:30px;text-align:center">


                        Cargando, Espere Por Favor...

                    </div>






















                </div>
            </div>

            <?php
            $variable = file_get_contents("Partes/Pie.html");
            echo $variable;
            ?>



    </body>
</html>